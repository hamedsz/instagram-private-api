<?php


namespace hamedsz\instagram_private_api\Requests\Main;


use hamedsz\instagram_private_api\Requests\Request;

class Main2 extends Request
{
    public $url = "/web/__mid/";
    public $method = "GET";
    public $headers = [
        "cookie" => "ig_cb=1",
        "referer" => "https://www.instagram.com/",
        "user-agent" => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36",
        "x-ig-app-id"=> "936619743392459",
        "x-ig-www-claim"=> 0,
        "x-requested-with"=> "XMLHttpRequest"
    ];
    public $setHeader = false;
}
