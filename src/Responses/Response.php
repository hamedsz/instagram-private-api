<?php


namespace hamedsz\instagram_private_api\Responses;


class Response
{

    protected $_resp;

    public function __construct($json)
    {
        $this->_resp = json_decode($json);
    }
}
