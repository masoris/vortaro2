<?php
$fp = fopen("./dic.json", "r");
while ($line = fgets($fp, 4096)) {
    $line = iconv("UTF-8", "UTF-8//IGNORE", $line);
    echo $line;
}
fclose($fp);
?>
