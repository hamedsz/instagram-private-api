<?php

require_once '../vendor/autoload.php';

use hamedsz\instagram_private_api\Instagram;
use hamedsz\instagram_private_api\Requests\Explore\Explore;
use hamedsz\instagram_private_api\Responses\Explore\ExploreResponse;

$serial = file_get_contents("accont.txt");
$insta = unserialize($serial);

$userID = $_GET["id"] ?? 0;

$highlight = new \hamedsz\instagram_private_api\Requests\Highlight\Story($insta , $userID);
$resp = json_decode($highlight->execute()->body);

dd($resp);