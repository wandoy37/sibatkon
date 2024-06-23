<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use Illuminate\Http\Request;
use App\Pdf\PdfService;

class GeneratePdfController extends Controller
{
    protected $PdfService;

    public function __construct(PdfService $PdfService)
    {
        $this->PdfService = $PdfService;
    }

    public function generatePermohonanPengujian($code_form)
    {
        $formulir = Formulir::where('code_form', $code_form)->first();
        $this->PdfService->createPermohonanPengujian($formulir);
    }
}
