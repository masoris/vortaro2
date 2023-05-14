<?
$vorto = $_POST["vorto"];
if ($vorto == "") {
    $vorto = $_REQUEST["vorto"];
}

# echo "vorto: $vorto"

$vorto = str_replace("'", "", $vorto);
$vorto = str_replace("\"", "", $vorto);
$vorto = str_replace("`", "", $vorto);

#$fp = fopen("./tiru-enhavon.log", "a+");
#fputs($fp,  date("Y/m/d-H:i:s") . " " . $_SERVER["REMOTE_ADDR"] . " " . $vorto . "\n");
#fclose($fp);

$result = `./tiru-enhavon.pl $vorto`;

print $result;
?>
