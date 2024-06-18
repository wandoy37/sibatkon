<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    public function permohonan_pengujian_index()
    {
        $permohonans = Formulir::orderBy('id', 'DESC')->get();
        return view('dashboard.permohonan_pengujian.index', compact('permohonans'));
    }

    public function checklist_create($code_form)
    {
        $permohonan = Formulir::where('code_form', $code_form)->first();
        return view('dashboard.checklist.create', compact('permohonan'));
    }
}
