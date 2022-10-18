<?php

use Illuminate\Support\Facades\File;

if (!function_exists('deleteImage')) {
    function deleteImage($image)
    {
        return File::delete(public_path(str($image)->replace(url('/').'/', '')));
    }
}

if (!function_exists('getAllRoleAparatur')) {
    function getAllRoleAparatur(): array
    {
        return [
            "damkar_pemula",
            "damkar_terampil",
            "damkar_mahir",
            "damkar_penyelia",
            "analis_kebakaran_ahli_pertama",
            "analis_kebakaran_ahli_muda",
            "analis_kebakaran_ahli_madya"
        ];
    }
}
