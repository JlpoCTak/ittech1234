<?php


error_reporting(E_ALL);

if (isset($_GET['file']) && !empty($_GET['file']) && $_GET['file'] != 'undefined')
{ 

   $url = $_GET['file'];
   
      if (unlink($url))
		{

		echo 'File deleted';
		
		}else{
			
			echo 'Error delete file';
			
		}

}
else
{	

echo 'Error get data';	

}
?>
