<?php

use Illuminate\Support\Facades\File;

if (!function_exists('deleteImage')) {
    function deleteImage($image)
    {
        return File::delete(public_path(str($image)->replace(url('/').'/', '')));
    }
}
