<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePenilaiAndPenetapRequest extends FormRequest
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
            'tingkat' => 'required',
            'penilai' => 'required',
            'penetap' => 'required',
            'provinsi_id' => 'required',
            'tingkat_aparatur' => 'required'
        ];
        if (request()->tingat == 'kab_kota') {
            $rules['kab_kota_id'] = 'required';
        }
        return $rules;
    }
}