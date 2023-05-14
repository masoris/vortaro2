#!/usr/bin/perl

MAIN:
{
    while (my $line = <STDIN>) {
        $line =~ s/\r?\n//g;
        $line =~ s/\"/˝/g;

        print "\"$line\",\n";
    }
}
