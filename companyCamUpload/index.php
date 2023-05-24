<?php
require_once("/home/scripts/sharedFunctions.php");

function getDirContents($dir, &$results = array()) {
    $files = scandir($dir);

    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            $results[] = $path;
        } else if ($value != "." && $value != "..") {
            getDirContents($path, $results);
            $results[] = $path;
        }
    }

    return $results;
}

function is_image($path)
{
        $image_type = mime_content_type($path);
        if(in_array($image_type , array('image/gif','image/jpeg' ,'image/png' , 'image/bmp')))
        {
                return true;
        }
        return false;
}


$dir = "/home/LOCATIONS/(sw21storage)/02789/1001/(locations)";
$folders = array_diff(scandir($dir), array('..', '.'));
$go = false;
foreach($folders as $folder){
        if($folder != 102483 && $go == false){
                continue;
        }
        $go = true;
        if (!preg_match('/\b.\b/', $folder)) {
                print_r("$folder\n");
                $url = "http://intserver-api/lp/job.php?job_number=$folder";
                $errorMsg = "Failed to find jobID for jobNumber $folder";
                $retryLimit = 3;
                $jobNumber = curlCallWithRetries($url, $retryLimit, $errorMsg, false);
                if(count($jobNumber) > 0){
                        if(isset($jobNumber[0]['id'])){
				$address = urlencode($jobNumber[0]['address1']);
                                $jobNumber = $jobNumber[0]['id'];
				$url = "https://companycam.integrityprodserver.com/index.php?search=$address";
				print_r($url);
				$result = curlCall($url);
				print_r($result);
				die;
                                $sql = urlencode("Select filename from doc_documents WHERE rectype = 'job' AND recid = '$jobNumber'");
                                $exsisting = curlCall("http://intserver-api/lp/customReport.php?rptSQL=$sql");
                                $exsistingArray = array();
                                if(count($exsisting) > 0){
                                        foreach($exsisting as $fileName){
                                                $fileName = $fileName['filename'];
                                                $fileName = explode('_',$fileName);
                                                $realName = '';
                                                foreach($fileName as $index => $fileNamePart){
                                                        if($index != 0){
                                                                $realName .= $fileNamePart;
                                                        }
                                                }
                                                $exsistingArray[] = $realName;
                                        }
                                }
                                $jobFiles = getDirContents("$dir/$folder");
                                print_r($jobFiles);
                                foreach($jobFiles as $file){
                                        if(!is_dir($file) && !is_image($file)){
                                                $name = explode('/',$file);
                                                $name = end($name);
                                                if(in_array($name,$exsistingArray)){
                                                        echo"$name already uploaded\n";
                                                        continue;
                                                }
                                                print_r($name);
                                                $fileDesc = "Uploaded Automatically from SuccessWare21";
                                                $fileType = "successware";
                                                $notes = "";
                                                $result = $lp_api -> uploadImageToJob($file,$fileDesc,$notes,$jobNumber);
                                                print_r("Result:");
                                                print_r($result);
                                        }
                                }
                        }
                }else{
                        print_r("Unable to find jobID for jobNumber $folder");
                }
        }
}


?>
