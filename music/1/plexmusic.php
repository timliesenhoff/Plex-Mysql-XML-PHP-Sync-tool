<?php
include('../config.php');
	$tempauswahl1 = "17462";
			$s1 = array();
			
			$xmlFile = $plexserver . '/library/metadata/'.$name.'/allLeaves?X-Plex-Token='. $plextoken;
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
			echo " Found " . $a2 . " albums on Plex ";
?>