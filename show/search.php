<?php
error_reporting(0);
echo 'search for Series @ TheTVdb: ';
echo '<form action="./search.php" method="post"><input type="hidden" size="40" name="suche" value="1"><input type="text" size="50" name="name" value=""><input type="submit" value="search"></form>';

$wert =   $_POST["name"];
$suche =   $_POST["suche"];

include('../config.php');

if ($suche == "1"){

$url = 'http://thetvdb.com/api/GetSeries.php?seriesname='.$wert .'&language=DE';
	$xml=simplexml_load_file($url) or die("Error: Cannot create object");
			
			$xmlname = $xml->Series[0]->SeriesName;
    foreach($xml->Series as $serie){
		 echo '<table border="1"><tr><td  colspan="2">';
		 echo '<img src="http://thetvdb.com/banners/_cache/'.$serie->banner.'" alt="series poster"> ';
		 
         echo "</td></tr><tr><td>";			 
		 $name =  $serie->SeriesName;
		 echo $name;
		 echo "</td><td>";
		 $lang = $serie->language;
		 echo $lang;
		 echo "</td></tr><tr><td>";
		 $air = $serie->FirstAired;
		 echo $air;
		 echo "</td><td>";
		 $net =  $serie->Network;
		 echo $net;
		 echo '</td></tr><tr><td colspan="2" >';
		 $id = $serie->id;
		 echo $id;		 
		 echo '<form action="./syncsolo.php" method="post">';
		 echo '<input type="hidden" size="40" name="lang" value="'.$lang.'">';
		 echo '<input type="hidden" size="40" name="id" value="'.$id.'">';
		 echo '<input type="hidden" size="40" name="name" value="'.$name.'">';
		 echo '<input type="submit" value="search"></form>';
		 
		 echo "</td></tr></table>";


	
	}
					 
					 
}