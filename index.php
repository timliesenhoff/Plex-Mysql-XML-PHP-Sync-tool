<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>
	
	<title>PHP XML PLEX TheTVdb Check</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="../style.css">
</head>

<body><center>
<h1> Welcome to Plex Sync </h1><br>
<form action="./show" method="post"><input type="hidden" size="40" name="sort" value="'.$form.'"><input type="submit" value="Shows"></form>

<form action="./music" method="post"><input type="hidden" size="40" name="sort" value="'.$form.'"><input type="submit" value="Music"></form>


<table><tr><td>
<h2>Welcome to Tim's Plex sync tool.</h2><br>
this application will sync your Plex Show and Music Database into MySQL datebase. <br>
( i decide to do this step for better performace!)<br><br>

Software you need:<br>
 -> Plex Server . <br>
 -> Apache2 incl php5. <br>
 -> Mysql Server. <br>
 -> Mysql Server management tool like phpmyadmin. <br>
 -> (mysql, apache, php5 & phpmyadmin can be installed als one package by XAMPP or LAMPP ) <br>
 -> Webbrowser.	  <br>
 -> theRenamer or Filebot to rename files to a valid Series format.<br>
 
</td></tr><tr><td>

<h2>Configurate theweb client:</h2><br>
1. Create a mysql Database and run the SQL file against it. <br>
2. configurate config.php in root folder. i means, insert Mysql Database Name and username/pw/servername if needed.<br>
3. get your plex auth Token. <a href=https://support.plex.tv/hc/en-us/articles/204059436-Finding-your-account-token-X-Plex-Token target="blank">Howto Get Plex Token</a> and insert it into config.php<br>
3.1 any other listed token are Public, you can add you own one if you want.

</td></tr><tr><td>

<h2>Using the Web Frontend:</h2><br>
1. to sync your databases to mysql. (upper area, it costs a while depending on you HW ressources! do not close the TAB!)<br>
2. enjoy collected data !<br>
3. To edit mysql Data manually, please use PHPMYADMIN or similar products.<br>
kind regards, Tim Liesenhoff<br>
</td></tr><table>


