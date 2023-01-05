<?php

use App\Models\Periode;
use Carbon\Carbon;
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

if (!function_exists('getAllRoleFungsionalDamkar')) {
    function getAllRoleFungsionalDamkar(): array
    {
        return [
            "damkar_pemula",
            "damkar_terampil",
            "damkar_mahir",
            "damkar_penyelia"
        ];
    }
}

if (!function_exists('getAllRoleFungsionalAnalis')) {
    function getAllRoleFungsionalAnalis(): array
    {
        return [
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
if (!function_exists('concatPriodeY')) {
    function concatPriodeY($periode)
    {
        return Carbon::make($periode->awal)->format('Y') . " - " . Carbon::make($periode->akhir)->format('Y');
    }
}
if (!function_exists('concatPriodeFY')) {
    function concatPriodeFY($periode)
    {
        return Carbon::make($periode->awal)->translatedFormat('F Y') . " - " . Carbon::make($periode->akhir)->translatedFormat('F Y');
    }
}
if (!function_exists('linkToBasePath')) {
    function linkToBasePath($link)
    {
        return public_path(str($link)->replace(env('APP_URL') . '/', ''));
    }
}
