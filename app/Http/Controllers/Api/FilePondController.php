<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilePondController extends Controller
{
    use ImageTrait;

    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'file_permohonan' => 'mimes:pdf',
            'file_sk' => 'mimes:pdf,doc,docx',
        ]);

        if ($valid->invalid()) {
            return response(json_encode($valid->errors()), 300);
        }
        $file = '';
        if ($request->file('file_sk') != null) {
            $file = $this->storeImageFilePond($request->file('file_sk'), 'struktural');
        }
        if ($request->file('file_permohonan') != null) {
            $file = $this->storeImageFilePond($request->file('file_permohonan'), 'kabkota');
        }

        return response(json_encode($file), 200);
    }

    public function destroy(Request $request)
    {
        $this->deleteImageFilePond($request->name);
        return response(json_encode('success'), 200);
    }
}
