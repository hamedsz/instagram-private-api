<?php


namespace hamedsz\instagram_private_api\Requests\Post;


use hamedsz\instagram_private_api\Instagram;
use hamedsz\instagram_private_api\Requests\Request;

class Comment extends Request
{

    public function __construct(Instagram $insta , $shortcode , $first , $after)
    {
        parent::__construct($insta);

        $query = "bc3296d1ce80a24b1b6e40b1e72903f5";

        $this->url = "/graphql/query/?query_hash=" . $query . "&variables=";

        $arr = [
            'shortcode' => $shortcode,
            'first'     => $first,
            'after'     => $after
        ];
        $this->url .= urlencode(json_encode($arr));
    }
}
