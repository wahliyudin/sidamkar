<?php

namespace App\Http\Requests\DataAparatur;

// use Model
use App\Models\UserAparatur;

use Illuminate\Foundation\Http\FormRequest;

// use simfony
use Symfony\Component\HttpFoundation\Response;

class StoreDataAparatur extends FormRequest
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
        return [
            'nama' => [
                'required', 'string', 'max:255',
            ],
            'nip' => [
                'required', 'integer', 'max:255',
            ],
            'pangkat_golongan_tmt' => [
                'required', 'string', 'max:255',
            ],
            'nomor_karpeg' => [
                'required', 'string', 'max:255',
            ],
            'pendidikan_terakhir' => [
                'required', 'string', 'max:255',
            ],
            'tempat_lahir' => [
                'required', 'string', 'max:255',
            ],
            'tanggal_lahir' => [
                'required', 'dateTime', 'max:255',
            ],
            'jenis_kelamin' => [
                'required', 'string', 'max:255',
            ],
            'kab_kota_id' => [
                'required', 'string', 'max:255',
            ],
            'provinsi_id' => [
                'required', 'string', 'max:255',
            ],
        ];
    }
}
