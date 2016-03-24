<?php
include('../config.php');
		$title = "AC/DC";

			$xmlFile = 'http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&limit=3500&api_key='.$lastfmapi.'&artist='.$title;
			$xml = simplexml_load_file($xmlFile);
				foreach ( $xml->artist  as $arti )  
				{
				$mbidart = $arti->mbid;
				
				echo $mbidart ;
					}
?>