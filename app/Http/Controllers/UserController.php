<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $akun = User::find($id);
        return view('dashboard.akun.edit', compact('akun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $akun = User::find($id);
        // Validator
        if ($request->password) {
            $validator = Validator::make(
                $request->all(),
                [
                    'nama' => 'required',
                    'email' => 'required|unique:users,email,' . $akun->id,
                    'password' => 'required|confirmed|min:6',
                    'password_confirmation' => 'required',
                ],
                [],
            );
        } else {
            $validator = Validator::make(
                $request->all(),
                [
                    'nama' => 'required',
                    'email' => 'required|unique:users,email,' . $akun->id,
                ],
                [],
            );
        }

        // If validator fails.
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        // If validator success
        DB::beginTransaction();
        try {
            $dataAkun = [
                'nama' => $request->nama,
                'email' => $request->email,
                'nip' => $request->nip,
            ];

            if ($request->filled('password')) {
                $dataAkun['password'] = Hash::make($request->password);
            } else {
                $dataAkun['password'] = $akun->password;
            }

            $akun->update($dataAkun);

            return redirect()->route('akun.edit', $akun->id)->with('success', $request->nama . ' berhasil diupdate.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('akun.edit', $akun->id)->with('error', $akun->nama . ' gagal diupdate.');
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
