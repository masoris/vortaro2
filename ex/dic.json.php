<?
error_reporting(E_ERROR | E_WARNING | E_PARSE);
#$fp = fopen("./dic.json.php.log", "a+");
#fputs($fp,  date("Y/m/d-H:i:s") . " " . $_SERVER["REMOTE_ADDR"] . " DOWN START\n");
#fclose($fp);

$fp = fopen("./dic.json", "r");
while ($line = fgets($fp, 4096)) {
    echo $line;
}
fclose($fp);

#$fp = fopen("./dic.json.php.log", "a+");
#fputs($fp,  date("Y/m/d-H:i:s") . " " . $_SERVER["REMOTE_ADDR"] . " DOWN END\n");
#fclose($fp);
?>
