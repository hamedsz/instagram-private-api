<?php


namespace hamedsz\instagram_private_api\Responses\Accont;


use hamedsz\instagram_private_api\Responses\Response;

class LoginResponse extends Response
{
    public $status = false;
    public $message;
    public $two_factor = false;
    public $two_factor_info;

    public function __construct($json)
    {
        parent::__construct($json);

        if ($this->_resp->stauts == "ok")
        {
            if ($this->_resp->authenticated)
            {
                $this->status = true;
            }
            else
            {
                if (!$this->_resp->user)
                {
                    $this->message = "user_not_found";
                }
                else
                {
                    $this->message = "password_incorrect";
                }
            }
        }
        else
        {
            if (property_exists($this->_resp , "two_factor_required"))
            {
                if ($this->_resp->two_factor_required)
                {
                    $this->two_factor = true;
                    $this->two_factor_info = $this->_resp->two_factor_info;
                }
            }

        }
    }

}
