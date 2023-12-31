<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLaporanRequest extends FormRequest
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
            'keterangan' => 'required',
        ];
        if (request()->rencana_count <= 0) {
            $rules['rencana_id'] = 'required';
        }
        return $rules;
    }

    public function messages()
    {
        return [

        ];
    }
}
