<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\Formulir;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChecklistController extends Controller
{
    public function index()
    {
        $checklists = Checklist::orderBy('id', 'DESC')->get();
        Carbon::setLocale('id');
        return view('dashboard.checklist.index', compact('checklists'));
    }
    public function create()
    {
        $formulirs = Formulir::where('status', 'pengajuan')->get();
        return view('dashboard.checklist.create', compact('formulirs'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'formulir_id' => 'required',
            'diterima_tanggal' => 'required',
            'job_mix' => 'required',
            'no_spu' => 'required',
            'tahun_anggaran' => 'required',
            'penerima_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            Checklist::create([
                'formulir_id' => $request->formulir_id,
                'diterima_tanggal' => $request->diterima_tanggal,
                'job_mix' => $request->job_mix,
                'no_spu' => $request->no_spu,
                'tahun_anggaran' => $request->tahun_anggaran,
                'penerima_id' => $request->penerima_id
            ]);

            $formulir = Formulir::find($request->formulir_id);
            $formulir->update([
                'status' => 'ceklist'
            ]);
            return redirect()->route('checklist.index')->with('success', 'Ceklist Material Berhasil Di Buat');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Checklist Gagal Di Buat');
        } finally {
            DB::commit();
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $checklist = Checklist::find($id);
            $formulir = Formulir::find($checklist->formulir_id);
            $formulir->update([
                'status' => 'pengajuan'
            ]);
            $checklist->delete();
            return redirect()->route('checklist.index')->with('success', 'Ceklist Berhasil Di Hapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Ceklist Gagal Di Hapus');
        } finally {
            DB::commit();
        }
    }

    public function create_material($code_form)
    {
        $formulir = Formulir::where('code_form', $code_form)->first();
        $checklist = Checklist::where('formulir_id', $formulir->id)->first();
        return view('dashboard.material.create', compact('formulir', 'checklist'));
    }

    public function store_material(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'checklist_id' => 'required',
            'material' => 'required',
            'ex' => 'required',
            'volume' => 'required',
            'satuan' => 'required',
            'kelengkapan' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            Material::create([
                'checklist_id' => $request->checklist_id,
                'material' => $request->material,
                'ex' => $request->ex,
                'volume' => $request->volume,
                'satuan' => $request->satuan,
                'kelengkapan' => $request->kelengkapan,
                'keterangan' => $request->keterangan,
            ]);
            return redirect()->back()->with('success', 'Material Berhasil Di Tambahkan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Material Gagal Di Tambahkan');
        } finally {
            DB::commit();
        }
    }

    public function delete_material($id)
    {
        DB::beginTransaction();
        try {
            $material = Material::find($id);
            $material->delete();
            return redirect()->back()->with('success', 'Material Berhasil Di Hapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Material Gagal Di Hapus');
        } finally {
            DB::commit();
        }
    }
}
