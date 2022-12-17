<?php


if(isset($_REQUEST["file"]) && !empty($_REQUEST['file']) && $_REQUEST['file'] != 'undefined'){
    
    $file = urldecode($_REQUEST["file"]);
     
    
    if(file_exists($file)) {

    if (ob_get_level()) {
      ob_end_clean();
	}
		
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        //flush(); // Flush system output buffer
	
 if ($fd = fopen($file, 'rb')) {
      while (!feof($fd)) {
        print fread($fd, 1024);
      }
      fclose($fd);
    }
        exit;
		
    }
}

?>
