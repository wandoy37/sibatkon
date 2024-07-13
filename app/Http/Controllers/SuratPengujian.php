<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use App\Models\KasiPengujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SuratPengujian extends Controller
{
    public function index()
    {
        $formulirs = Formulir::where('status', 'pengujian')->get();
        return view('dashboard.surat_pengujian.index', compact('formulirs'));
    }

    public function create()
    {
        $formulirs = Formulir::where('status', 'ceklist')->get();
        $kasi_pengujians = KasiPengujian::all();
        return view('dashboard.surat_pengujian.create', compact('formulirs', 'kasi_pengujians'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code_form' => 'required',
            'kasi_pengujian_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            $formulir = Formulir::where('code_form', $request->code_form)->first();
            $formulir->update([
                'status' => 'pengujian',
                'kasi_pengujian_id' => $request->kasi_pengujian_id,
            ]);
            return redirect()->route('surat.pengujian.index')->with('success', 'Surat Pengujian Berhasil Di Terbitkan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Bahan Gagal Di Update');
        } finally {
            DB::commit();
        }
    }

    public function delete($code_form)
    {
        DB::beginTransaction();
        try {
            $formulir = Formulir::where('code_form', $code_form)->first();
            $formulir->update([
                'status' => 'ceklist',
                'kasi_pengujian_id' => null,
            ]);
            return redirect()->route('surat.pengujian.index')->with('success', 'Surat Pengujian Berhasil Di Hapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Bahan Gagal Di Update');
        } finally {
            DB::commit();
        }
    }
}
