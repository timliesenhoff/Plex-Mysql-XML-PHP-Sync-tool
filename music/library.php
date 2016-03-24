<?php
include('../config.php');


#$postid = $_POST["key"];


echo "<table><tr>";
			echo '<th><form action="../" method="post"><input type="hidden" size="40" name="home" value="1"><input type="submit" value="Home"></form></th>';
			echo '<th><form action="./" method="post"><input type="hidden" size="40" name="home" value="1"><input type="submit" value="Back"></form></th>';

$xmlFile = $plexserver. '/library/sections/?X-Plex-Token='.$plextoken;
			$xml = simplexml_load_file($xmlFile);
				foreach ( $xml->Directory  as $library )  
				{  
				if ($library['type'] == "artist"){
			$key = $library['key']; 
			$title = $library['title'];
			$language = $library['language']; 

			echo '<th><form action="./plex.php" method="post"><input type="hidden" size="40" name="key" value="'.$key.'"><input type="hidden" size="40" name="lang" value="'.$language.'"><input type="submit" value="Sync: '.$title. " - " .$language.'"></form></th>';
	}}
echo "</tr></table>";

?>

