<head>
	<meta charset='UTF-8'>
	
	<title>PHP XML PLEX TheTVdb Check</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="../style.css">
</head>

<?php
include('../config.php');
echo '<form action="./" method="post"><input type="hidden" size="40" name="home" value="1"><input type="submit" value="Home"></form>';
echo '<table border="1">';

mysqli_query($db,'TRUNCATE TABLE ct1');
mysqli_query($db,'TRUNCATE TABLE ct2');


				$cart1 = array();
				$cart2 = array();
				$cart3 = array();
				$cart4 = array(); //datumsarray  ##neu
		$ratingkey = $_POST["key"];
		$name =   $_POST["serie"];
		$sprache = $_POST["lang"];
		$id =   $_POST["tvdbid"];
						echo "<tr><th>";
						echo ("Name: " . $name . " - Key: ".  $ratingkey . " - ". $sprache )."<br>";
						
						
						
						
					$url2 = $plexserver.'/library/metadata/'.$ratingkey.'/allLeaves?X-Plex-Token='.$plextoken;
					$xml2 = simplexml_load_file($url2);
					foreach($xml2->Video as $Video) {
					$index = str_pad($Video['index'], 2, "0", STR_PAD_LEFT);
					$parentIndex =  str_pad($Video['parentIndex'], 2, "0", STR_PAD_LEFT);
					$plexdb =  ( "S".  $parentIndex ."E". $index);
					$sname = $Video['title'];
					$dur = $Video['duration'];   ####
					$cart1[] = $plexdb;
					$import1 = $plexdb;   ###
					#echo $plexdb." - ".$sname;
				$eintrag = "INSERT INTO `ct1`(`text1`, `text2`) VALUES ('$import1', '$dur' )";   ###
                $eintragen = mysqli_query($db, $eintrag);   ###
					
													}
	echo "<br>";
	echo "</th><th>";
			$xmlFile = 'http://thetvdb.com/api/'.$apikey .'/series/'.$id.'/all/'. $sprache.'.xml';
			$xml = simplexml_load_file($xmlFile);
				foreach ( $xml->Series as $serie )  
				{  
				echo "";  
				echo 'Name: ' . $serie->SeriesName . '<br>'; 
				$serienname = $serie->SeriesName;
				echo 'Status: ' . $serie->Status . ' ';
				echo '| ID: '. $id .'<br>';
        }  
		
			$xmlFile = 'http://thetvdb.com/api/'.$apikey.'/series/'.$id.'/all/'. $sprache.'.xml';
			$xml = simplexml_load_file($xmlFile);
							$runtime = $xml->Series->Runtime;
				foreach ( $xml->Episode as $serie )  
				{  
				if ($serie->SeasonNumber == "0") { // skip even members
				continue;
				}
				echo "";
				
					$tv1 = 'E' . str_pad($serie->EpisodeNumber, 2, "0", STR_PAD_LEFT);   ###EPISODE
					$tv2 = 'S' . str_pad($serie->SeasonNumber, 2, "0", STR_PAD_LEFT);     ###STAFFEL
					$tv3 = $serie->EpisodeName;
					#
					##neu!
					$tv4 = $serie->FirstAired;					###neu 
					$tv5 = $serie->Combined_episodenumber;    ###neu
					$cart2[] = $tv2 . $tv1;   						###neu
					#neu ende
					#echo $tv2 . $tv1 . " - ". $tv3;
					$import2 = $tv2 . $tv1;
                $eintrag1 = "INSERT INTO `ct2`(`textx1`, `textx2`, `textx3`, `textx4`) VALUES ('$import2','$tv3','$tv4','$tv5')";
                $eintragen = mysqli_query($db, $eintrag1);
				}
		echo "</th>";
		echo "</tr>";
			$result = array_diff($cart2, $cart1);

			foreach($result as $value){
			$res = "0";
			$skip = "0";
			$ergebnis2 = mysqli_query($db, "SELECT * FROM `ct2` WHERE  textx1 = '$value' ");
                  while($row = mysqli_fetch_object($ergebnis2))
                 {
					 
					 echo '<tr>';

						$air = $row->textx3;
						$name = $row->textx2;
			            $se =  $row->textx1;
						$comb = $row->textx4;
						$dure = "0";
				
				$ergebnis5 = mysqli_query($db, "SELECT * FROM `ct1` WHERE text1 = '$se'");
                  while($row5 = mysqli_fetch_object($ergebnis5))
                 {
					 
					 $dure1 = $row5->text2;
					 $dure = ($dure1 / "60093.16");
					 if ($runtime < $dure1) {
						 $skip = "1";
					 }
				 }
						
						if (strpos($comb, '.5') == false){
                        #echo 'true';
						
						if ($skip == "0"){
						$today = date("Y-m-d");
                        if($today > $air) 
						 {
						#echo $dure;	
						echo '<td colspan="2">';
                        echo $se;
						echo " - ";
    					echo $name;
						echo " - ";
						echo $air;
                        echo "</td>";						
					       } ## today ande
						} ##combined ende
						}  ## SKIP ende



					echo '</tr> '; 
				 }
			#echo $value.

			}


			unset($cart2); 
			unset($cart1);   
			echo '</td></tr>';

echo "</table>";

?>