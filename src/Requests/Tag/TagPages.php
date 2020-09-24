<?php


namespace hamedsz\instagram_private_api\Requests\Tag;


use hamedsz\instagram_private_api\Instagram;
use hamedsz\instagram_private_api\Requests\Request;

class TagPages extends Request
{
    public $url = "/graphql/query/";
    public $method = "GET";

    public function __construct(Instagram $insta , $tagName ,  $first , $after)
    {
        parent::__construct($insta);
        $query_hash = "9b498c08113f1e09617a1703c22b2f32";
        $variables = [
            "tag_name"    => $tagName,
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
