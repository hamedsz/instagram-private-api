<?php

require_once '../vendor/autoload.php';

<<<<<<< HEAD
use hamedsz\instagram_private_api\Instagram;
use hamedsz\instagram_private_api\Requests\Explore\Explore;
use hamedsz\instagram_private_api\Responses\Explore\ExploreResponse;

$serial = file_get_contents("accont.txt");
$insta = unserialize($serial);

$maxID = $_GET["id"] ?? 0;

$explore = new Explore($insta , $maxID);
$resp = new ExploreResponse($explore->execute()->body);

dd($resp->medias);
=======
//use hamedsz\instagram_private_api\Instagram;

$serial = file_get_contents("accont.txt");

var_dump($serial);
>>>>>>> 280b0c33c75ac863f874184c533065f459747982
