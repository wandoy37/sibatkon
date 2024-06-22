<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PermohonanController extends Controller
{
    public function permohonan_pengujian_index()
    {

        if (Auth::user()->role == 'penguji') {
            $permohonans = Formulir::whereIn('status', ['ceklist', 'pengujian'])
                ->orderBy('id', 'DESC')
                ->get();
        } else {
            $permohonans = Formulir::orderBy('id', 'DESC')->get();
        }
        return view('dashboard.permohonan_pengujian.index', compact('permohonans'));
    }

    public function checklist_create($code_form)
    {
        $permohonan = Formulir::where('code_form', $code_form)->first();
        return view('dashboard.checklist.create', compact('permohonan'));
    }

    public function permohonan_update_status(Request $request, $code_form)
    {
        DB::beginTransaction();
        try {
            $formulir = Formulir::where('code_form', $code_form)->first();
            $formulir->update([
                'status' => 'ceklist',
            ]);
            return redirect()->back()->with('success', 'Status Permohonan Berhasil Verifikasi ');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Status Permohonan Berhasil Verifikasi');
        } finally {
            DB::commit();
        }
    }

    public function update_setujui_permohonan($code_form)
    {
        DB::beginTransaction();
        try {
            $formulir = Formulir::where('code_form', $code_form)->first();
            $formulir->update([
                'status' => 'pengujian',
            ]);
            return redirect()->back()->with('success', 'Permohonan Berhasil Di Setujui ');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Permohonan Berhasil Di Setujui');
        } finally {
            DB::commit();
        }
    }
}
