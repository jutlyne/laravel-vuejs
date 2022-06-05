<?php

use Illuminate\Http\Request;

if (!function_exists('upload_image')) {
    function upload_image($request)
    {
        if ($request->file('images')) {
            return $request->file('images')->store('/', 'public');
        }
    }
}