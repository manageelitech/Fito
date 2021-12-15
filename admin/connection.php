<?php
//error_reporting(0);
class connClass
{
    var $conn;
    var $schExt;

    function __construct()
    {
        $this->schExt = 'sudha_';

       //$this->conn = mysqli_connect("localhost", "root", "", "fitohm") or die("Problem occur in connection");
       $this->conn = mysqli_connect('localhost','onlineba_minhaj','minhaj@#123456','onlineba_fitohm') or die("Problem occur in connection");
    }

    function encryptIt($value)
    {
        $salt = "valleydhnparttosggkisaolkdlosa";
        $iv = openssl_random_pseudo_bytes(16);
        $key = hash_pbkdf2('sha256', $salt, 'e0f60ad6e107197d927916dea871cca35ebbec88564d', 250, 16, true);
        $result = openssl_encrypt($value, 'aes-256-ctr', $key, OPENSSL_RAW_DATA, $iv);
        return bin2hex($iv) . bin2hex($result);

    }

    function decryptIt($jsonString)
    {
        $salt = "valleydhnparttosggkisaolkdlosa";
        $iv = hex2bin(substr($jsonString, 0, 32));
        $data = hex2bin(substr($jsonString, 32));
        $key = hash_pbkdf2('sha256', $salt, 'e0f60ad6e107197d927916dea871cca35ebbec88564d', 250, 16, true);
        return openssl_decrypt($data, 'aes-256-ctr', $key, OPENSSL_RAW_DATA, $iv);

    }
}
?>