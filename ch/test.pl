#!/bin/perl

while (my $line = <STDIN>) {

    $line =~ s/\s+$//g;

    my @row = split(/\s/, $line, 2);
    if (@row != 2) {
        next;
    }

    $row[0] =~ s/\|/-/;
    print "\"$row[0]\t\t$row[1]\",\n";
}
