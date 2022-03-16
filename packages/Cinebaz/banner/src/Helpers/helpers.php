<?php

use Cinebaz\Banner\Models\Slider;
use Cinebaz\Media\Models\Media;

if (!function_exists('is_banner')) {
    function is_banner()
    {

        return true;
    }
}

if (!function_exists('getSliderArr')) {
    function getSliderArr()
    {
        $data = Slider::get();
        $result = [];
        foreach($data as $list){
            $result[$list->id] = $list->title;
        }

        return $result;
    }
}
if (!function_exists('getMeidaArr')) {
    function getMeidaArr()
    {

        $data = Media::get();
        $result = [];
        foreach($data as $list){
            $result[$list->id] = $list->title_en;
        }

        return $result;
    }
}
