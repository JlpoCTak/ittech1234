<?php



if(isset($_REQUEST["file"]) && !empty($_REQUEST["file"]) && $_REQUEST["file"] != 'undefined'){
	
	$dir = $_REQUEST["file"];

$folder = basename($dir);	
	

if (!empty ($folder) ){
$zip_file = $folder.'.zip';

} else{
	$zip_file = 'download.zip';
}


$rootPath = realpath($dir);

$zip = new ZipArchive();
$zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file)
{
    if (!$file->isDir())
    {

        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);


        $zip->addFile($filePath, $relativePath);
    }
}

$zip->close();

    if (ob_get_level()) {
      ob_end_clean();
	}

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename($zip_file));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($zip_file));
if (readfile($zip_file)){
	$zip = dirname(__FILE__).'/'. $zip_file;
     unlink($zip);
}
}




?>
