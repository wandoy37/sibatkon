<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\Formulir;
use App\Models\Survey;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $permohonans = Formulir::where('status', 'pengajuan')->get();
        $ceklists = Checklist::all();
        $pengujians = Formulir::where('status', 'pengujian')->get();
        $surveys = Survey::all();
        return view('dashboard.index', compact('permohonans', 'ceklists', 'pengujians', 'surveys'));
    }

    public function survey_index()
    {
        $surveys = Survey::orderBy('id', 'DESC')->get();
        return view('dashboard.survey.index', compact('surveys'));
    }
}
