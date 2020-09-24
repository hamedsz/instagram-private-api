<?php


namespace hamedsz\instagram_private_api\Requests\Profile;


use hamedsz\instagram_private_api\Instagram;
use hamedsz\instagram_private_api\Requests\Request;

class Profile extends Request
{
    public $method = "GET";

    public function __construct(Instagram $insta , $username)
    {
        parent::__construct($insta);

        $this->url = "/". $username . "/?__a=1";
    }
}
