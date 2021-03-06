<?php

namespace hamedsz\instagram_private_api\Requests\Highlight;

use hamedsz\instagram_private_api\Instagram;
use hamedsz\instagram_private_api\Requests\Request;

class Highlight extends Request
{
    public function __construct(Instagram $insta , $user_id , $reels = true , $highlights = true ,  $live_status = true)
    {
        parent::__construct($insta);

        $query = "d4d88dc1500312af6f937f7b804c68c3";

        $this->url = "/graphql/query/?query_hash=" . $query . "&variables=";

        $arr = [
            'user_id'                   => $user_id,
            'include_chaining'          => false,
            'include_reel'              => $reels,
            'include_suggested_users'   => false,
            'include_logged_out_extras' => false,
            'include_highlight_reels'   => $highlights,
            'include_live_status'       => $live_status,
        ];
        $this->url .= urlencode(json_encode($arr));
    }
}