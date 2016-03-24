<head>

<head>
<?php
include('../config.php');

#$postid = $_POST["key"];


	echo '<div style="float:left;width:auto;">';
			echo '<form action="../" method="post"><input type="hidden" size="40" name="home" value="1"><input type="submit" value="Home"></form>';
echo '</div>';
	echo '<div style="float:left;width:auto;">';
			echo '<form action="./" method="post"><input type="hidden" size="40" name="home" value="1"><input type="submit" value="Back"></form>';
echo '</div>';
$xmlFile = $plexserver. '/library/sections/?X-Plex-Token='.$plextoken;
			$xml = simplexml_load_file($xmlFile);
				foreach ( $xml->Directory  as $library )  
				{  
				if ($library['type'] == "show"){
			$key = $library['key']; 
			$title = $library['title'];
			$language = $library['language']; 
	echo '<div style="float:left;width:auto;">';
			echo '<form action="./sync.php" method="post"><input type="hidden" size="40" name="key" value="'.$key.'"><input type="hidden" size="40" name="lang" value="'.$language.'"><input type="submit"  value="Sync: '.$title. " - " .$language.'"></form>';
echo '</div>';

	}

	
	}

			echo '<div style="float:left;width:auto;">';
			echo '<form action="./search.php" method="post"><input type="hidden" size="40" name="home" value="1"><input type="submit" value="search"></form>';
echo '</div>';
	
?>

