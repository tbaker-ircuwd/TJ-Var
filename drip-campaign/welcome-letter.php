<?php

$prospect = array_key_first($_GET);
$secret_key = "pursuitofelite";
$method = "aes256";
$prospect = openssl_decrypt($prospect, $method, $secret_key, 0);

$url = "https://integrityprodserver.com/lpAjax.php?action=getProspect&prospect=$prospect";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$response = json_decode($response,true)[0];
$first = $response['FirstName'];
$last = $response['LastName'];
$product = $response['Productid'];

$html = file_get_contents('letter.html');
$html = str_replace("~firstname~",$first,$html);
$html = str_replace("~lastname~",$last,$html);
$html = str_replace("~product~",$product,$html);

$footer = file_get_contents('footer.html');
$js = file_get_contents('js/timeTrack.html');

echo $html;
echo $footer;
echo $js;
?>
