<?php

error_reporting(E_ALL);

if (isset($_GET['urlfile']) && !empty($_GET['urlfile']) && $_GET['urlfile'] != 'undefined')
{ 

   $url = $_GET['urlfile'];
   
if($fh = fopen($url,'w')){

		echo 'File created';
		fclose($fh);
		}else{
			
			echo 'Error path for file';
			
		}

}
else
{	

echo 'Error get data';	

}
?>
