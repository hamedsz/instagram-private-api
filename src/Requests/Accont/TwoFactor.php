<?php


namespace hamedsz\instagram_private_api\Requests\Accont;


use hamedsz\instagram_private_api\Instagram;
use hamedsz\instagram_private_api\Requests\Request;

class TwoFactor extends Request
{
    public $url = "/accounts/login/ajax/two_factor/";
    public $method = "POST";
    public $setHeader = true;

    public function __construct(Instagram $insta , $code , $identifier)
    {
        parent::__construct($insta);

        $this->form = [
            "username" => $insta->getUsername(),
            "verificationCode" => $code,
            "identifier" => $identifier
        ];
    }
}
