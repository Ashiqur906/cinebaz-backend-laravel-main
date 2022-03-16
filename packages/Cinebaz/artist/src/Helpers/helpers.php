<?php
use Cinebaz\Artist\Models\Artist;

if (!function_exists('is_artist')) {           
    function is_artist()                            
    {                                     
        return true;
    }
}

if (!function_exists('get_artist_row')) {           
    function get_artist_row($slug)                            
    {   
        $artist = Artist::where('slug' , $slug)->first();                                    
        return $artist;
    }
}


if (!function_exists('dynamicslugVal')) {
    function dynamicslugVal(array $options)
    {
        $default = [
            'slug' => null,
            'table' => null,
            'column' => 'slug',
            'id' => null
        ];
        $search = array_merge($default, $options);
        $slug = uniqueSlug($search['slug']);
        $data = DB::table($search['table'])->where($search['column'], 'like', $slug . '%');

        if ($search['id']) {
            $data = $data->where('id', '!=', $search['id']);
        }
        $data = $data->get();
        if (!$data->contains($search['column'], $slug)) {

            return $slug;
        }
        $count = count($data) + 1;

        for ($i = 1; $i <= $count; $i++) {
            $newSlug = $slug . '-' . $i;

            if (!$data->contains($search['column'], $newSlug)) {
                return $newSlug;
            }
        }
    }
}


if (!function_exists('uniqueSlug')) {
    function uniqueSlug($string)
    {
        $slug = preg_replace('/[^\da-z ]/i', '-', strtolower(trim($string)));

        $slug = preg_replace('/[-\s]+/', '-', strtolower(trim($slug)));
        return $slug;
    }
}