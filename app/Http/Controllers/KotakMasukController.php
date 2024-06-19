<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KotakMasukController extends Controller
{
    public function index()
    {
        $permohonans = Formulir::whereIn('status', ['ceklist', 'pengujian'])
            ->orderBy('id', 'DESC')
            ->get();
        return view('dashboard.kotak_masuk.index', compact('permohonans'));
    }

    public function show($code_form)
    {
        $permohonan = Formulir::where('code_form', $code_form)->first();
        return view('dashboard.kotak_masuk.show', compact('permohonan'));
    }
}
