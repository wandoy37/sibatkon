<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\Formulir;
use App\Models\KasiPengujian;
use App\Models\User;
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

    public function generatePerintahUji($code_form)
    {
        $formulir = Formulir::where('code_form', $code_form)->first();
        $kasi_pengujian = KasiPengujian::find($formulir->kasi_pengujian_id);
        $this->PdfService->createPerintahUji($formulir, $kasi_pengujian);
    }

    public function generateTandaTerimaOrder($code_form)
    {
        $formulir = Formulir::where('code_form', $code_form)->first();
        $this->PdfService->createTendaTerimaOrder($formulir);
    }

    public function generateCheeklistMaterialPengujian($code_form)
    {
        $formulir = Formulir::where('code_form', $code_form)->first();
        $checklist = Checklist::where('formulir_id', $formulir->id)->first();
        $this->PdfService->createCheeklistMaterialPengujian($formulir, $checklist);
    }
}
