<?php
include('../config.php');
error_reporting(0);
echo '<form action="./" method="post"><input type="hidden" size="40" name="home" value="1"><input type="submit" value="Home"></form>';

$name = $_POST["name"];
$title = $_POST["plexid"];

				#$name =  $artist['ratingKey']; 
				#$title =  $artist['title']; 

			#$tempauswahl = "3";

				
				
				echo $title." - ";
				echo $name . " -  <br>";


				
			$xmlFile = 'http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&limit=3500&api_key='.$lastfmapi.'&artist='.$name;
			$xml = simplexml_load_file($xmlFile);
				foreach ( $xml->artist  as $arti )  
				{
				$mbidart = $arti->mbid;
				
				echo $mbidart ;
				echo "<br>";
					}

			$s1 = array();
			
			$xmlFile = $plexserver . '/library/metadata/'.$title.'/allLeaves?X-Plex-Token='. $plextoken;
			$xml = simplexml_load_file($xmlFile);
				foreach ( $xml->Track  as $album )  
				{
				$name1 =  $album['ratingKey']; 
				$title1 =  $album['title']; 
				$parentTitle =  $album['parentTitle']; 
				$grandparentTitle =  $album['grandparentTitle']; 
				#echo $name.$title.$parentTitle.$grandparentTitle."<br>";
				
				$s1[]= $parentTitle;
				}
				$a2 = "0";
			$result = array_unique($s1);
			foreach($result as $value){	
			echo  $value ."<br>"; 
			$a2++;
			}
			#echo " Found " . $a2 . " albums on Plex ";
				

				
				
				
				$a1 = "0";	
			$xmlFile = 'http://ws.audioscrobbler.com/2.0/?method=artist.getTopAlbums&limit=3500&api_key='.$lastfmapi.'&artist='.$name;
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
				#echo " Found " . $a1 . " albums on LastFM  ";
				echo "title: " .  $title . " id : ".  $name . "plex: ". $a2 . " lastfm: " . $a1 . "<br>"; 
				
				#$loeschen = "DELETE FROM ".$mysqltablemu." WHERE plexid = '".$title."'";
                #$loesch = mysqli_query($db, $loeschen);
                #$eintrag = "INSERT INTO ".$mysqltablemu." (`plexid`, `name`, `plexcount`, `lastfmcount`, `mbid` ) VALUES ('$title', '$name', '$a2', '$a1', '$mbidart')";
                #$eintragen = mysqli_query($db, $eintrag);			


				

			echo '<form action="./" method="post"><input type="hidden" size="40" name="home" value="1"><input type="submit" value="Home"></form>';	
				
				
?>