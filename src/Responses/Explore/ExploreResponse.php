<?php


namespace hamedsz\instagram_private_api\Responses\Explore;
use hamedsz\instagram_private_api\Responses\Response;

class ExploreResponse extends Response
{
    public $medias;

    public function __construct($json)
    {
        parent::__construct($json);
        $this->_resp = $this->_resp->sectional_items;

        $medias = [];
        foreach ($this->_resp as $r)
        {
            if ($r->layout_type == "two_by_two_right" || $r->layout_type == "two_by_two_left")
            {
                $medias[] = $r->layout_content->two_by_two_item;
                $medias = array_merge($medias , $r->layout_content->fill_items);
            }
            else
            {
                $medias = array_merge($medias , $r->layout_content->medias);
            }
        }

        $this->medias = $medias;
    }

}
