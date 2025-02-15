<?php

namespace App\Pdf;

use setasign\Fpdi\Fpdi;
use Carbon\Carbon;

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
        Carbon::setLocale('id');
        $pdf->SetXY(0, 14);
        $pdf->SetX(75);
        $pdf->Cell(0, 103,  Carbon::parse($formulir->created_at)->translatedFormat(' d F Y'), 0, 'L');
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

    public function createPerintahUji($formulir, $kasi_pengujian)
    {
        $templatePath = public_path('template/surat_perintah_uji.pdf');

        $pdf = new FPDI();
        $pdf->AddPage('P', 'A4');

        // Halaman pertama =========================================================================================================
        $pdf->setSourceFile($templatePath);
        $templateId = $pdf->importPage(1); // Ambil halaman pertama dari template PDF
        $pdf->useTemplate($templateId);

        // Mengatur margin dalam satuan milimeter (mm)
        $pdf->SetMargins(20, 20, 20, 30);
        $pdf->SetAutoPageBreak(true, 20); // Mengatur auto page break dengan margin bawah 20 mm


        // Set font dan ukuran
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetFont("helvetica", "", 12);
        $pdf->SetTextColor(0, 0, 0);

        // Kasi Pengujian Nama
        $pdf->SetXY(0, 28);
        $pdf->SetX(98);
        $pdf->Cell(0, 111,  $kasi_pengujian->nama, 0, 'L');
        $pdf->SetX(12.6);

        // Kasi Pengujian NIP
        $pdf->SetXY(0, 28);
        $pdf->SetX(98);
        $pdf->Cell(0, 130.5,  $kasi_pengujian->nip, 0, 'L');
        $pdf->SetX(12.6);

        // Kasi Pengujian Jabatan
        $pdf->SetXY(0, 28);
        $pdf->SetX(98);
        $pdf->Cell(0, 149, $kasi_pengujian->jabatan, 0, 'L');
        $pdf->SetX(12.6);

        // Untuk Melakukan Uji
        $pdf->SetXY(0, 28);
        $pdf->SetX(98);
        $pdf->Cell(0, 168, $formulir->uraian_pengujian, 0, 'L');
        $pdf->SetX(12.6);

        // Untuk Keperluan
        $pdf->SetXY(0, 28);
        $pdf->SetX(98);
        $pdf->Cell(0, 225, $formulir->keperluan_pengujian, 0, 'L');
        $pdf->SetX(12.6);


        // Halaman pertama End ===================================================================================================


        // Set judul file PDF
        $pdf->SetTitle('Permohonan Pengujian - ' . $formulir->code_form);
        // Output PDF
        $pdf->Output('Permohonan Pengujian - ' . $formulir->code_form, 'I');

        exit;
    }

    // Cetak Output Tanda Terima Order tipe 1
    public function createTandaTerimaOrder_tipe_1($formulir)
    {
        $templatePath = public_path('template/tandaterima_order_tipe_1.pdf');

        $pdf = new FPDI();
        $pdf->AddPage('P', 'A4');

        // Halaman pertama =========================================================================================================
        $pdf->setSourceFile($templatePath);
        $templateId = $pdf->importPage(1); // Ambil halaman pertama dari template PDF
        $pdf->useTemplate($templateId);

        // Mengatur margin dalam satuan milimeter (mm)
        $pdf->SetMargins(20, 20, 20, 30);
        $pdf->SetAutoPageBreak(true, 20);

        // Set font dan ukuran
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetFont("helvetica", "", 9);
        $pdf->SetTextColor(0, 0, 0);

        // Telah Terima Order Dari
        $pdf->SetXY(100, 65.5);
        $pdf->Cell(0, 0, $formulir->kontraktor_nama, 0, 1, 'L');

        // Nama Pelanggan
        $pdf->SetXY(100, 71.5);
        $pdf->Cell(0, 0, $formulir->nama_pemohon, 0, 1, 'L');

        // Alamat
        $pdf->SetXY(100, 77.5);
        $pdf->Cell(0, 0, $formulir->kontraktor_alamat, 0, 1, 'L');

        // Jenis Contoh Uji
        $pdf->SetXY(100, 90);
        $pdf->Cell(0, 0, $formulir->bahan->nama, 0, 1, 'L');

        // Jumlah Contoh Uji
        $pdf->SetXY(100, 96.5);
        $pdf->Cell(0, 0, $formulir->quantity . ' Sampel', 0, 1, 'L');

        // Mengatur lokalitas Carbon ke bahasa Indonesia
        Carbon::setLocale('id');
        // Menambahkan cell dengan tanggal pada posisi Y = 300
        // Set font ke ukuran 9 untuk bagian tanggal
        $pdf->SetFont("helvetica", "", 9);
        $pdf->SetXY(147, 234.5);
        $pdf->Cell(0, 0, Carbon::parse($formulir->created_at)->translatedFormat('d F Y'), 0, 1, 'L');

        // Set judul file PDF
        $pdf->SetTitle('Tanda Terima Order - ' . $formulir->code_form);
        // Output PDF
        $pdf->Output('Tanda Terima Order - ' . $formulir->code_form, 'I');

        exit;
    }

    // Cetak Output Tanda Terima Order tipe 2
    public function createTandaTerimaOrder_tipe_2($formulir)
    {
        $templatePath = public_path('template/tandaterima_order_tipe_2.pdf');

        $pdf = new FPDI();
        $pdf->AddPage('P', 'A4');

        // Halaman pertama =========================================================================================================
        $pdf->setSourceFile($templatePath);
        $templateId = $pdf->importPage(1); // Ambil halaman pertama dari template PDF
        $pdf->useTemplate($templateId);

        // Mengatur margin dalam satuan milimeter (mm)
        $pdf->SetMargins(20, 20, 20, 30);
        $pdf->SetAutoPageBreak(true, 20);

        // Set font dan ukuran
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetFont("helvetica", "", 9);
        $pdf->SetTextColor(0, 0, 0);

        // Telah Terima Order Dari
        $pdf->SetXY(113.5, 62);
        $pdf->Cell(0, 0, $formulir->kontraktor_nama, 0, 1, 'L');

        // Nama Pelanggan
        $pdf->SetXY(113.5, 68);
        $pdf->Cell(0, 0, $formulir->nama_pemohon, 0, 1, 'L');

        // Alamat
        $pdf->SetXY(113.5, 74);
        $pdf->Cell(0, 0, $formulir->kontraktor_alamat, 0, 1, 'L');

        // Jenis Contoh Uji
        $pdf->SetXY(113.5, 86.5);
        $pdf->Cell(0, 0, $formulir->bahan->nama, 0, 1, 'L');

        // Jumlah Contoh Uji
        $pdf->SetXY(113.5, 93);
        $pdf->Cell(0, 0, $formulir->quantity . ' Sampel', 0, 1, 'L');

        // =======Tambahan Manual======
        if ($formulir->bahan->nama == 'Balok') {
            // Parameter Uji
            $pdf->SetXY(41.5, 116);
            $pdf->Cell(0, 0, 'Kuat lentur beton dengan dua titik pembebanan', 0, 1, 'L');

            // Metode  Pengujianji
            $pdf->SetXY(112, 116);
            $pdf->Cell(0, 0, 'SNI 4431:2011', 0, 1, 'L');
        } elseif ($formulir->bahan->nama == 'Kubus') {
            // Parameter Uji
            $pdf->SetXY(41.5, 116);
            $pdf->Cell(0, 0, 'Kuat tekan beton (benda uji kubus)', 0, 1, 'L');

            // Metode  Pengujianji
            $pdf->SetXY(112, 116);
            $pdf->Cell(0, 0, 'SNI 03-1974-1990', 0, 1, 'L');
        } elseif ($formulir->bahan->nama == 'Slinder') {
            // Parameter Uji
            $pdf->SetXY(41.5, 116);
            $pdf->Cell(0, 0, 'Kuat tekan beton dengan benda uji silinder', 0, 1, 'L');

            // Metode  Pengujianji
            $pdf->SetXY(112, 116);
            $pdf->Cell(0, 0, 'SNI 1974:2011', 0, 1, 'L');
        } elseif ($formulir->bahan->nama == 'Balok & Silinder') {
            // Parameter Uji
            $pdf->SetXY(41.5, 116);
            $pdf->Cell(0, 0, '', 0, 1, 'L');

            // Metode  Pengujianji
            $pdf->SetXY(112, 116);
            $pdf->Cell(0, 0, '', 0, 1, 'L');
        }
        // =======End Tambahan Manual======

        // Mengatur lokalitas Carbon ke bahasa Indonesia
        Carbon::setLocale('id');
        // Menambahkan cell dengan tanggal pada posisi Y = 300
        // Set font ke ukuran 9 untuk bagian tanggal
        $pdf->SetFont("helvetica", "", 9);
        $pdf->SetXY(155, 229.5);
        $pdf->Cell(0, 0, Carbon::parse($formulir->created_at)->translatedFormat('d F Y'), 0, 1, 'L');

        // Set judul file PDF
        $pdf->SetTitle('Tanda Terima Order - ' . $formulir->code_form);
        // Output PDF
        $pdf->Output('Tanda Terima Order - ' . $formulir->code_form, 'I');

        exit;
    }

    public function createCheeklistMaterialPengujian($formulir, $checklist)
    {
        $templatePath = public_path('template/cheeklist_material_pengujian.pdf');

        $pdf = new FPDI();
        $pdf->AddPage('P', 'A4');

        // Halaman pertama =========================================================================================================
        $pdf->setSourceFile($templatePath);
        $templateId = $pdf->importPage(1); // Ambil halaman pertama dari template PDF
        $pdf->useTemplate($templateId);

        // Mengatur margin dalam satuan milimeter (mm)
        $pdf->SetMargins(20, 20, 20, 30);
        $pdf->SetAutoPageBreak(true, 20);

        // Set font dan ukuran
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetFont("helvetica", "", 12);
        $pdf->SetTextColor(0, 0, 0);

        // Cheeklist Diterima Tanggal
        Carbon::setLocale('id');
        $pdf->SetXY(103, 31.5);
        $pdf->Cell(0, 0, Carbon::parse($checklist->diterima_tanggal)->translatedFormat('d F Y'), 0, 1, 'L');

        // PEKERJAAN MIX DESIGN / JOB MIX
        $pdf->SetXY(103, 38);
        $pdf->Cell(0, 0, $checklist->job_mix, 0, 1, 'L');

        // SPU No
        $pdf->SetXY(103, 44);
        $pdf->Cell(0, 0, $checklist->no_spu, 0, 1, 'L');

        // PELAKSANA / KONTRAKTOR
        $pdf->SetXY(103, 56.4);
        $pdf->Cell(0, 0, $formulir->kontraktor_nama, 0, 1, 'L');

        // TAHUN ANGGARAN
        $pdf->SetXY(103, 62.5);
        $pdf->Cell(0, 0, $checklist->tahun_anggaran, 0, 1, 'L');


        // LIST MATERIAL

        // Looping untuk setiap item dalam materials
        $startX = 23; // Posisi X awal
        $startY = 82; // Posisi Y awal
        $offsetY = 14.5; // Jarak vertikal antar cell
        $offsetXVolume = 88; // Jarak horizontal untuk volume
        $offsetXSatuan = 93; // Jarak horizontal untuk Satuan
        $offsetXCheckAda = 115; // Jarak horizontal untuk ceklis
        $offsetXCheckTidak = 129; // Jarak horizontal untuk ceklis
        $offsetXKeterangan = 142; // Jarak horizontal untuk ceklis

        foreach ($checklist->materials as $index => $item) {
            // Set posisi untuk setiap item
            $pdf->SetXY($startX, $startY + ($index * $offsetY));
            $pdf->Cell(0, 0, $item->material, 0, 1, 'L');

            $pdf->SetXY($startX, $startY + ($index * $offsetY));
            $pdf->Cell(0, 11, 'Ex. ' . $item->ex, 0, 1, 'L');

            $pdf->SetXY($startX + $offsetXVolume, $startY + ($index * $offsetY));
            $pdf->Cell(0, 8, $item->volume, 0, 10, 'L');

            $pdf->SetXY($startX + $offsetXSatuan, $startY + ($index * $offsetY));
            $pdf->Cell(0, 8, $item->satuan, 0, 10, 'L');

            // Tambahkan simbol ceklis
            if ($item->kelengkapan == 'ada') {
                $pdf->SetFont('ZapfDingbats', '', 25); // Gunakan font ZapfDingbats untuk simbol ceklis
                $pdf->SetXY($startX + $offsetXCheckAda, $startY + ($index * $offsetY));
                $pdf->Cell(0, 8, chr(51), 0, 1, 'L'); // chr(51) adalah simbol ceklis di ZapfDingbats
                $pdf->SetFont('helvetica', '', 12); // Kembali ke font default
            }

            // Tambahkan simbol ceklis
            if ($item->kelengkapan == 'tidak ada') {
                $pdf->SetFont('ZapfDingbats', '', 25); // Gunakan font ZapfDingbats untuk simbol ceklis
                $pdf->SetXY($startX + $offsetXCheckTidak, $startY + ($index * $offsetY));
                $pdf->Cell(0, 8, chr(51), 0, 1, 'L'); // chr(51) adalah simbol ceklis di ZapfDingbats
                $pdf->SetFont('helvetica', '', 12); // Kembali ke font default
            }

            // Keterangan
            $pdf->SetXY($startX + $offsetXKeterangan, $startY + ($index * $offsetY));
            $pdf->Cell(0, 8, $item->keterangan, 0, 10, 'L');
        }

        // Bagian Bawah
        // Kontraktor
        $pdf->SetXY(107, 257.5);
        $pdf->Cell(0, 0, $formulir->kontraktor_nama, 0, 1, 'L');

        // NAMA
        $pdf->SetXY(107, 263.5);
        $pdf->Cell(0, 0, $formulir->nama_pemohon, 0, 1, 'L');

        // NP. TELP/HP
        $pdf->SetXY(107, 274);
        $pdf->Cell(0, 0, $formulir->no_hp_pemohon, 0, 1, 'L');

        // Set judul file PDF
        $pdf->SetTitle('Tanda Terima Order - ' . $formulir->code_form);
        // Output PDF
        $pdf->Output('Tanda Terima Order - ' . $formulir->code_form, 'I');

        exit;
    }
}
