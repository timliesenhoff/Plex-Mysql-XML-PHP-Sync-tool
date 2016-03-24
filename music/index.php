<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>
	
	<title>PHP XML PLEX TheTVdb Check</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="style.css">
</head>

<body>
<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>
	
	<title>PHP XML PLEX Music Check</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="../style.css">
	

	
</head>
<?php include("library.php"); ?>
<body>

<table>

<tr><th>Name</th><th>


</th><th>Diff</th><th></th><th></th><th></th></tr>

<?php
include('../config.php');



$ergebnis = mysqli_query($db, "SELECT * FROM ".$mysqltablemu ." ORDER BY name");
while($row = mysqli_fetch_object($ergebnis))
{
$name =  $row->name;
$plexid =  $row->plexid;
$plexcount =  $row->plexcount;
$lastfmcount =  $row->lastfmcount;
$mbid =  $row->mbid;




		
echo "<tr><td>" . $name . "</td><td>" . $plexid .'</td><td>' . $plexcount ."</td>".'</td><td>' . $lastfmcount ."</td>";

echo '<th><form action="./plexmis.php" method="post"><input type="hidden" size="40" name="name" value="'.$name.'"><input type="hidden" size="40" name="plexid" value="'.$plexid.'"><input type="submit" value="Search Missing"></form></th>';
echo '<th><form action="./eventful.php" method="post"><input type="hidden" size="40" name="name" value="'.$name.'"><input type="submit" value="Eventful"></form></th>';


echo "</tr>";
}
?>
</table>