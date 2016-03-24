
<?php
include('../config.php');
$id = $_POST["id"];
$serienname = "0";
$xmlFile = 'http://thetvdb.com/api/'.$apikey.'/series/'.$id.'/all/de.xml';
    $xml = simplexml_load_file($xmlFile);
    foreach ( $xml->Series as $serie )  
        {  
		$serienname = $serie->SeriesName;
        }  

echo "added ID:" . $id . " Name: " .$serienname;

$eintrag = "INSERT INTO ".$mysqltable." (id, name) VALUES ('$id', '$serienname')";
$eintragen = mysqli_query($db, $eintrag);


?>
<form action="list.php" method="post">
<input type="hidden" size="40" name="none" value='0'>
<input type="submit" value="back"></form>