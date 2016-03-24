<head>
<SCRIPT TYPE="text/javascript">
 <!-- 
 function popupform(myform, windowname)
 { 
 if (! window.focus)return true; 
 window.open('', windowname, 'height=200,width=400,scrollbars=yes');
 myform.target=windowname; 
 return true;
 }
 //--> 
 </SCRIPT>
	
</head>

<?php

#error_reporting(0);
include('../config.php');
#$plexdb = $_POST["key"];
$sprache = $_POST["lang"];
$ratingkey = "0"; 
$name =   $_POST["name"];
$namex =   $_POST["name"];
$id =  $_POST["id"];

#echo $sprache."<br>";


	
	mysqli_query($db,'TRUNCATE TABLE cs1');
mysqli_query($db,'TRUNCATE TABLE cs2');


				$cart1 = array();
				$cart2 = array();
				$cart3 = array();
				$cart4 = array(); //datumsarray  ##neu
	

		echo "text: " .$namex ." :txet";
						#echo ("Name: " . $name . " - Key: ".  $ratingkey)."<br>";
			$s1 = array();	
            $skip2 = "0";			
			

			
			########
			$xmlFile = 'http://thetvdb.com/api/'.$apikey.'/series/'.$id.'/all/'. $sprache. '.xml';
			$xml = simplexml_load_file($xmlFile);
				$runtime = $xml->Series->Runtime;
			########

				$s2 = array();
			$xmlFile = 'http://thetvdb.com/api/'.$apikey.'/series/'.$id.'/all/'. $sprache. '.xml';
			$xml = simplexml_load_file($xmlFile);
				$i1 = 0;
				$poster = $xml->Series->poster;
				$runtime = $xml->Series->Runtime;
				foreach ( $xml->Episode as $serie )  
				{  
				if ($serie->SeasonNumber == "0") { // skip even members
				continue;
				}	
					
					#echo $serie->SeasonNumber;
					$s2[] = $serie->SeasonNumber;
					$tv1 = 'E' . str_pad($serie->EpisodeNumber, 2, "0", STR_PAD_LEFT);   ###EPISODE
					$tv2 = 'S' . str_pad($serie->SeasonNumber, 2, "0", STR_PAD_LEFT);     ###STAFFEL
					$tv3 = $serie->EpisodeName;				
					$tv4 = $serie->FirstAired;					###neu 
					$tv5 = $serie->Combined_episodenumber;    ###neu
					
					if (strpos($tv5, '.5') == false){
						if (strpos($tv3, '(2)') == false){
						$today = date("Y-m-d");
                        if($today > $tv4) {
				         $i1++;
						 	#echo "number: " .$i1 ;
					}}}
					
					$cart2[] = $tv2 . $tv1;   						###neu
					#neu ende
					#echo $tv2 . $tv1 . " - ". $tv3;
					$import2 = $tv2 . $tv1;
                $eintrag1 = "INSERT INTO `cs2`(`text1`, `text2`, `text3`, `text4`) VALUES ('$import2','$tv3','$tv4','$tv5')";
                $eintragen = mysqli_query($db, $eintrag1);
				}
				

			$result = array_diff($cart2, $cart1);

			foreach($result as $value){
			
			$ergebnis2 = mysqli_query($db, "SELECT * FROM cs2  WHERE text1 = '$value' ");
                  while($row = mysqli_fetch_object($ergebnis2))
                 {
					 


						$air = $row->text3;
						#$name = $row->text2;
			            $se =  $row->text1;
						$comb = $row->text4;
						
						if (strpos($comb, '.5') == false){
                        #echo 'true';
						
						
						$today = date("Y-m-d");
                        if($today > $air) 
						 {
                        #echo $se;
    					#echo $name;
						#echo $air;          
					       } ## today ande
						} ##combined ende
 
				 }


			}
				
			$xmlFile = 'http://thetvdb.com/api/'.$apikey .'/series/'.$id.'/all/'. $sprache. '.xml';
			$xml = simplexml_load_file($xmlFile);
				foreach ( $xml->Series as $serie )  
				{
				$tvdbname =  $serie->SeriesName; 
				$serienname = $serie->SeriesName;
				$tvdbstatus = $serie->Status;
				$tvdbid = $id;
				$tvdbep = $i1;
				}  

		$sum = ($i1);
		#echo $i2. " - " . $i1 ."<br>";

		$staffelmax = "0";
		foreach($s2 as $value){	
			if ($value > $staffelmax){
			$staffelmax = $value; }
			}
			#echo $value; 
			#echo "<br>";
			
		$staffelmax1 = "0";
		foreach($s1 as $value1){	
			if ($value1 > $staffelmax1){
			$staffelmax1 = $value1; }
			}
			#echo $value1; 
			#echo "<br>";
		

echo "Delete ID: " . $tvdbid . " - " ;
 			
$loeschen = "DELETE FROM ".$mysqltable." WHERE tvdbid = '".$tvdbid."'";
$loesch = mysqli_query($db, $loeschen);
$eintrag = "INSERT INTO ".$mysqltable." (`tvdbid`, `plexid`, `epplex`, `eptvdb`, `status`, `epdiff`, `setvdb`, `seplex`, `plexname`, `tvdbname`, `lang`, `poster`) VALUES ('$tvdbid', '$ratingkey', '0', '$i1', '$tvdbstatus', '$sum', '$value', '0', '$name', '$tvdbname', '$sprache', '$poster')";
$eintragen = mysqli_query($db, $eintrag);			
	echo "Plex: Name: " . $name . " Key: ".   $ratingkey. " Episodes: " . "0" . " TVDB: Name; ". $tvdbname . " Status " . $tvdbstatus. " ID: " . $tvdbid.  " EP: " . $tvdbep . " Diff: " . $sum . " Sprache: " .$sprache . " S " . $value . " S " . "0" ;		
						echo ' - added.<br>';
				if ($skip2 = "1"){
			ende: echo $name . ":" . "<br>"; 
			$skip2 = "0";
				}
				

						
echo '<form action="./" method="post"><input type="hidden" size="40" name="home" value="1"><input type="submit" value="Home"></form>';

