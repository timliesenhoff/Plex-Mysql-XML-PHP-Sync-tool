<?php
include('../config.php');
					
					$name = "test";
					$xmlname = "test";
					
			if ($name == $xmlname){
			echo "ja";
                     }elseif(!$name != $xmlname){
						 goto a;
					 }
					 
					 echo "das soll nicht hier stehen";
					 
					 a: echo "ende";
					 
					 
					 
					 
					 