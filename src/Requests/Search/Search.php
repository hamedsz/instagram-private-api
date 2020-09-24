<?php


namespace hamedsz\instagram_private_api\Requests\Search;


use hamedsz\instagram_private_api\Instagram;
use hamedsz\instagram_private_api\Requests\Request;

class Search extends Request
{

    public function __construct(Instagram $insta , $search)
    {
        parent::__construct($insta);

        $search = urlencode($search);
        $this->url = "/web/search/topsearch/?context=blended&query=". $search ."&rank_token=0.05689045110531987&include_reel=true";
    }
}
