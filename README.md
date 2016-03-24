# Plex-Mysql-XML-PHP-Sync-tool
Plex PHP XML MySQL sync tool to compare Librarys

Welcome to Tim's Plex sync tool.

this application will sync your Plex Show and Music Database into MySQL datebase.
( i decide to do this step for better performace!)

Software you need:
-> Plex Server .
-> Apache2 incl php5.
-> Mysql Server.
-> Mysql Server management tool like phpmyadmin.
-> (mysql, apache, php5 & phpmyadmin can be installed als one package by XAMPP or LAMPP )
-> Webbrowser.
-> theRenamer or Filebot to rename files to a valid Series format.
Configurate theweb client:

1. Create a mysql Database and run the SQL file against it.
2. configurate config.php in root folder. i means, insert Mysql Database Name and username/pw/servername if needed.
3. get your plex auth Token. Howto Get Plex Token and insert it into config.php
3.1 any other listed token are Public, you can add you own one if you want.
Using the Web Frontend:

1. to sync your databases to mysql. (upper area, it costs a while depending on you HW ressources! do not close the TAB!)
2. enjoy collected data !
3. To edit mysql Data manually, please use PHPMYADMIN or similar products.
kind regards, Tim Liesenhoff

