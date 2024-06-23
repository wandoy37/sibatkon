<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Formulir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $bahans = Bahan::all();
        return view('home.index', compact('bahans'));
    }

    public function registasi_pengujian()
    {
        $bahans = Bahan::all();
        return view('home.registrasi_pengujian.form_registrasi_pengujian', compact('bahans'));
    }

    public function registasi_pengujian_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // Identitas Pemohon
            'nama_pemohon' => 'required',
            'alamat_pemohon' => 'required',
            'no_hp_pemohon' => 'required',
            'email_pemohon' => 'required',

            // Bahan Konstruksi
            'bahan_id' => 'required',
            'quantity' => 'required',
            'keterangan_lain' => 'required',
            'uraian_pengujian' => 'required',
            'keperluan_pengujian' => 'required',

            // Pelaksana / Kontraktor
            'kontraktor_nama' => 'required',
            'kontraktor_alamat' => 'required',

            // Dokumen Permohonan
            'dokumen' => 'required|mimes:pdf|max:2048',
            // Sisa Contoh,
            'sisa_contoh' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('scroll_to_section', 'section_permohonan_pengujian');
        }

        // Upload Dokumen
        if ($request->file('dokumen')) {
            $file = $request->file('dokumen');

            // Menangkap nama asli file
            $originalName = $file->getClientOriginalName();

            // Membuat nama file unik
            $uniqueName = time() . '_' . $originalName;

            // Simpan file dengan nama unik
            $filePath = $file->storeAs('uploads', $uniqueName, 'public');
        }

        // Simpan Data Ke Database
        $dataInput = [
            'code_form' => $request->code_form,
            // Identitas Pemohon
            'nama_pemohon' => $request->nama_pemohon,
            'alamat_pemohon' => $request->alamat_pemohon,
            'no_hp_pemohon' => $request->no_hp_pemohon,
            'email_pemohon' => $request->email_pemohon,

            // Bahan Konstruksi
            'bahan_id' => $request->bahan_id,
            'quantity' => $request->quantity,
            'keterangan_lain' => $request->keterangan_lain,
            'uraian_pengujian' => $request->uraian_pengujian,
            'keperluan_pengujian' => $request->keperluan_pengujian,

            // Pelaksana / Kontraktor
            'kontraktor_nama' => $request->kontraktor_nama,
            'kontraktor_alamat' => $request->kontraktor_alamat,

            // Dokumen Permohonan
            'dokumen' => $filePath,
            // Sisa Contoh,
            'sisa_contoh' => $request->sisa_contoh,
            // Status Permohonan
            'status' => 'pengajuan',
        ];

        Formulir::create($dataInput);

        return redirect()->route('ticket.permohonan.pengujian', $request->code_form)->with('success', 'Permohonan Berhasil Dibuat');

        DB::beginTransaction();
        try {
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Permohonan Gagal Dibuat');
        } finally {
            DB::commit();
        }
    }

    public function ticket_permohonan_pengujian($code_form)
    {
        $formulir = Formulir::where('code_form', $code_form)->first();
        return view('home.ticket_permohonan_pengujian', compact('formulir'));
    }
}
