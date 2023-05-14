#!/usr/bin/perl

sub search_more_content($$)
{
    my ($word, $url) = @_;

    my $tmpout = "/tmp/$$.tmp";

    my $wget_cmd = "/usr/bin/wget \"$url\" --output-document=$tmpout";

    my $out = `$wget_cmd 2> /dev/null`;

    my @lines = ();
    local(*F);
    if (open(F, $tmpout)) {
        @lines = <F>;
        close(F);
    }

    unlink($tmpout);

    my $result = trim_content($word, \@lines, 0);

    return $result;
}

sub trim_content($$$)
{
    my ($word, $lines, $flag) = @_;

    # my $result = join(//, @lines);

    ##  <div class="search_entry_div section_all">
    ##              <a nclick="exm.more" class="exampleTab section_more" href="#" onclick="return false;">예문 더보기</a>
    ##          </div>
    ##  <div class="section_line search_entry_div"></div>
    ##  <div class="section_result search_entry_div">

    my $result = "";
    my $content_begin = 0;
    my $content_end = 0;

    foreach my $line (@{$lines}) {
        if ($line =~ /srch_result /) { $content_begin = 1; next; }
        if ($line =~ /reviewedWordsDiv aside_area/) { $content_end = 1; next; }
        if ($line =~ /class..aside./) { $content_end = 1; next; }
        if ($line =~ /.aside./) { $content_end = 1; next; }

        if ($line =~ /search_entry_div section_all/) { $content_begin = 1; next; }
        if ($line =~ /exampleTab section_more/) { $content_end = 1; next; }
        if ($line =~ /section_line search_entry_div/) { $content_end = 1; next; }
        if ($line =~ /section_result search_entry_div/) { $content_end = 1; next; }

        if ($line =~ /wrd.example/) {
            # $result .= '[1]';
            next;
        }

        if ($line =~ /btn_ex2 exbtn/) {
            # $result .= '[2]';
            next;
        }

        if ($line =~ /lst_txt2 ex_1032724/ && $line =~ /display\:none/) {
            # $result .= '[3]';
            next;
        }

        if ($line =~ /section_more entryMore/) {

            my $url = "http://vndic.naver.com/search.nhn?sLn=kr" . '&' . "range=entry" . '&' . "query=" . $word;
            # http://vndic.naver.com/search.nhn?sLn=kr&range=entry&query=a

            $result .= "<table width=100% border=1><tr><td width=100%>\n";
            $result .= search_more_content($word, $url);
            $result .= "</td></tr></table>\n";

            my $url2 = "http://vndic.naver.com/search.nhn?sLn=kr" . '&' . "range=entry" . '&' . "query=" . $word . '&' . "pageNo=2";

            $result .= "<table width=100% border=1><tr><td width=100%>\n";
            $result .= search_more_content($word, $url2);
            $result .= "</td></tr></table>\n";

            next;
        }

        
        if ($line =~ /section_more meanMore/) {
            # $result .= '[4]';
            next;
        }

        if ($line =~ /section_more exampleMore/) {
            # $result .= '[5]';
            next;
        }

        if ($line =~ /dn-naverdic.ktics.co.kr/) {
             # $result .= '[6]'; 
             next; 
        }

        $line =~ s/<a href/<Xa href/g;
        if ($flag && $line =~ /href..(\/entry.nhn.entryId.\d+)/) {
            $result .= $line;

            # a href="/entry.nhn?entryId=6073"

            my $entry_uri = $1;
            my $url = "http://vndic.naver.com" . $entry_uri;

            $result .= "<table width=100% border=1><tr><td width=100%>\n";
            $result .= search_more_content($word, $url);
            $result .= "</td></tr></table>\n";
            next;
        }

        if ($content_begin && ! $content_end) {
            $result .= $line; 
        }
    }

    return $result;
}

sub search_vndic_naver_com($)
{
    my ($word) = @_;

# print "word: $word\n";

    my $tmpout = "/tmp/$$.out";

    # http://vndic.naver.com/entry.nhn?sLn=kr&entryId=1037336&query=한글" --output-document=/tmp/xx.out
    # my $wget_cmd = "/usr/bin/wget \"http://vndic.naver.com/entry.nhn?sLn=kr&query=$word\" --output-document=$tmpout";

    my $wget_cmd = "/usr/bin/wget \"http://vndic.naver.com/search.nhn?query=$word\" --output-document=$tmpout";

    my $out = `$wget_cmd 2> /dev/null`;

    my @lines = ();
    local(*F);
    if (open(F, $tmpout)) {
        @lines = <F>;
        close(F);
    }

    unlink($tmpout);

    my $result = trim_content($word, \@lines, 1);

    return $result;
}

sub get_alternative($)
{
    my ($word) = @_;

    if ($word =~ /uo/) { }

    if ($word =~ /ie/) { }

    

    if ($word =~ /o/) { }

    if ($word =~ /a/) { }

    return $word;
}

MAIN:
{
    if (! @ARGV) {
        print "Usage: $0 word\n";
        exit(0);
    }

    my $word = $ARGV[0];

    my $result = search_vndic_naver_com($word);

    if ($word =~ /[a-zA-Z]+/) {
        my $alternative = get_alternative($word);
        print $alternative;
    }

    print $result;
}
