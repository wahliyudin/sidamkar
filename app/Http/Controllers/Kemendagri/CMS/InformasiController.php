<?php

namespace App\Http\Controllers\Kemendagri\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Role;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\DB;

class InformasiController extends Controller
{
    use ImageTrait;
    public function index(){
        $judul = 'CMS Informasi';
        $informasis = Informasi::query()->with('roles')->get()->map(function(Informasi $informasi){
            $str = '';
            if (count($informasi->roles) == 12) {
                $str .= 'Semua Jenjang';
            } else{
                foreach ($informasi->roles as $role) {
                    if (in_array($role->id, [1,2,3,4,5,6,7,11,12,13])) {
                        if (!str($str)->contains('Aparatur')) {
                            $str .= 'Aparatur';
                        }
                    }
                    if ($role->name == 'kab_kota') {
                        if (str($str)->contains('Aparatur')) {
                            $str .= ' & Kabupaten/Kota';
                        } else {
                            $str .= 'Kabupaten/Kota';
                        }
                    }
                    if ($role->name == 'provinsi') {
                        if (str($str)->contains('Aparatur') || str($str)->contains('Kabupaten/Kota')) {
                            $str .= ' & Provinsi';
                        } else {
                            $str .= 'Provinsi';
                        }
                    }
                }
            }
            $informasi->jenjang = $str;
            return $informasi;
        });
        return view('kemendagri.cms.informasi.index', compact('informasis', 'judul') );
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

            return response()->json([
                'status' => 200,
                'message' => 'Berhasil ditambahkan'
            ]);
        }catch(\Throwable $e){
            return response()->json([
                'status' => $e->getCode(),
                'message' => $e->getMessage()
            ]);
        }
    }

    public function edit($id){
        $informasis = Informasi::query()->with('roles')->where('id',$id)->get()->map(function(Informasi $informasi){
            $str = null;
            if (count($informasi->roles) == 12) {
                $str = 1;
            } else{
                foreach ($informasi->roles as $role) {
                    if (in_array($role->id, [1,2,3,4,5,6,7,11,12,13])) {
                        if (!str($str)->contains(2)) {
                            $str = 2;
                        }
                    }
                    if ($role->name == 'kab_kota') {
                        if (str($str)->contains(2)) {
                            $str = 5;
                        } else {
                            $str = 3;
                        }
                    }
                    if ($role->name == 'provinsi') {
                        if (str($str)->contains(2)) {
                            $str = 6;
                        }else if(str($str)->contains(3)){
                            $str = 7;
                        } 
                        else {
                            $str = 4;
                        }
                    }
                }
            }
            $informasi->jenjang = $str;
            return $informasi;
        });

        return response()->json([
            'status' => 200,
            'data' => $informasis
        ]);
    }

    public function update(Request $request, $id){
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

            $create = Informasi::query()->find($id);
            $create->update(
                [
                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi,
                ]
                );
            $create->roles()->sync($roles);
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil Diupdate'
            ]);
        }catch(\Throwable $e){
            return response()->json([
                'status' => $e->getCode(),
                'message' => $e->getMessage()
            ]);
        }
        
    }

    public function destroy($id){
        try {
            DB::table('role_informasis')->where('informasi_id', $id)->delete();
            Informasi::query()->find($id)->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
