<?php


namespace hamedsz\instagram_private_api\Requests\Main;


use hamedsz\instagram_private_api\Requests\Request;

class Main extends Request
{
    public $url = "/";
    public $method = "GET";
    public $headers = [];
    public $setHeader = false;
}
