<?php


namespace hamedsz\instagram_private_api\Requests\data;


use hamedsz\instagram_private_api\Instagram;
use hamedsz\instagram_private_api\Requests\Request;

class SharedData extends Request
{
    public $method = "GET";
    public $url = "/data/shared_data/";
    public $headers = [];
    public $setHeader = false;
}
