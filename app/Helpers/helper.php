<?php

use Illuminate\Support\Facades\File;

if (!function_exists('deleteImage')) {
    function deleteImage($image)
    {
        return File::delete(public_path(str($image)->replace(url('/') . '/', '')));
    }
}

if (!function_exists('getAllRoleFungsional')) {
    function getAllRoleFungsional(): array
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
if (!function_exists('getAllRoleStruktural')) {
    function getAllRoleStruktural(): array
    {
        return [
            'atasan_langsung',
            'penilai_ak',
            'penetap_ak',
        ];
    }
}
if (!function_exists('getAllRoleProvKabKota')) {
    function getAllRoleProvKabKota(): array
    {
        return [
            'kab_kota',
            'provinsi'
        ];
    }
}
