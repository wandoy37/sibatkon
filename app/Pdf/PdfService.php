<?php

namespace App\Pdf;

use setasign\Fpdi\Fpdi;

class PdfService extends Fpdi
{
    public function __construct()
    {
        parent::__construct();
    }

    // Tambahkan metode untuk membuat PDF sesuai kebutuhan Anda
    public function createPermohonanPengujian($formulir)
    {
        $templatePath = public_path('template/permohonan_pengujian.pdf');

        $pdf = new FPDI();
        $pdf->AddPage('P', 'A4');

        // Halaman pertama =========================================================================================================
        $pdf->setSourceFile($templatePath);
        $templateId = $pdf->importPage(1); // Ambil halaman pertama dari template PDF
        $pdf->useTemplate($templateId);

        // Mengatur margin dalam satuan milimeter (mm)
        $pdf->SetMargins(20, 20, 20, 30);
        $pdf->SetAutoPageBreak(true, 20); // Mengatur auto page break dengan margin bawah 20 mm

        // Menambahkan border untuk margin
        // $pdf->Rect(20, 20, $pdf->GetPageWidth() - 40, $pdf->GetPageHeight() - 40);

        // Set font dan ukuran
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetFont("helvetica", "", 12);
        $pdf->SetTextColor(0, 0, 0);

        // Tanggal/Date
        $pdf->SetXY(0, 14);
        $pdf->SetX(75);
        $pdf->Cell(0, 103,  date('d-m-Y', strtotime($formulir->created_at)), 0, 'L');
        $pdf->SetX(12.6);

        // Nama Bahan/Barang
        $pdf->SetXY(0, 28);
        $pdf->SetX(75);
        $pdf->Cell(0, 103,  $formulir->bahan->nama, 0, 'L');
        $pdf->SetX(12.6);

        // Banyaknya/Quantity
        $pdf->SetXY(0, 42.5);
        $pdf->SetX(75);
        $pdf->Cell(0, 103,  $formulir->quantity . ' Sample', 0, 'L');
        $pdf->SetX(12.6);

        // Keterangan lain 
        $pdf->SetXY(0, 61.5);
        $pdf->SetX(75);
        $pdf->Cell(0, 103,  $formulir->keterangan_lain, 0, 'L');
        $pdf->SetX(12.6);

        // Uraian Pengujian
        $pdf->SetXY(28, 135);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(0, 10, $formulir->uraian_pengujian, 0, 'L');

        // Biaya pengujian ditanggung oleh/Nama
        $pdf->SetXY(0, 133.5);
        $pdf->SetX(50);
        $pdf->Cell(0, 103,  $formulir->nama_pemohon, 0, 'L');
        $pdf->SetX(12.6);

        // Biaya pengujian ditanggung oleh/Alamat
        $pdf->SetXY(0, 148.2);
        $pdf->SetX(50);
        $pdf->Cell(0, 103,  $formulir->alamat_pemohon, 0, 'L');
        $pdf->SetX(12.6);

        // Laporan pengujian dibuat untuk/Nama
        $pdf->SetXY(0, 228.2);
        $pdf->SetX(50);
        $pdf->Cell(0, 0,  $formulir->kontraktor_nama, 0, 'L');
        $pdf->SetX(12.6);

        // Laporan pengujian dibuat untuk/Alamat
        $pdf->SetXY(0, 242.7);
        $pdf->SetX(50);
        $pdf->Cell(0, 0,  $formulir->kontraktor_alamat, 0, 'L');
        $pdf->SetX(12.6);
        // Halaman pertama End ===================================================================================================

        // Halaman kedua =========================================================================================================
        $pdf->AddPage('P', 'A4');
        $templateId2 = $pdf->importPage(2); // Ambil halaman kedua dari template PDF
        $pdf->useTemplate($templateId2);

        if ($formulir->sisa_contoh == 'akan di ambil lagi') {
            // Coret tidak di ambil lagi
            $pdf->SetLineWidth(0.5);
            $pdf->SetDrawColor(0, 0, 0);
            $y_position = 88.5;
            $pdf->Line(83.3, $y_position + 5, 76, $y_position + 5);
        } else {
            // Coret akan di ambil lagi
            $pdf->SetLineWidth(0.5);
            $pdf->SetDrawColor(0, 0, 0);
            $y_position = 88.5;
            $pdf->Line(74.8, $y_position + 5, 67, $y_position + 5);
        }

        // Nama Pemohon Pengujian kepada UPTD. Laboratorium 
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetXY(64, 116.8);
        $pdf->Cell(0, 10, $formulir->nama_pemohon, 0, 'L');

        // Nama Pemohon Pengujian kepada UPTD. Laboratorium 
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetXY(64, 131);
        $pdf->Cell(0, 10, $formulir->alamat_pemohon, 0, 'L');

        // Nomor HP. Pemohon
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetXY(95, 169.5);
        $pdf->Cell(0, 10, $formulir->no_hp_pemohon, 0, 'L');
        // Halaman kedua End ====================================================================================================

        // Set judul file PDF
        $pdf->SetTitle('Permohonan Pengujian - ' . $formulir->code_form);
        // Output PDF
        $pdf->Output('Permohonan Pengujian - ' . $formulir->code_form, 'I');

        exit;
    }
}
