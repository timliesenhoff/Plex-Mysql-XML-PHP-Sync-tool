<?php
$today = date("Y-m-d");
$date1 = "2011-09-19";
if($today > $date1) {
	#echo "test<br>";
 }
 
$gegen = array(1,3); 
 
$airdate = array();
$airdate["show"]["name"] = "a";
$airdate["show"]["airdate"] = "1";
$airdate["show"]["name"] = "b";
$airdate["show"]["airdate"] = "2";
$airdate["show"]["name"] = "c";
$airdate["show"]["airdate"] = "3";
$airdate["show"]["name"] = "d";
$airdate["show"]["airdate"] = "4";

//Daten ausgeben
#echo "name: ".$airdate["show"]["name"];
#echo " airdate: ".$airdate["show"]["airdate"];
#echo "<br> Er hat ";
#echo count($airdate["show"]["Kinder"])." Kinder";

//Ausgabe von Kind1:
//$airdate["show"]["Kinder"][0];

#echo "<br> Kinder: <br>";
foreach($airdate["show"]["name"] AS $name) {
#echo $name."<br>";

}

#echo $airdate["show"]["airdate"];


			$result = array_diff($airdate, $gegen);
			foreach($result as $value){
			echo '<tr><td colspan="2">';	
			echo $value.'</td></tr> '; 
			}