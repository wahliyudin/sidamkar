<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KegiatanJabatanRequest extends FormRequest
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
            'role_id' => 'required',
            'unsur' => 'required',
            'sub_unsurs' => 'required|array'
        ];
        if (isset(request()->sub_unsurs)) {
            foreach (request()->sub_unsurs as $a => $val) {
                $rules['sub_unsurs.' . $a . '.name'] = 'required';
                if (isset(request()->sub_unsurs[$a]['butir_kegiatans'])) {
                    foreach (request()->sub_unsurs[$a]['butir_kegiatans'] as $b => $value) {
                        $rules['sub_unsurs.'.$a.'.butir_kegiatans.' . $b] = "required";
                    }
                } else {
                    $rules['sub_unsurs.' . $a . '.butir_kegiatans'] = 'required';
                }
                if (isset(request()->sub_unsurs[$a]['angka_kredits'])) {
                    foreach (request()->sub_unsurs[$a]['angka_kredits'] as $c => $value) {
                        $rules['sub_unsurs.'.$a.'.angka_kredits.' . $c] = "required";
                    }
                } else {
                    $messages['sub_unsurs.' . $a . '.angka_kredits'] = "required";
                }
            }
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'role_id.required' => 'Jabatan Harus diisi',
            'sub_unsurs.array' => 'Sub Unsurs Harus diisi'
        ];
        if (isset(request()->sub_unsurs)) {
            foreach (request()->sub_unsurs as $a => $val) {
                $urut = $a + 1;
                $messages['sub_unsurs.' . $a . '.name.required'] = "Sub Unsur ke-$urut harus diisi";
                if (isset(request()->sub_unsurs[$a]['butir_kegiatans'])) {
                    foreach (request()->sub_unsurs[$a]['butir_kegiatans'] as $b => $value) {
                        $urutb = $b + 1;
                        $messages['sub_unsurs.'.$a.'.butir_kegiatans.' . $b . '.required'] = "Butir Kegiatan ke-$urutb harus diisi";
                    }
                } else {
                    $messages['sub_unsurs.' . $a . '.butir_kegiatans.required'] = "Butir Kegiatan ke-$urut harus diisi";
                }
                if (isset(request()->sub_unsurs[$a]['angka_kredits'])) {
                    foreach (request()->sub_unsurs[$a]['angka_kredits'] as $c => $value) {
                        $urutb = $c + 1;
                        $messages['sub_unsurs.'.$a.'.angka_kredits.' . $c . '.required'] = "Angka Kredit ke-$urutb harus diisi";
                    }
                } else {
                    $messages['sub_unsurs.' . $a . '.angka_kredits.required'] = "Angka Kredit ke-$urut harus diisi";
                }
            }
        }
        return $messages;
    }
}
