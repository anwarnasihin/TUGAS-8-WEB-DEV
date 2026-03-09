<?php
require 'vendor/autoload.php'; 
use Dompdf\Dompdf;
use Dompdf\Options;

// 1. KONEKSI
include 'template/koneksi.php'; 
$db = isset($koneksi) ? $koneksi : $conn;

// 2. INVESTIGASI KOLOM TEKNISI
$kolom_ditemukan = 'petugas'; // Default jika tidak ketemu
$cek_struktur = mysqli_query($db, "SELECT * FROM kelas LIMIT 1");
$data_contoh = mysqli_fetch_assoc($cek_struktur);

if ($data_contoh) {
    foreach ($data_contoh as $key => $val) {
        // Cek kolom mana yang isinya ada nama Anwar, Rafly, atau Yovan
        if (preg_match('/Anwar|Rafly|Yovan/i', $val)) {
            $kolom_ditemukan = $key;
            break;
        }
    }
}

// 3. AMBIL DATA GLOBAL
$total_aset = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as total FROM kelas"))['total'] ?? 0;
$total_ruangan = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(DISTINCT ruangan) as total FROM kelas"))['total'] ?? 0;
$total_rusak = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as total FROM kelas WHERE status != 'OK'"))['total'] ?? 0;

// PERBAIKAN TYPO: Menghitung persentase kesiapan
$persen_siap = ($total_aset > 0) ? round((($total_aset - $total_rusak) / $total_aset) * 100) : 0;

// 4. HITUNG PER TEKNISI
$teknisi_data = [];
foreach (['Anwar', 'Rafly', 'Yovan'] as $nama) {
    $q = mysqli_query($db, "SELECT COUNT(*) as jml FROM kelas WHERE $kolom_ditemukan LIKE '%$nama%'");
    $teknisi_data[$nama] = ($q) ? mysqli_fetch_assoc($q)['jml'] : 0;
}

// 5. SETTING & DESAIN PDF
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

$html = '
<style>
    body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
    .header { text-align: center; border-bottom: 2px solid #333; padding-bottom: 10px; margin-bottom: 20px; }
    .card { background: #f8f9fc; padding: 15px; margin-bottom: 20px; border: 1px solid #e3e6f0; border-left: 5px solid #4e73df; }
    table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
    th, td { border: 1px solid #dee2e6; padding: 10px; text-align: left; }
    th { background: #4e73df; color: white; }
    .footer { font-size: 10px; color: gray; text-align: right; margin-top: 50px; }
</style>

<div class="header">
    <h2 style="margin:0;">LAPORAN ASET & KESIAPAN LAB</h2>
    <p style="margin:5px;">BINUS University - IT Support Team</p>
</div>

<div class="card">
    <strong>Ringkasan Eksekutif:</strong><br>
    Total Aset Terdata: <b>' . $total_aset . '</b> | Total Ruangan: <b>' . $total_ruangan . '</b> | Kesiapan: <b>' . $persen_siap . '%</b>
</div>

<table>
    <thead>
        <tr><th colspan="2">Statistik Kondisi Aset</th></tr>
    </thead>
    <tbody>
        <tr><td>Aset Kondisi Bagus (OK)</td><td>' . ($total_aset - $total_rusak) . ' Unit</td></tr>
        <tr><td>Aset Bermasalah/Rusak</td><td style="color:red;">' . $total_rusak . ' Unit</td></tr>
    </tbody>
</table>

<h3>Produktivitas Pengecekan Teknisi</h3>
<table>
    <thead>
        <tr><th>Nama Teknisi</th><th>Jumlah Aset yang Dicek</th></tr>
    </thead>
    <tbody>
        <tr><td>Anwar</td><td>' . $teknisi_data['Anwar'] . ' Unit</td></tr>
        <tr><td>Rafly</td><td>' . $teknisi_data['Rafly'] . ' Unit</td></tr>
        <tr><td>Yovan</td><td>' . $teknisi_data['Yovan'] . ' Unit</td></tr>
    </tbody>
</table>

<div class="footer">
    Dicetak otomatis oleh Sistem Manajemen Aset pada: ' . date('d-m-Y H:i:s') . '
</div>';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("Laporan_Dashboard_Lengkap.pdf", ["Attachment" => 1]);
exit;