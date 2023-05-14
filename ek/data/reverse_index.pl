#!/usr/bin/perl

sub reverse_index($)
{
    my ($file) = @_;

    my $index = {};

    local(*F);
    if (! open(F, "< :utf8", "$file"))
    # if (! open(F, "$file"))
    {
        warn "open(F, $file) failed: $!";
        return $index;
    }
    my @lines = <F>;
    close(F);

    for (my $i = 0; $i < @lines; $i++) {
        my $line = $lines[$i];
        $line =~ s/\r?\n//g;
        # print $line, "\n";

        for (my $j = 0; $j < length($line); $j++) {
            my $c = substr($line, $j, 1);
            print "$c ";
        }

        print "\n";
    }

    return $index;
}

MAIN:
{
    if (! @ARGV) {
        print "Usage: $0 filename\n";
        exit(0);
    }

    my $file = $ARGV[0];

    my $index = reverse_index($file);
}
