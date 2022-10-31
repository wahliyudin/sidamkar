<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'jenis_jabatan' => ['required']
        ];
        if (request()->jenis_aparatur == 'struktural') {
            $rules['file_sk'] = 'required';
        }
        if (request()->jenis_jabatan == 'kab_kota') {
            $rules['kab_kota'] = 'required';
        }
        if (in_array(request()->jenis_jabatan, ['kab_kota', 'provinsi'])) {
            $rules['file_permohonan'] = 'required';
        }
        return $rules;
    }

    public function messages()
    {
        $messages = [
            'jenis_jabatan.required' => 'Jenis Aparatur wajib diisi'
        ];
        return $messages;
    }
}
