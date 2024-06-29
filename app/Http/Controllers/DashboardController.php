<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function survey_index()
    {
        $surveys = Survey::orderBy('id', 'DESC')->get();
        return view('dashboard.survey.index', compact('surveys'));
    }
}
