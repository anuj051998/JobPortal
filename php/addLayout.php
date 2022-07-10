<?php

$raw = $_POST['raw'];
$id = $_POST['id'];
require "conn.php";
$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '1234567891011121';
$encryption_key = "anuj.av1999@gmail.com";
$encryption = openssl_encrypt($raw, $ciphering,$encryption_key, $options, $encryption_iv);
$sql = "UPDATE `jobs` set `layout` = '$encryption', `isAvailable`='YES' where `jobId` = '$id'";
if(!mysqli_query($conn, $sql))
    echo mysqli_error($conn);

?>