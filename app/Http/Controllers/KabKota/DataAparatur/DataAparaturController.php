<?php

namespace App\Http\Controllers\KabKota\DataAparatur;

use App\DataTables\KabKota\DataAparaturDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class DataAparaturController extends Controller
{
    public function index()
    {
        return view('kabkota.data-aparatur.pejabat-fungsional.index');
    }
}
