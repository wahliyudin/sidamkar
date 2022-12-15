<?php

namespace App\Http\Requests\Aparatur\LaporanKegiatan\ButirKegiatan;

use Illuminate\Foundation\Http\FormRequest;

class StorePenunjangProfesiRequest extends FormRequest
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
            'detail_kegiatan' => 'required',
            'butir_kegiatan' => 'required',
            'current_date' => 'required',
            'doc_kegiatan_tmp' => 'nullable',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'doc_kegiatan_tmp.required' => 'Dokemen Kegiatan Wajib Diisi',
            'current_date' => 'Tanggal Wajib Diisi'
        ];
    }
}