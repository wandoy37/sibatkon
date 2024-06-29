<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class ProfilController extends Controller
{
    public function edit()
    {
        $profil = Profil::find(1);
        return view('dashboard.profil', compact('profil'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sejarah' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'foto_sejarah' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'struktur_organisasi' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $profil = Profil::find($id);
            $profil->sejarah = $request->sejarah;
            $profil->visi = $request->visi;
            $profil->misi = $request->misi;

            if ($request->hasFile('foto_sejarah')) {
                // Delete the old file if exists
                if ($profil->foto_sejarah) {
                    Storage::delete('public/img/' . $profil->foto_sejarah);
                }
                // Upload new file
                $file = $request->file('foto_sejarah');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/img', $filename);
                $profil->foto_sejarah = $filename;
            }

            if ($request->hasFile('struktur_organisasi')) {
                // Delete the old file if exists
                if ($profil->struktur_organisasi) {
                    Storage::delete('public/img/' . $profil->struktur_organisasi);
                }
                // Upload new file
                $file = $request->file('struktur_organisasi');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/img', $filename);
                $profil->struktur_organisasi = $filename;
            }

            $profil->save();

            DB::commit();

            return redirect()->route('profil.edit')->with('success', 'Profil updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error updating profil: ' . $e->getMessage());
        }
    }
}
