<?php


namespace hamedsz\instagram_private_api\Requests\Explore;


use hamedsz\instagram_private_api\Instagram;
use hamedsz\instagram_private_api\Requests\Request;

class Explore extends Request
{
    public function __construct(Instagram $insta , $maxID)
    {
        parent::__construct($insta);

        $this->url = "/explore/grid/?is_prefetch=false&omit_cover_media=false&module=explore_popular&use_sectional_payload=true&cluster_id=explore_all%3A0&include_fixed_destinations=true&max_id=";
        $this->url .= $maxID;
    }
}