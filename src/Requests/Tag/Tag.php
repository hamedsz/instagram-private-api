<?php


namespace hamedsz\instagram_private_api\Requests\Tag;


use hamedsz\instagram_private_api\Instagram;
use hamedsz\instagram_private_api\Requests\Request;

class Tag extends Request
{
    public $method = "GET";

    public function __construct(Instagram $insta , $tag)
    {
        parent::__construct($insta);

        $this->url = "/explore/tags/". $tag . "/?__a=1";
    }
}
