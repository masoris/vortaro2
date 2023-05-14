#!/bin/env perl

sub loadGroupX()
{
    my $BROX = {};

    local(*F);
    if (! open(F, "./Grupo-X.txt")) {
        warn "open(F, ./Grupo-X.txt) failed: $!";
        return $BROX;
    }
    my @lines = <F>;
    close(F);

    foreach my $line (@lines) { 
        $line =~ s/\r?\n$//g;
        my ($key, $val) = split(/\s*\:\s*/, $line, 2);
        if (defined $val) {
            if ($key =~ /i$/) { $key =~ s/i$/-i/; }
            if ($key =~ /a$/) { $key =~ s/a$/-a/; }
            if ($key =~ /o$/) { $key =~ s/o$/-o/; }
            # print "[$key][$val]\n";
            if (defined $BROX->{$key}) {
                $BROX->{$key} .= " " . $val;
                # print "DUP[$key]: $BROX->{$key}\n";
            } else {
                $BROX->{$key} = $val;
            }
        }
    }

    return $BROX;
}

sub loadVortaro()
{
    my $V = {};
    local(*F);
    if (! open(F, "./join-hajpin-ma-sort.txt.ext")) {
        warn "open(F, join-hajpin-ma-sort.txt.ext) failed: $!";
        return $V;
    }

    my @lines = <F>;
    close(F);

    foreach my $line (@lines) {
        $line =~ s/\r?\n$//g;
        my ($key, $val) = split(/\t/, $line, 2);
        $val =~ s/G_X/G_Y/;
        $V->{$key} = $val;
    }

    return $V;
}

MAIN:
{
    my $BROX = loadGroupX();
    my $V = loadVortaro();

    foreach my $key (keys %{$BROX}) {
        if (defined $V->{$key}) {
            $V->{$key} .= " {" . $BROX->{$key} . "}";
            if (index($V->{$key}, "G_Y") >= 0) {
                $V->{$key} =~ s/G_Y/G_X/g;
            }
        } else {
            $V->{$key} = "<G_X>\t\t" . "{" . $BROX->{$key} . "}";
        }
    }

    # print "BROX: " . scalar(keys %{$BROX}) . "\n";
    # print "V: " . scalar(keys %{$V}) . "\n";

    foreach my $key (keys %{$V}) {
        print "$key\t\t$V->{$key}\n";
    }
}
