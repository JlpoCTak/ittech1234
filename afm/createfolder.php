<?php

error_reporting(E_ALL);

if (isset($_GET['urlfolder']) && !empty($_GET['urlfolder']) && $_GET['urlfolder'] != 'undefined')
{ 

   $url = $_GET['urlfolder'];
   
      if (mkdir($url, 0777, true))
		{

		echo 'Directory created';
		
		}else{
			
			echo 'Error path for folder';
			
		}

}
else
{	

echo 'Error get data';	

}
?>
