<?php

use App\Thumbnail;

class Utilities
{
    public static function getThumbnail($id)
    {
    	$result = DB::table('thumbnails')->where('layouts_id', '=', $id)->get();
    	return json_decode($result, true);      
    }

    public static function getDate()
    {
    	return 'a';
    }
}