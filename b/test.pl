while (my $line = <STDIN>) {
	$line =~ s/\r?\n//g;
	my @cols = split(/\t/, $line);
	#print "@cols\n";
	my $head = shift @cols;
	print "$head\t\t<G_Y>\t\t@cols\n";
}
