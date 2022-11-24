<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\AuthTrait;
use App\Traits\ScoringTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CobaController extends Controller
{
    use ScoringTrait, AuthTrait;

    public function index()
    {
        $order = 'asc';
        // return User::select([
        //     'users.*',
        //     'user_pejabat_strukturals.id',
        //     'user_pejabat_strukturals.provinsi_id',
        //     'user_pejabat_strukturals.tingkat_aparatur',
        //     'user_pejabat_strukturals.nama',
        // ])
        //     ->join('user_pejabat_strukturals', 'users.id', '=', 'user_pejabat_strukturals.user_id')
        //     ->where('user_pejabat_strukturals.provinsi_id', $this->authUser()->load('userProvKabKota')->userProvKabKota->provinsi_id)
        //     ->where('user_pejabat_strukturals.tingkat_aparatur', 'provinsi')
        //     ->orderBy('user_pejabat_strukturals.nama', $order)
        //     ->get();
        return User::query()->with(['roles'])->withWhereHas('userPejabatStruktural', function ($query) {
            $query->where('provinsi_id', $this->authUser()->load('userProvKabKota')->userProvKabKota->provinsi_id)
                ->where('tingkat_aparatur', 'provinsi');
        })
            ->latest()->getQuery()->toSql();
        // select * from `users` where exists (select * from `user_pejabat_strukturals` where `users`.`id` = `user_pejabat_strukturals`.`user_id` and `provinsi_id` = ? and `tingkat_aparatur` = ?) order by `user_pejabat_strukturals`.`nama` asc, `created_at` desc
    }
}
