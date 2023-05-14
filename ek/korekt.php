<?
# page, psize
if ($psize == 0) {
    $psize = 20;
}
?>
<?
$fp = fopen("join-hajpin-ma-sort.txt.ext.20130126", "r");
$lines = array();
while ($line = fgets($fp, 10*10*1024)) {
    $lines[] = $line;
}
fclose($fp);
?>
<html>
<body>
<?
# echo "page: $page<br>\n";
echo "<table>";
for ($i = 0; $i < $psize; $i++) {
    $idx = $page*$psize+$i;

    if ($idx >= count($lines)) {
        break;
    }

    # print $lines[$idx] . "<br>\n";
    list($key, $val)= preg_split("/\t/", $lines[$idx], 2);
    print "<tr>";
    print "<input type=hidden value=$idx>\n";
    print "<td valign=top><input id=key_$idx type=text value=\"$key\"></td>\n";
    print "<td><textarea id=val_$idx cols=80 rows=8>$val</textarea></td>\n";
    print "<td valign=top><input type=button id=store_$idx value=\"저장\"></td>\n";
    print "</tr>\n";
}
print "</table>";

print "count: " . count($lines) . "<br>\n";
print "pages: " . count($lines)/$psize . "<br>\n";

for ($i = 0; $i < count($lines)/$psize; $i++) {
    print "[<a href=./korekt.php?page=$i>$i</a>], ";
}

?>
</body>
</html>
