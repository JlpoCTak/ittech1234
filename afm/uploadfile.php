<?php


error_reporting(E_ALL);

    $msg = '';

 if(count($_FILES['file']['name']) > 0 && !empty($_FILES['file']['name']) && $_FILES['file']['name'] != 'undefined'){
       
        for($i = 0; $i < count($_FILES['file']['name']); $i++) {
		
		$shortname = $_FILES['file']['name'][$i];

         
            $tmpFilePath = $_FILES['file']['tmp_name'][$i];

         
            if($tmpFilePath != ""){
                

				if (isset($_POST['inputpath']) && !empty($_POST['inputpath']) && $_POST['inputpath'] != 'undefined' && stream_resolve_include_path($_POST['inputpath']))
                $filePath = $_POST['inputpath'].$_FILES['file']['name'][$i];

                
                if(move_uploaded_file($tmpFilePath, $filePath)) {
				
                $msg .= $shortname.'/';

                }
              }
        }
		echo $msg;
    }

?>
