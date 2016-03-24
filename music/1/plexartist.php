<?php
include('../config.php');
			$tempauswahl = "3";
			$xmlFile = $plexserver . '/library/sections/'.$tempauswahl.'/all/?X-Plex-Token='. $plextoken;
			$xml = simplexml_load_file($xmlFile);
				foreach ( $xml->Directory   as $artist )  
				{
				$name =  $artist['ratingKey']; 
				$title =  $artist['title']; 
				
				
				echo $title."<br>";
				echo "<table><tr><td>";
				include("plexmusic.php");
				echo "</td><td>";
				include("lastfm.php");
				echo "</td></tr></table>";
				}

				
				
				
?>