<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>
	
	<title>PHP XML PLEX Show Section</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="../style.css">
	

</head>

<body><center>
<table><tr><td>
<?php include("library.php"); ?>
</td></tr></table>

<?php
if (!isset($_POST["sort"])){
$sort = "0";
	#echo $sort;
		$status = " ";
		$form = "1";
		$formtext = "Show Continuing";
}elseif($_POST["sort"] == "0"){
			$form = "1";
			$status = " where status = 'Continuing' ";
			$formtext = "Show Ended";
			
}elseif($_POST["sort"] == "1"){
			$form = "2";
			$status = " where status = 'Ended' ";
			$formtext = "Show All";
}
elseif($_POST["sort"] == "2"){
			$form = "0";
			$status = " ";
			$formtext = "Show Continuing";
}







include('../config.php');

#echo $mysqltable;

$ergebnis = mysqli_query($db, "SELECT * FROM ".$mysqltable . $status . " ORDER BY plexname");
while($row = mysqli_fetch_object($ergebnis))
{
$tvdbid =  $row->tvdbid;
$plexid =  $row->plexid;
$epplex =  $row->epplex;
$eptvdb =  $row->eptvdb;
$seplex =  $row->seplex;
$setvdb =  $row->setvdb;
$status =  $row->status;
$epdiff =  $row->epdiff;
$plexname =  $row->plexname;
$tvdbname =  $row->tvdbname;
$poster =  $row->poster;
$lang =  $row->lang;

		 $text = str_replace(' ', '-', $tvdbname);
		 $sjurl =  '<a href="http://serienjunkies.org/serie/' . $text . '" target="_blank">SJ</a> ';
         $posterurl = '<img src="http://thetvdb.com/banners/_cache/'.$poster.'" alt="series poster"> ';
		if ($epdiff  <= "0"){
			$class = "gruen";
			$epdiff = "0";
		}elseif($epdiff < 3) {
			$class = "gelb";
		}elseif($epdiff > 3){
			$class = "rot";
		}
		
		
		
		echo "<center>";
	echo '<div style="float:left;width:auto;">';	

echo '<table width="300">';		
echo '<tr><td colspan="2" height="400" >'.$posterurl .'</td></tr><tr><td colspan="2" height="40">' . $plexname . ' - ' . $sjurl . '</td></tr>';

echo '<tr><td width="50%" >Status: '. $status .'</td><td class="'.$class.'" width="50%">' . $epdiff .'</td></tr><tr><td>';
echo 'Plex: '.$epplex .'<br> TVDB: ' . $eptvdb .'</td><td>Plex: ' . $seplex .'<br> TVDB: ' . $setvdb .'</td></tr>'  ;

echo '<tr><th colspan="2"><form action="./series.php" method="post"><input type="hidden" size="40" name="key" value="'.$plexid.'"><input type="hidden" size="40" name="tvdbid" value="'.$tvdbid.'"><input type="hidden" size="40" name="serie" value="'.$tvdbname.'"><input type="hidden" size="40" name="lang" value="'.$lang.'"><input type="submit" value="Search Missing"></form></th>';
echo "</tr></table>";
echo '</div>';


}

?>


