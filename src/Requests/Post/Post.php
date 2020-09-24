<?php


namespace hamedsz\instagram_private_api\Requests\Post;


use hamedsz\instagram_private_api\Instagram;
use hamedsz\instagram_private_api\Requests\Request;

class Post extends Request
{
    public $method = "GET";

    public function __construct(Instagram $insta , $shortCode)
    {
        parent::__construct($insta);

        $this->url = "/p/". $shortCode . "/?__a=1";
    }
}
