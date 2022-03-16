<?php

use Cinebaz\Category\Models\Category;
use Cinebaz\Genre\Models\Genre;
use Cinebaz\Tag\Models\Tag;
use Cinebaz\Media\Models\Media;
use Cinebaz\Artist\Models\Artist;

if (!function_exists('is_media')) {
    function is_media()
    {
        return true;
    }
}



if (!function_exists('fdate')) {
    function fdate($data, $formate = 'Y-m-d')
    {
        if (isset($data)) {
            return date($formate, strtotime($data));
        } else {
            return null;
        }
    }
}

if (!function_exists('fdata')) {
    function fdata($data)
    {
        if (isset($data)) {
            return $data;
        } else {
            return null;
        }
    }
}

if (!function_exists('getCategoryArr')) {
    function getCategoryArr()
    {
        $data = Category::where(['is_active' => 'Yes'])->get();
        // dd($data);
        $result = [];
        foreach ($data as $list) {
            $result[$list->id] = $list->title_english;
        }
        return $result;
    }
}

if (!function_exists('getArtistArr')) {
    function getArtistArr()
    {
        $data = Artist::where(['is_active' => 'Yes'])->get();
        // dd($data);
        $result = [];
        foreach ($data as $list) {
            $result[$list->id] = $list->name;
        }
        return $result;
    }
}
if (!function_exists('getMovieArr')) {
    function getMovieArr()
    {
        $data = Media::where(['is_active' => 'Yes'])->get();
        // dd($data);
        $result = [];
        foreach ($data as $list) {
            $result[$list->id] = $list->title_en;
        }
        return $result;
    }
}



if (!function_exists('getTagArr')) {
    function getTagArr()
    {
        $data = Tag::where(['is_active' => 'Yes'])->get();
        // dd($data);
        $result = [];
        foreach ($data as $list) {
            $result[$list->id] = $list->title_en;
        }
        return $result;
    }
}
if (!function_exists('getGenreArr')) {
    function getGenreArr()
    {
        $data = Genre::where(['is_active' => 'Yes'])->get();
        // dd($data);
        $result = [];
        foreach ($data as $list) {
            $result[$list->id] = $list->title_en;
        }
        return $result;
    }
}

if (!function_exists('boolStatusArr')) {
    function boolStatusArr()
    {
        return [
            0 => 'Inactive',
            1 => 'Active',
        ];
    }
}
if (!function_exists('boolPublishArr')) {
    function boolPublishArr()
    {
        return [
            0 => 'Unpublished',
            1 => 'Published',

        ];
    }
}
if (!function_exists('boolPremiumArr')) {
    function boolPremiumArr()
    {
        return [
            0 => 'Free',
            1 => 'Premium',
        ];
    }
}
if (!function_exists('PayCurrency')) {
    function PayCurrency($val = null)
    {
        if ($val) {
            return $mdata['currency'] = 'BDT' . ' ' . $val;
        } else {
            return $mdata['currency'] = 'BDT' . ' ';
        }
    }
}
if (!function_exists('getWeek')) {
    function getWeek()
    {
        $timestamp = strtotime("last sunday");
        // $now = time();
        $days = array();
        for ($i = 0; $i < 7; $i++) {
            $days[] = strftime('%A', $timestamp);
            $timestamp = strtotime('+1 day', $timestamp);
            // $days[] = strftime('%A', $now); $now += 60*60*24;
        }
        // $days = [ 'Saturday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Sunday' ]; 
        // // $days = array();
        //  for ($i = 0; $i < 7; $i++) { $days[$i] = jddayofweek($i,1); }
        // for($i=8;$i<1;$i++) $days [] = date("l",mktime(0,0,0,3,28,2009)+$i * (3600*24));

        return $days;
    }
}
if (!function_exists('week_from_monday')) {
    function week_from_monday()
    {

        $previous_week = strtotime("+1 day");

        $start_week = strtotime("last sunday", $previous_week);
        $end_week = strtotime("next saturday", $start_week);

        $start_week = date("Y-m-d", $start_week);
        $end_week = date("Y-m-d", $end_week);

        return $start_week . ' ' . $end_week;
    }
}
