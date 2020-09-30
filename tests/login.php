<?php

require_once '../vendor/autoload.php';

use hamedsz\instagram_private_api\Instagram;

$insta = Instagram::create('USERNAME' , 'PASSWORD');
$resp = $insta->login();

file_put_contents("accont.txt" , serialize($insta));
echo "ok";