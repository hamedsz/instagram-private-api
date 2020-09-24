<?php


namespace hamedsz\instagram_private_api\Requests\FriendShips;


use hamedsz\instagram_private_api\Instagram;
use hamedsz\instagram_private_api\Requests\Request;

class UnFollow extends Request
{
    public $method = "POST";
    public $headers = [];
    public $setHeader = true;

    public function __construct(Instagram $insta , $id)
    {
        parent::__construct($insta);

        $this->url = "/web/friendships/" . $id . "/unfollow/";

    }
}
