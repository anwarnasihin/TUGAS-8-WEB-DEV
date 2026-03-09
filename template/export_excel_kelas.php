<?php
include "koneksi.php"; 

// Mengatur Header agar Excel mengenali format XML
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"Data_Asset_Kelas.xls\"");
header("Cache-Control: max-age=0");

// Tambahkan baris ini untuk menangani karakter khusus (UTF-8)
echo "\xEF\xBB\xBF"; 
?>


<style>
    .title { text-align: center; font-size: 16pt; font-weight: bold; }
    table th { background-color: #f2f2f2; border: 1px solid #000; }
    table td { border: 1px solid #000; }

    /* CSS MAGIC: Memaksa Excel membaca kolom sebagai TEXT (bukan angka/scientific) */
    .str { mso-number-format:"\@"; }
</style>

<div class="title">Data Asset Kelas</div>
<br>

<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Ruangan</th>
            <th>Tipe Kelas</th>
            <th>Account Office</th>
            <th>Tipe PC</th>
            <th>SN PC</th>
            <th>FA PC</th>
            <th>Spesifikasi</th>
            <th>IP Address</th>
            <th>Mac Address</th>
            <th>SSD</th>
            <th>Memory</th>
            <th>Tipe Monitor</th>
            <th>SN Monitor</th>
            <th>FA Monitor</th>
            <th>Keyboard</th>
            <th>Mouse</th>
            <th>Tipe Webcam</th>
            <th>SN Webcam</th>
            <th>FA Webcam</th>
            <th>Tipe Camera</th>
            <th>SN Camera</th>
            <th>FA Camera</th>
            <th>SN Speaker UFO</th>
            <th>Merk TV</th>
            <th>SN TV</th>
            <th>FA TV</th>
            <th>Status</th>
            <th>Teknisi Pengecekan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        // Pastikan variabel $koneksi sesuai dengan di file koneksi.php Anda
        // Jika include berhasil, query di bawah ini tidak akan error lagi
        if (isset($koneksi)) {
            $query = mysqli_query($koneksi, "SELECT * FROM kelas");
            while ($data = mysqli_fetch_array($query)) {
                echo "<tr>
                        <td>".$no++."</td>
                        <td>".$data['ruangan']."</td>
                        <td>".$data['tipekelas']."</td>
                        <td>".$data['accountoffice']."</td>
                        <td>".$data['tipepc']."</td>
                        <td class='str'>".$data['snpc']."</td>
                        <td class='str'>".$data['fapc']."</td>
                        <td>".$data['spesifikasi']."</td>
                        <td class='str'>".$data['ipaddress']."</td>
                        <td class='str'>".$data['macaddress']."</td>
                        <td>".$data['ssd']."</td>
                        <td>".$data['memory']."</td>
                        <td>".$data['tipemonitor']."</td>
                        <td class='str'>".$data['snmonitor']."</td>
                        <td class='str'>".$data['famonitor']."</td>
                        <td>".$data['keyboard']."</td>
                        <td>".$data['mouse']."</td>
                        <td>".$data['tipewebcam']."</td>
                        <td class='str'>".$data['snwebcam']."</td>
                        <td class='str'>".$data['fawebcam']."</td>
                        <td>".$data['tipecamera']."</td>
                        <td class='str'>".$data['sncamera']."</td>
                        <td class='str'>".$data['facamera']."</td>
                        <td class='str'>".$data['snspeakerufo']."</td>
                        <td>".$data['merktv']."</td>
                        <td class='str'>".$data['sntv']."</td>
                        <td class='str'>".$data['fatv']."</td>
                        <td>".$data['status']."</td>
                        <td>".$data['teknisipengecekan']."</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='29' style='color:red; text-align:center;'>Gagal menyambung ke database. Periksa file koneksi.php!</td></tr>";
        }
        ?>
    </tbody>
</table>