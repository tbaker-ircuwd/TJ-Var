<?php

//remember to trim() your inputs if you're using manually entered values
$apikey = "a48b49e7-e8b2-4751-bf50-529b82301fab";
$secretkey = "TYcp0B6tUvevnLGqKngI4k8N/9FWKXSoXObSvyqcD3s=";
$coy = "3119";
$secretkey = base64_decode(str_replace(['-', '_'], ['+', '/'], $secretkey));
$epoch = strval(time());
$messagebytes = $coy.$apikey.$epoch;
$newhash = hash_hmac('sha256', $messagebytes, $secretkey, true);
$computedhash64 = base64_encode($newhash);
$authstring = $coy . ":" . $apikey . ":" . $epoch . ":" . $computedhash64;


echo $epoch;
echo "<br>";
echo "Computed Hash: " . $computedhash64;
echo "<br>";
echo "Full Authorization String: " . $authstring;
?>

