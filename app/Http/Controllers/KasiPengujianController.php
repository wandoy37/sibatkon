<?php

namespace App\Http\Controllers;

use App\Models\KasiPengujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class KasiPengujianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kasi_pengujians = KasiPengujian::all();
        return view('dashboard.kasi_pengujian.index', compact('kasi_pengujians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kasi_pengujian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            KasiPengujian::create([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'jabatan' => $request->jabatan,
            ]);
            return redirect()->route('kasi-pengujian.index')->with('success', 'Data Kasi Pengujian Berhasil Di Tambahkan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Bahan Gagal Di Tambahkan');
        } finally {
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kp = KasiPengujian::find($id);
        return view('dashboard.kasi_pengujian.edit', compact('kp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            $kp = KasiPengujian::find($id);
            $kp->update([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'jabatan' => $request->jabatan,
            ]);
            return redirect()->route('kasi-pengujian.index')->with('success', 'Data Kasi Pengujian Berhasil Di Update');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Bahan Gagal Di Update');
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $kp = KasiPengujian::find($id);
            $kp->delete();
            return redirect()->route('kasi-pengujian.index')->with('success', 'Data Kasi Pengujian Berhasil Di Hapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Bahan Gagal Di Hapus');
        } finally {
            DB::commit();
        }
    }
}
