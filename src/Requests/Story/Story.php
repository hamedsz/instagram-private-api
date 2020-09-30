<?php

namespace hamedsz\instagram_private_api\Requests\Story  ;

use hamedsz\instagram_private_api\Instagram;
use hamedsz\instagram_private_api\Requests\Request;

class Story extends Request
{
    public function __construct(Instagram $insta , $real_ids = [] , $highlight_real_id = [])
    {
        parent::__construct($insta);

        $query = "90709b530ea0969f002c86a89b4f2b8d";

        $this->url = "/graphql/query/?query_hash=" . $query . "&variables=";

        $arr = [
            'reel_ids'                    => $real_ids,
            'tag_names'                   => [],
            'location_ids'                => [],
            'highlight_reel_ids'          => $highlight_real_id,
            'precomposed_overlay'         => false,
            'show_story_viewer_list'      => true,
            'story_viewer_fetch_count'    => 50,
            'story_viewer_cursor'         => "",
            'stories_video_dash_manifest' => false,
        ];
        $this->url .= urlencode(json_encode($arr));
    }
}