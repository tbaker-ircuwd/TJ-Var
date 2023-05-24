<?php
$message_to_encrypt = $_GET['id'];
$secret_key = "pursuitofelite";
$method = "aes256";

$encrypted_message = openssl_encrypt($message_to_encrypt, $method, $secret_key, 0);

$id=urlencode($encrypted_message);
echo "https://integrityhomeexteriors.com/welcome-letter/?$id";
?>
