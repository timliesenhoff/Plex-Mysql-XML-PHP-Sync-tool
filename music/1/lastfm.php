<?php
include('../config.php');
		#$title = "AC/DC";
				$a1 = "0";	
			$xmlFile = 'http://ws.audioscrobbler.com/2.0/?method=artist.getTopAlbums&limit=3500&api_key='.$lastfmapi.'&artist='.$title;
			$xml = simplexml_load_file($xmlFile);
				foreach ( $xml->topalbums->album  as $topalbums )  
				{
    			$name2 =  $topalbums->name; 
				$mbid = $topalbums->mbid;
				if (strlen($mbid) > "3"){
				echo $name2. " - " . $mbid . "";
				$a1++;
				echo "<br>";
					}
				
				}
				echo " Found " . $a1 . " albums on LastFM  ";
?>