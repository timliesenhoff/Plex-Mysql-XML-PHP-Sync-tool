<?php
include('../config.php');
$name = $_POST["name"];
echo '<form action="./" method="post"><input type="hidden" size="40" name="home" value="1"><input type="submit" value="Home"></form>';
echo "<table>";
		$evtitle = $name;

			$xmlFile = 'http://api.eventful.com/rest/events/search?keywords='.$evtitle.'&location=germany&page_size=30&app_key=x9hbQPVxn5cbKs7Z';
			$xml = simplexml_load_file($xmlFile);
				foreach ( $xml->events->event  as $event )  
				{
					echo "<tr><td>";
				$etitle = $event->title;
				$ecity_name = $event->city_name;
				$evenue_address = $event->venue_address;
				$evenue_name = $event->venue_name;
				$eurl = $event->url; 
				$estart_time = $event->start_time;
				echo '<a href=';
				echo $eurl;				
				echo ' target="_blank">';				
				echo $etitle;
				echo " @ ";
				#echo $venue_name ;
				echo " - ";
				echo $ecity_name;
				echo " - ";
				echo $estart_time;
				echo '</a>';				
				$title = $ecity_name = $evenue_name = $evenue_address = "";
				echo "</td></tr>";
					}
					echo "</table>";
					
					echo '<form action="./" method="post"><input type="hidden" size="40" name="home" value="1"><input type="submit" value="Home"></form>';
?>