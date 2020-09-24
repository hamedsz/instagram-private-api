<?php


namespace hamedsz\instagram_private_api\Requests\Profile;


use hamedsz\instagram_private_api\Instagram;
use hamedsz\instagram_private_api\Requests\Request;

class Pages extends Request
{
    public $url = "/graphql/query/";
    public $method = "GET";

    public function __construct(Instagram $insta , $id ,  $first , $after)
    {
        parent::__construct($insta);
        $query_hash = "bfa387b2992c3a52dcbe447467b4b771";
        $variables = [
            "id"    => $id,
            "first" => $first,
            "after" => $after
        ];

        $variables = urlencode(json_encode($variables));

        $form = [
            "query_hash" => $query_hash,
            "variables"  => $variables
        ];

        $val = "?";
        foreach ($form as $name => $value)
        {
            $val .= $name . "=" . $value . "&";
        }

        $val = substr($val , 0 , -1);

        $this->url = $this->url . $val;
    }
}
