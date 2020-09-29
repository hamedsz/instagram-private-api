<?php

require_once '../vendor/autoload.php';

use hamedsz\instagram_private_api\Instagram;

$serial = file_get_contents("accont.txt");

$insta = unserialize($serial);

dd($insta);