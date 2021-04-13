<?php


use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;

require "vendor/autoload.php";

// Do this once then store it somehow:
$key = Key::createNewRandomKey();

$message = '1234';

$encrypt = Crypto::encrypt($message, $key);
$decrypt = Crypto::decrypt($encrypt, $key);

print_r($encrypt);
print_r($decrypt);


