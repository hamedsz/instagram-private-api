<?php


namespace hamedsz\instagram_private_api\Requests;


use hamedsz\instagram_private_api\Consts\Data;
use hamedsz\instagram_private_api\Instagram;

abstract class Request
{
    protected $instagram;
    public $url;
    public $method = "GET";
    public $headers = [];
    public $form;
    public $setHeader = false;


    public function __construct(Instagram $insta)
    {
        $this->instagram = $insta;
    }

    public function execute()
    {
        return $this->instagram->sendRequest($this);
    }
}
