<?php session_start();

include '../template/koneksi.php';

if (isset($_POST['simpan'])) {
    // 1. Ambil semua data dan bersihkan agar aman dari error (SQL Injection)
    $ruangan                = mysqli_real_escape_string($koneksi, $_POST['ruangan']);
    $tipekelas              = mysqli_real_escape_string($koneksi, $_POST['tipekelas']);
    $accountoffice          = mysqli_real_escape_string($koneksi, $_POST['accountoffice']);
    $tipepc                 = mysqli_real_escape_string($koneksi, $_POST['tipepc']);
    $snpc                   = mysqli_real_escape_string($koneksi, $_POST['snpc']);
    $fapc                   = mysqli_real_escape_string($koneksi, $_POST['fapc']);
    $spesifikasi            = mysqli_real_escape_string($koneksi, $_POST['spesifikasi']);
    $ipaddress              = mysqli_real_escape_string($koneksi, $_POST['ipaddress']);
    $macaddress             = mysqli_real_escape_string($koneksi, $_POST['macaddress']);
    $ssd                    = mysqli_real_escape_string($koneksi, $_POST['ssd']);
    $memory                 = mysqli_real_escape_string($koneksi, $_POST['memory']);
    $tipemonitor            = mysqli_real_escape_string($koneksi, $_POST['tipemonitor']);
    $snmonitor              = mysqli_real_escape_string($koneksi, $_POST['snmonitor']);
    $famonitor              = mysqli_real_escape_string($koneksi, $_POST['famonitor']);
    $keyboard               = mysqli_real_escape_string($koneksi, $_POST['keyboard']);
    $mouse                  = mysqli_real_escape_string($koneksi, $_POST['mouse']);
    $tipewebcam             = mysqli_real_escape_string($koneksi, $_POST['tipewebcam']);
    $snwebcam               = mysqli_real_escape_string($koneksi, $_POST['snwebcam']);
    $fawebcam               = mysqli_real_escape_string($koneksi, $_POST['fawebcam']);
    $tipecamera             = mysqli_real_escape_string($koneksi, $_POST['tipecamera']);
    $sncamera               = mysqli_real_escape_string($koneksi, $_POST['sncamera']);
    $facamera               = mysqli_real_escape_string($koneksi, $_POST['facamera']);
    $snspeakerufo           = mysqli_real_escape_string($koneksi, $_POST['snspeakerufo']);
    $merktv                 = mysqli_real_escape_string($koneksi, $_POST['merktv']);
    $sntv                   = mysqli_real_escape_string($koneksi, $_POST['sntv']);
    $fatv                   = mysqli_real_escape_string($koneksi, $_POST['fatv']);
    $status                 = mysqli_real_escape_string($koneksi, $_POST['status']);
    $teknisipengecekan      = mysqli_real_escape_string($koneksi, $_POST['teknisipengecekan']);

    // 2. Perintah SQL Lengkap (Pastikan urutan KOLOM sama dengan urutan VALUES)
    $sql = "INSERT INTO kelas (
            ruangan, tipekelas, accountoffice, tipepc, snpc, fapc, spesifikasi, 
            ipaddress, macaddress, ssd, memory, tipemonitor, snmonitor, famonitor, 
            keyboard, mouse, tipewebcam, snwebcam, fawebcam, tipecamera, sncamera, 
            facamera, snspeakerufo, merktv, sntv, fatv, status, teknisipengecekan
        ) VALUES (
            '$ruangan', '$tipekelas', '$accountoffice', '$tipepc', '$snpc', '$fapc', '$spesifikasi',
            '$ipaddress', '$macaddress', '$ssd', '$memory', '$tipemonitor', '$snmonitor', '$famonitor',
            '$keyboard', '$mouse', '$tipewebcam', '$snwebcam', '$fawebcam', '$tipecamera', '$sncamera',
            '$facamera', '$snspeakerufo', '$merktv', '$sntv', '$fatv', '$status', '$teknisipengecekan'
        )";

    $query = mysqli_query($koneksi, $sql);

    // 3. Cek hasil dan Redirect
    if ($query) {
        // Simpan pesan ke session
        $_SESSION['info'] = "Data Berhasil Disimpan!";
        // Arahkan langsung ke kelas.php tanpa alert JS
        header("Location: kelas.php");
        exit();
    } else {
        // Jika gagal, tampilkan error database yang detail
        $_SESSION['info'] = "Data Gagal Disimpan!";
        header("Location: kelas.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    include '../template/link.php';
    include '../template/head.php';
    ?>
    <link rel="stylesheet" href="<?php echo $url['base_url']; ?>assets/css/custom-datatables.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include '../template/sidebar.php';
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include '../template/topbar.php';
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Input Data Kelas</h1>

                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-12">
                            <form method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="inputruangan" class="form-label">Ruangan</label>
                                            <select class="form-control" id="inputruangan" name="ruangan" required>
                                                <option value="" selected hidden>-- Pilih Ruangan --</option>
                                                <option value="A0115A">A0115A</option>
                                                <option value="A0115B">A0115B</option>
                                                <option value="A0115C">A0115C</option>
                                                <option value="A0118">A0118</option>
                                                <option value="A0119">A0119</option>
                                                <option value="A0119 Stand TV">A0119 Stand TV</option>
                                                <option value="A0124A">A0124A</option>
                                                <option value="A0124B">A0124B</option>
                                                <option value="A0124C Stand TV">A0124C Stand TV</option>
                                                <option value="A0125">A0125</option>
                                                <option value="A0126">A0126</option>
                                                <option value="A0127">A0127</option>
                                                <option value="A0313">A0313</option>
                                                <option value="A0401">A0401</option>
                                                <option value="A0404">A0404</option>
                                                <option value="A0406">A0406</option>
                                                <option value="A0407">A0407</option>
                                                <option value="A0408">A0408</option>
                                                <option value="A0409">A0409</option>
                                                <option value="A0410">A0410</option>
                                                <option value="A0411">A0411</option>
                                                <option value="A0412">A0412</option>
                                                <option value="A0413">A0413</option>
                                                <option value="A0414">A0414</option>
                                                <option value="A0415">A0415</option>
                                                <option value="A0416">A0416</option>
                                                <option value="A0420">A0420</option>
                                                <option value="A0421">A0421</option>
                                                <option value="A0503">A0503</option>
                                                <option value="A0504">A0504</option>
                                                <option value="A0505">A0505</option>
                                                <option value="A0506">A0506</option>
                                                <option value="A0507">A0507</option>
                                                <option value="A0508">A0508</option>
                                                <option value="A0510">A0510</option>
                                                <option value="A0511">A0511</option>
                                                <option value="A0512">A0512</option>
                                                <option value="A0513">A0513</option>
                                                <option value="A0514">A0514</option>
                                                <option value="A0515">A0515</option>
                                                <option value="A0516">A0516</option>
                                                <option value="A0517">A0517</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputtipekelas" class="form-label">Tipe Kelas</label>
                                            <select class="form-control" id="inputtipekelas" name="tipekelas" required>
                                                <option value="" selected hidden>-- Pilih Tipe Kelas --</option>
                                                <option value="LAB HM">LAB HM</option>
                                                <option value="LAB HM Front Office">LAB HM Front Office</option>
                                                <option value="LAB HM Restaurant">LAB HM Restaurant</option>
                                                <option value="LAB HM Housekeeping">LAB HM Housekeeping</option>
                                                <option value="Incubator">Incubator</option>
                                                <option value="Reguler Class Hybrid">Reguler Class Hybrid</option>
                                                <option value="LAB HM resto Standing TV">LAB HM resto Standing TV</option>
                                                <option value="Reguler Class">Reguler Class</option>
                                                <option value="Lab Psikologi Class">Lab Psikologi Class</option>
                                                <option value="Creative Class Hybrid">Creative Class Hybrid</option>
                                                <option value="Tribun Class Hybrid">Tribun Class Hybrid</option>
                                                <option value="Tribun Class ">Tribun Class </option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputaccountoffice" class="form-label">Account Office</label>
                                            <select class="form-control" id="inputaccountoffice" name="accountoffice" required>
                                                <option value="" selected hidden>-- Pilih Account Office --</option>
                                                <option value="Tidak Ada">Tidak Ada</option>
                                                <option value="bmca001@binus.edu">bmca001@binus.edu</option>
                                                <option value="bmca002@binus.edu">bmca002@binus.edu</option>
                                                <option value="bmca003@binus.edu">bmca003@binus.edu</option>
                                                <option value="bmca004@binus.edu">bmca004@binus.edu</option>
                                                <option value="bmca005@binus.edu">bmca005@binus.edu</option>
                                                <option value="bmca006@binus.edu">bmca006@binus.edu</option>
                                                <option value="bmca007@binus.edu">bmca007@binus.edu</option>
                                                <option value="bmca008@binus.edu">bmca008@binus.edu</option>
                                                <option value="bmca009@binus.edu">bmca009@binus.edu</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputtipepc" class="form-label">Tipe PC</label>
                                            <select class="form-control" id="inputtipepc" name="tipepc" required>
                                                <option value="" selected hidden>-- Pilih Tipe PC --</option>
                                                <option value="Mini PC HP Prodesk 400 G6 ">Mini PC HP Prodesk 400 G6 </option>
                                                <option value="Lenovo Thinkcentre M70Q Gen5">Lenovo Thinkcentre M70Q Gen5</option>
                                                <option value="HP Pro Mini 260 G9 ">HP Pro Mini 260 G9 </option>
                                                <option value="ROG Strix G10CE">ROG Strix G10CE</option>
                                                <option value="Mini PC HP Prodesk 400 G5">Mini PC HP Prodesk 400 G5</option>
                                                <option value="Lenovo Neo 50q Gen 4">Lenovo Neo 50q Gen 4</option>
                                                <option value="Mini PC HP Prodesk 400 G5">Mini PC HP Prodesk 400 G5</option>
                                                <option value="Konzerto">Konzerto</option>
                                                <option value="PC HP 280 G1 MT">PC HP 280 G1 MT</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputsnpc" class="form-label">SN PC</label>
                                            <input type="text" class="form-control" id="inputsnpc" name="snpc" list="list_snpc" placeholder="Pilih atau ketik manual..." required>
                                            <datalist id="list_snpc">
                                                <option value="Tidak ada">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputfapc" class="form-label">FA PC</label>
                                            <input type="text" class="form-control" id="inputfapc" name="fapc" list="list_fapc" placeholder="Pilih atau ketik manual..." required>
                                            <datalist id="list_fapc">
                                                <option value="Tidak ada">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputspesifikasi" class="form-label">Spesifikasi</label>
                                            <input type="text" class="form-control" id="inputspesifikasi" name="spesifikasi" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputipaddress" class="form-label">IP Address</label>
                                            <input type="text" class="form-control" id="inputipaddress" name="ipaddress" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputmacaddress" class="form-label">Mac Address</label>
                                            <input type="text" class="form-control" id="inputmacaddress" name="macaddress" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputssd" class="form-label">SSD</label>
                                            <input type="text" class="form-control" id="inputssd" name="ssd" list="list_ssd" placeholder="Pilih atau ketik manual..." required>
                                            <datalist id="list_ssd">
                                                <option value="" selected hidden>-- Pilih Kapasitas --</option>
                                                <option value="256 GB">
                                                <option value="512 GB">
                                                <option value="1 TB">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputmemory" class="form-label">Memory</label>
                                            <select class="form-control" id="inputmemory" name="memory" required>
                                                <option value="" selected hidden>-- Pilih RAM --</option>
                                                <option value="4 GB">4 GB</option>
                                                <option value="8 GB">8 GB</option>
                                                <option value="16 GB">16 GB</option>
                                                <option value="32 GB">32 GB</option>
                                                <option value="64 GB">64 GB</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputtipemonitor" class="form-label">Tipe Monitor</label>
                                            <select class="form-control" name="tipemonitor" required>
                                                <option value="" selected hidden>-- Pilih Tipe Monitor --</option>
                                                <option value="HP V220">HP V220</option>
                                                <option value="Konzerto">Konzerto</option>
                                                <option value="Hp V194">Hp V194</option>
                                                <option value="Hp V193b">Hp V193b</option>
                                                <option value="HP V194 18.5-inch Monitor">HP V194 18.5-inch Monitor</option>
                                                <option value="Hp P22v G4 FHD Monitor">Hp P22v G4 FHD Monitor</option>
                                                <option value="TV XIAOMI">TV XIAOMI</option>
                                                <option value="TV Samsung">TV Samsung</option>
                                                <option value="ThinkVision S22i-30">ThinkVision S22i-30</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputsnmonitor" class="form-label">SN Monitor</label>
                                            <input type="text" class="form-control" id="inputsnmonitor" name="snmonitor" list="list_snmonitor" placeholder="Pilih atau ketik manual.." required>
                                            <datalist id="list_snmonitor">
                                                <option value="Tidak ada">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputfamonitor" class="form-label">FA Monitor</label>
                                            <input type="text" class="form-control" id="inputfamonitor" name="famonitor" list="list_famonitor" placeholder="Pilih atau ketik manual.." required>
                                            <datalist id="list_famonitor">
                                                <option value="Tidak ada">
                                            </datalist>
                                        </div>
                                    </div>

                                    <!-- Bagi jadi 2 kolom -->
                                    <div class="col-md-6">

                                        <div class="mb-3">
                                            <label for="inputkeyboard" class="form-label">Keyboard</label>
                                            <input type="text" class="form-control" id="inputkeyboard" name="keyboard" list="list_keyboard" placeholder="Pilih atau ketik manual..." required>
                                            <datalist id="list_keyboard">
                                                <option value="Berfungsi">
                                                <option value="Bermasalah">
                                                <option value="Hilang">
                                                <option value="Rusak Fisik">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputmouse" class="form-label">Mouse</label>
                                            <input type="text" class="form-control" id="inputmouse" name="mouse" list="list_mouse" placeholder="Pilih atau ketik manual..." required>
                                            <datalist id="list_mouse">
                                                <option value="Berfungsi">
                                                <option value="Bermasalah">
                                                <option value="Hilang">
                                                <option value="Rusak Fisik">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputtipewebcam" class="form-label">Tipe Webcam</label>
                                            <input type="text" class="form-control" id="inputtipewebcam" name="tipewebcam" list="list_tipewebcam" placeholder="Pilih atau ketik manual..." required>
                                            <datalist id="list_tipewebcam">
                                                <option value="Tidak ada">
                                                <option value="Microsoft">
                                                <option value="HIKVISION">
                                                <option value="Logitech">
                                                <option value="M-Tech">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputsnwebcam" class="form-label">SN Webcam</label>
                                            <input type="text" class="form-control" id="inputsnwebcam" name="snwebcam" list="list_snwebcam" placeholder="Pilih atau ketik manual..." required>
                                            <datalist id="list_snwebcam">
                                                <option value="Tidak ada">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputfawebcam" class="form-label">FA Webcam</label>
                                            <input type="text" class="form-control" id="inputfawebcam" name="fawebcam" list="list_fawebcam" placeholder="Pilih atau ketik manual..." required>
                                            <datalist id="list_fawebcam">
                                                <option value="Tidak ada">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputtipecamera" class="form-label">Tipe Camera</label>
                                            <input type="text" class="form-control" id="inputtipecamera" name="tipecamera" list="list_tipecamera" placeholder="Pilih atau ketik manual..." required>
                                            <datalist id="list_tipecamera">
                                                <option value="Tidak Ada">
                                                <option value="PTZ">
                                                <option value="TENVEO">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputsncamera" class="form-label">SN Camera</label>
                                            <input type="text" class="form-control" id="inputsncamera" name="sncamera" list="list_sncamera" placeholder="Pilih atau ketik manual..." required>
                                            <datalist id="list_sncamera">
                                                <option value="Tidak ada">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputfacamera" class="form-label">FA Camera</label>
                                            <input type="text" class="form-control" id="inputfacamera" name="facamera" list="list_facamera" placeholder="Pilih atau ketik manual..." required>
                                            <datalist id="list_facamera">
                                                <option value="Tidak ada">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputsnspeakerufo" class="form-label">SN Speaker UFO</label>
                                            <input type="text" class="form-control" id="inputsnspeakerufo" name="snspeakerufo" list="list_snspeakerufo" placeholder="Pilih atau ketik manual..." required>
                                            <datalist id="list_snspeakerufo">
                                                <option value="Tidak ada">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputmerktv" class="form-label">Merk TV</label>
                                            <select class="form-control" id="inputmerktv" name="merktv" required>
                                                <option value="" selected hidden>-- Pilih Merk TV --</option>
                                                <option value="Tidak Ada">Tidak Ada</option>
                                                <option value="Samsung">Samsung</option>
                                                <option value="Xiaomi">Xiaomi</option>
                                                <option value="Mi">Mi</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputsntv" class="form-label">SN TV</label>
                                            <input type="text" class="form-control" id="inputsntv" name="sntv" list="list_sntv" placeholder="Pilih atau ketik manual..." required>
                                            <datalist id="list_sntv">
                                                <option value="Tidak ada">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputfatv" class="form-label">FA TV</label>
                                            <input type="text" class="form-control" id="inputfatv" name="fatv" list="list_fatv" placeholder="Pilih atau ketik manual..." required>
                                            <datalist id="list_fatv">
                                                <option value="Tidak ada">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputstatus" class="form-label">Status</label>
                                            <input type="text" class="form-control" id="inputstatus" name="status" list="list_status" placeholder="Pilih atau ketik manual..." required>
                                            <datalist id="list_status">
                                                <option value="OK">
                                                <option value="NO">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputteknisipengecekan" class="form-label">Teknisi Pengecekan</label>
                                            <select class="form-control" id="inputteknisipengecekan" name="teknisipengecekan" required>
                                                <option value="" selected hidden>-- Pilih Teknisi Pengecekan --</option>
                                                <option value="Yovan">Yovan</option>
                                                <option value="Anwar">Anwar</option>
                                                <option value="Rafly">Rafly</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success btn-lg btn-icon-split" name="simpan">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i></span>
                                        <span class="text">Simpan Data Aset</span>
                                    </button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Anwar 2026</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah jika Anda siap mengakhiri sesi Anda saat ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo $url['base_url']; ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    include '../template/footer.php';
    ?>

    <!-- untuk mengintip tipe input password -->

</body>

</html>



                                                
                                                                                              
                                                