<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Survey;

class SurveyController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'jawaban' => 'required',
            'saran_masukan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            Survey::create([
                'nama' => $request->nama,
                'jawaban' => $request->jawaban,
                'saran_masukan' => $request->saran_masukan,
            ]);

            return redirect()->route('survey.success')->with('success', $request->nama);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Survey Gagal Dikirim !!');
        } finally {
            DB::commit();
        }
    }

    public function success()
    {
        return view('home.survey_success');
    }
}
