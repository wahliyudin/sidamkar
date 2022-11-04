<?php

namespace App\Http\Controllers\Kemendagri\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Role;
use App\Traits\ImageTrait;

class InformasiController extends Controller
{
    use ImageTrait;
    public function index(){
        $roles= Role::query()->get();
        return view('kemendagri.cms.informasi.index', compact("roles"));
    }

    public function store(Request $request){
        // $validate = $request->validate([

        // ]);
        try{
            if ($request->hasFile('file')) {
                $this->storeFile($request->file('file'), 'informasi');
            }
            $roles = [];
            for ($i=0; $i < count($request->role); $i++) { 
                if($request->role[$i] == 'aparatur'){
                    $roles = array_merge($roles, [1,2,3,4,5,6,7,11,12,13]);
                }else{
                    $roles = array_merge($roles, [$request->role[$i]]);
                }
            }

            $create = Informasi::query()->create(
                [
                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi,
                ]
            )->roles()->attach($roles);

            return $roles ;
        }catch(\Throwable $e){
            return $e;
        }
    }
}
