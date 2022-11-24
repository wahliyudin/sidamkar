<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'no_hp' => ['required', 'numeric']
        ];
        if (request()->jenis_aparatur == 'fungsional_umum') {
            $rules['jenis_jabatan_umum'] = 'required';
            if (request()->jenis_jabatan_umum == 'lainnya') {
                if (in_array(str(request()->jenis_jabatan_text)->snake(), array_merge(getAllRoleFungsional(), getAllRoleStruktural(), getAllRoleProvKabKota(), ['kemendagri']))) {
                    throw ValidationException::withMessages(['jenis_jabatan_text' => 'Jenis Jabatan Baru Tidak Diizinkan']);
                }
                if (Role::query()->where('name', str(request()->jenis_jabatan_text)->snake())->first()) {
                    throw ValidationException::withMessages(['jenis_jabatan_text' => 'Jenis Jabatan Baru Sudah Ada']);
                }
                $rules['jenis_jabatan_text'] = 'unique:roles,name|required|min:3';
            }
        } elseif (request()->jenis_aparatur == 'struktural') {
            $rules['jenis_eselon'] = 'required';
        } else {
            $rules['jenis_jabatan'] = 'required';
            if (request()->jenis_jabatan == 'kab_kota') {
                $rules['kab_kota_id'] = 'required';
            }
        }
        if (in_array(request()->jenis_jabatan, ['kab_kota', 'provinsi'])) {
            $rules['file_permohonan'] = 'required';
        }
        return $rules;
    }

    public function messages()
    {
        $messages = [
            'jenis_jabatan.required' => 'Jenis Aparatur wajib diisi',
            'jenis_jabatan_umum.required' => 'Jenis Aparatur wajib diisi',
            'jenis_jabatan_text.required' => 'Jenis Aparatur Baru wajib diisi',
            'jenis_jabatan_text.min:3' => 'Jenis Aparatur Baru Minimal 3 Huruf',
        ];
        return $messages;
    }
}
