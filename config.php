

<?php
#eventfull.com key   x9hbQPVxn5cbKs7Z.
#Application name 	Plex Php Sync
#API key 	e34dfc8d829d8866e527aa1069e390c2
#Shared secret 	8a5ec6366a35dabebf77d969c3a4e49e
#Registered to 	dassam173


$plextoken = "";       			// Plextoken 
$mysqldb = "";                                  // Database on mysql Server
$mysqltable = "plex";                               // Table fpr Plex Series
$mysqltablemu = "music";                            // Table or Plex Music
$mysqluser = "root";								// MySQL User 
$mysqlserver = "localhost";							// MySQL Server
$mysqlpwd = "";										// MySQL Password
$apikey = "3B54A58ACFAF62FA";    					// theTvDB Api Key
$debug = "0";										// Debug mode 
$plexserver = "http://localhost:32400"; 			// PlexServerUrl
$lastfmapi = "e34dfc8d829d8866e527aa1069e390c2";	// LastFM API Key

set_time_limit(5000);


$db = mysqli_connect($mysqlserver, $mysqluser, $mysqlpwd , $mysqldb);
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}

#$abfrage = "SELECT id FROM tv";

?>


