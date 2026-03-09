<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php 
    include '../template/link.php';
    include '../template/head.php';
    include '../template/koneksi.php';

    //menangkap id dari url
    $id=$_GET['id'];

    //mengambil query edit data 
    $query=mysqli_query($koneksi, "SELECT * FROM kelas WHERE id='$id'");
    $data=mysqli_fetch_array($query);

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
                        <h1 class="h3 mb-0 text-gray-800">Edit Data Kelas</h1>
                        
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
                                            <?php
                                                // Daftar opsi dalam array agar kode lebih bersih
                                                $options = [
                                                    "A0115A","A0115B","A0115C","A0118","A0119","A0119 Stand TV","A0124A",
                                                    "A0124B","A0124C Stand TV","A0125","A0126","A0127","A0313","A0401",
                                                    "A0406","A0407","A0408","A0409","A0410","A0411","A0412","A0413","A0414",
                                                    "A0415","A0416","A0420","A0421","A0503","A0504","A0505","A0506","A0507","A0508",
                                                    "A0510","A0511","A0512","A0513","A0514","A0515","A0516","A0517"
                                                ];

                                                foreach ($options as $opt) {
                                                    // Cek apakah data di database sama dengan opsi saat ini
                                                    $selected = ($data['ruangan'] == $opt) ? 'selected' : '';
                                                    echo "<option value='$opt' $selected>$opt</option>";
                                                }
                                                ?>
                                            </select>  
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputtipekelas" class="form-label">Tipe Kelas</label>
                                            <select class="form-control" id="inputtipekelas" name="tipekelas" required>
                                                <?php
                                                // Daftar opsi dalam array agar kode lebih bersih
                                                $options = [
                                                    "LAB HM", "LAB HM Front Office", "LAB HM Restaurant", 
                                                    "LAB HM Housekeeping", "Reguler Class Hybrid", 
                                                    "LAB HM resto Standing TV", "Reguler Class", 
                                                    "Lab Psikologi Class", "Creative Class Hybrid", 
                                                    "Tribun Class Hybrid", "Tribun Class "
                                                ];

                                                foreach ($options as $opt) {
                                                    // Cek apakah data di database sama dengan opsi saat ini
                                                    $selected = ($data['tipekelas'] == $opt) ? 'selected' : '';
                                                    echo "<option value='$opt' $selected>$opt</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">   
                                            <label for="inputaccountoffice" class="form-label">Account Office</label>
                                            <input type="text" 
                                            class="form-control" 
                                            id="accountoffice" 
                                            name="accountoffice" 
                                            value="<?php echo $data['accountoffice']; ?>" 
                                            list="listAccountOffice" 
                                            placeholder="Pilih atau ketik manual..."
                                            autocomplete="off"
                                            onmousedown="val = this.value; this.value = ''; setTimeout(() => { this.value = val; this.showPicker(); }, 10);">
                                            <datalist id="listAccountOffice">
                                                <option value="bmca001@binus.edu">
                                                <option value="bmca002@binus.edu">
                                                <option value="bmca003@binus.edu">
                                                <option value="bmca004@binus.edu">
                                                <option value="bmca005@binus.edu">
                                                <option value="bmca006@binus.edu">
                                                <option value="bmca007@binus.edu">
                                                <option value="bmca008@binus.edu">
                                                <option value="bmca009@binus.edu">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputtipepc" class="form-label">Type PC</label>
                                            <input type="text" 
                                            class="form-control" 
                                            id="inputtipepc" 
                                            name="tipepc" 
                                            value="<?php echo $data['tipepc']; ?>" 
                                            list="listTypePC" 
                                            placeholder="Pilih atau ketik manual..."
                                            autocomplete="off"
                                            onmousedown="val = this.value; this.value = ''; setTimeout(() => { this.value = val; this.showPicker(); }, 10);">
                                            <datalist id="listTypePC">
                                                <option value="Mini PC HP Prodesk 400 G6">
                                                <option value="Dell Latitude 5420">
                                                <option value="Asus ROG PC">
                                                <option value="Lenovo ThinkPad">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputsnpc" class="form-label">SN PC</label>
                                            <input type="text" 
                                            class="form-control" 
                                            id="inputsnpc" 
                                            name="snpc" 
                                            value="<?php echo $data['snpc']; ?>" 
                                            list="list_SNPC" 
                                            placeholder="Pilih atau ketik manual..."
                                            autocomplete="off"
                                            onmousedown="val = this.value; this.value = ''; setTimeout(() => { this.value = val; this.showPicker(); }, 10);">
                                            <datalist id="list_SNPC">
                                                <option value="Tidak Ada">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputfapc" class="form-label">FA PC</label>
                                            <input type="text" 
                                            class="form-control" 
                                            id="inputfapc" 
                                            name="fapc" 
                                            value="<?php echo $data['fapc']; ?>" 
                                            list="list_FAPC" 
                                            placeholder="Pilih atau ketik manual..."
                                            autocomplete="off"
                                            onmousedown="const val = this.value; this.value = ''; setTimeout(() => { this.value = val; this.showPicker(); }, 10);">
                                            <datalist id="list_FAPC">
                                                <option value="Tidak Ada">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <input type="hidden" class="form-control" id="inputspesifikasi" name="id" value="<?php echo $data['id']; ?>">
                                            <label for="inputspesifikasi" class="form-label">Spesifikasi</label>
                                            <input type="text" class="form-control" id="inputspesifikasi" name="spesifikasi" value="<?php echo $data['spesifikasi']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <input type="hidden" class="form-control" id="inputipaddress" name="id" value="<?php echo $data['id']; ?>">
                                            <label for="inputipaddress" class="form-label">Ip Address</label>
                                            <input type="text" class="form-control" id="inputipaddress" name="ipaddress" value="<?php echo $data['ipaddress']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <input type="hidden" class="form-control" id="inputmacaddress" name="id" value="<?php echo $data['id']; ?>">
                                            <label for="inputmacaddress" class="form-label">Mac Address</label>
                                            <input type="text" class="form-control" id="inputmacaddress" name="macaddress" value="<?php echo $data['macaddress']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputssd" class="form-label">SSD</label>
                                            <input type="text" 
                                            class="form-control" 
                                            id="inputssd" 
                                            name="ssd" 
                                            value="<?php echo $data['ssd']; ?>" 
                                            list="list_SSD" 
                                            placeholder="Pilih atau ketik manual..."
                                            autocomplete="off"
                                            onmousedown="val = this.value; this.value = ''; setTimeout(() => { this.value = val; this.showPicker(); }, 10);">
                                            <datalist id="list_SSD">
                                                <option value="256 GB">
                                                <option value="512 GB">
                                                <option value="1 TB">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputmemory" class="form-label">Memory</label>
                                            <input type="text" 
                                            class="form-control" 
                                            id="inputmemory" 
                                            name="memory" 
                                            value="<?php echo $data['memory']; ?>" 
                                            list="list_RAM" 
                                            placeholder="Pilih atau ketik manual..."
                                            autocomplete="off"
                                            onmousedown="val = this.value; this.value = ''; setTimeout(() => { this.value = val; this.showPicker(); }, 10);">
                                            <datalist id="list_RAM">
                                                <option value="4 GB">
                                                <option value="8 GB">
                                                <option value="16 GB">
                                                <option value="32 GB">
                                                <option value="64 GB">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputtipemonitor" class="form-label">Type Monitor</label>
                                            <select class="form-control" id="inputtipemonitor" name="tipemonitor" required>
                                                <?php
                                                // Daftar opsi dalam array agar kode lebih bersih
                                                $options = [
                                                            "Hp V194", "Hp V193b", "HP V194 18.5-inch Monitor",
                                                            "Hp P22v G4 FHD Monitor", "TV XIAOMI", "TV Samsung", "ThinkVision S22i-30"
                                                ];
                                                foreach ($options as $opt) {
                                                    // Cek apakah data di database sama dengan opsi saat ini
                                                    $selected = ($data['tipemonitor'] == $opt) ? 'selected' : '';
                                                    echo "<option value='$opt' $selected>$opt</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputsnmonitor" class="form-label">SN Monitor</label>
                                            <input type="text" 
                                            class="form-control" 
                                            id="inputsnmonitor" 
                                            name="snmonitor" 
                                            value="<?php echo $data['snmonitor']; ?>" 
                                            list="list_SN_Monitor" 
                                            placeholder="Pilih atau ketik manual..."
                                            autocomplete="off"
                                            onmousedown="val = this.value; this.value = ''; setTimeout(() => { this.value = val; this.showPicker(); }, 10);">
                                            <datalist id="list_SN_Monitor">
                                                <option value="Tidak Ada">
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputfamonitor" class="form-label">FA Monitor</label>
                                            <input type="text" 
                                            class="form-control" 
                                            id="inputfamonitor" 
                                            name="famonitor" 
                                            value="<?php echo $data['famonitor']; ?>" 
                                            list="list_FA_Monitor" 
                                            placeholder="Pilih atau ketik manual..."
                                            autocomplete="off"
                                            onmousedown="val = this.value; this.value = ''; setTimeout(() => { this.value = val; this.showPicker(); }, 10);">
                                            <datalist id="list_FA_Monitor">
                                                <option value="Tidak Ada">
                                            </datalist>
                                        </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="inputkeyboard" class="form-label">Keyboard</label>
                                        <input type="text" 
                                        class="form-control" 
                                        id="inputkeyboard" 
                                        name="keyboard" 
                                        value="<?php echo $data['keyboard']; ?>" 
                                        list="listKeyboard" 
                                        placeholder="Pilih atau ketik manual..."
                                        autocomplete="off"
                                        onmousedown="val = this.value; this.value = ''; setTimeout(() => { this.value = val; this.showPicker(); }, 10);">
                                        <datalist id="listKeyboard">
                                            <option value="Berfungsi">
                                            <option value="Bermasalah">
                                            <option value="Hilang">
                                            <option value="Rusak Fisik">
                                        </datalist>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputmouse" class="form-label">Mouse</label>
                                        <input type="text" 
                                        class="form-control" 
                                        id="inputmouse" 
                                        name="mouse" 
                                        value="<?php echo $data['mouse']; ?>" 
                                        list="listMouse" 
                                        placeholder="Pilih atau ketik manual..."
                                        autocomplete="off"
                                        onmousedown="val = this.value; this.value = ''; setTimeout(() => { this.value = val; this.showPicker(); }, 10);">
                                        <datalist id="listMouse">
                                            <option value="Berfungsi">
                                            <option value="Bermasalah">
                                            <option value="Hilang">
                                            <option value="Rusak Fisik">
                                        </datalist>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputtipewebcam" class="form-label">Type Webcam</label>
                                        <select class="form-control" id="inputtipewebcam" name="tipewebcam" required>
                                            <?php
                                            // Daftar opsi dalam array agar kode lebih bersih
                                            $options = [
                                                        "Tidak ada", "Microsoft", "HIKVISION", "Logitech", "M-Tech"
                                            ];
                                            foreach ($options as $opt) {
                                                // Cek apakah data di database sama dengan opsi saat ini
                                                $selected = ($data['tipewebcam'] == $opt) ? 'selected' : '';
                                                echo "<option value='$opt' $selected>$opt</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputsnwebcam" class="form-label">SN Webcam</label>
                                        <input type="text" 
                                        class="form-control" 
                                        id="inputsnwebcam" 
                                        name="snwebcam" 
                                        value="<?php echo $data['snwebcam']; ?>" 
                                        list="listSN_Webcam" 
                                        placeholder="Pilih atau ketik manual..."
                                        autocomplete="off"
                                        onmousedown="val = this.value; this.value = ''; setTimeout(() => { this.value = val; this.showPicker(); }, 10);">
                                        <datalist id="listSN_Webcam">
                                            <option value="Tidak Ada">
                                        </datalist>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputfawebcam" class="form-label">FA Webcam</label>
                                        <input type="text" 
                                        class="form-control" 
                                        id="inputfawebcam" 
                                        name="fawebcam" 
                                        value="<?php echo $data['fawebcam']; ?>" 
                                        list="listFA_Webcam" 
                                        placeholder="Pilih atau ketik manual..."
                                        autocomplete="off"
                                        onmousedown="val = this.value; this.value = ''; setTimeout(() => { this.value = val; this.showPicker(); }, 10);">
                                        <datalist id="listFA_Webcam">
                                            <option value="Tidak Ada">
                                        </datalist>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputtipecamera" class="form-label">Type Camera</label>
                                        <select class="form-control" id="inputtipecamera" name="tipecamera" required>
                                            <?php
                                            // Daftar opsi dalam array agar kode lebih bersih
                                            $options = [
                                                        "Tidak ada", "PTZ", "TENVEO"
                                            ];
                                            foreach ($options as $opt) {
                                                // Cek apakah data di database sama dengan opsi saat ini
                                                $selected = ($data['tipecamera'] == $opt) ? 'selected' : '';
                                                echo "<option value='$opt' $selected>$opt</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputsncamera" class="form-label">SN Camera</label>
                                        <input type="text" 
                                        class="form-control" 
                                        id="inputsncamera" 
                                        name="sncamera" 
                                        value="<?php echo $data['sncamera']; ?>" 
                                        list="listSN_Camera" 
                                        placeholder="Pilih atau ketik manual..."
                                        autocomplete="off"
                                        onmousedown="val = this.value; this.value = ''; setTimeout(() => { this.value = val; this.showPicker(); }, 10);">
                                        <datalist id="listSN_Camera">
                                            <option value="Tidak Ada">
                                        </datalist>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputfacamera" class="form-label">FA Camera</label>
                                        <input type="text" 
                                        class="form-control" 
                                        id="inputfacamera" 
                                        name="facamera" 
                                        value="<?php echo $data['facamera']; ?>" 
                                        list="listFA_Camera" 
                                        placeholder="Pilih atau ketik manual..."
                                        autocomplete="off"
                                        onmousedown="val = this.value; this.value = ''; setTimeout(() => { this.value = val; this.showPicker(); }, 10);">
                                        <datalist id="listFA_Camera">
                                            <option value="Tidak Ada">
                                        </datalist>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputsnspeakerufo" class="form-label">SN Speaker UFO</label>
                                        <input type="text" 
                                        class="form-control" 
                                        id="inputsnspeakerufo" 
                                        name="snspeakerufo" 
                                        value="<?php echo $data['snspeakerufo']; ?>" 
                                        list="listSN_SpeakerUFO" 
                                        placeholder="Pilih atau ketik manual..."
                                        autocomplete="off"
                                        onmousedown="val = this.value; this.value = ''; setTimeout(() => { this.value = val; this.showPicker(); }, 10);">
                                        <datalist id="listSN_SpeakerUFO">
                                            <option value="Tidak Ada">
                                        </datalist>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputmerktv" class="form-label">Merk TV</label>
                                        <select class="form-control" id="inputmerktv" name="merktv" required>
                                            <?php
                                            // Daftar opsi dalam array agar kode lebih bersih
                                            $options = [
                                                        "Tidak Ada","Samsung","Xiaomi","Mi"
                                            ];
                                            foreach ($options as $opt) {
                                                // Cek apakah data di database sama dengan opsi saat ini
                                                $selected = ($data['merktv'] == $opt) ? 'selected' : '';
                                                echo "<option value='$opt' $selected>$opt</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputsntv" class="form-label">SN TV</label>
                                        <input type="text" 
                                        class="form-control" 
                                        id="inputsntv" 
                                        name="sntv" 
                                        value="<?php echo $data['sntv']; ?>" 
                                        list="listSN_TV" 
                                        placeholder="Pilih atau ketik manual..."
                                        autocomplete="off"
                                        onmousedown="val = this.value; this.value = ''; setTimeout(() => { this.value = val; this.showPicker(); }, 10);">
                                        <datalist id="listSN_TV">
                                            <option value="Tidak Ada">
                                        </datalist>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputfatv" class="form-label">FA TV</label>
                                        <input type="text" 
                                        class="form-control" 
                                        id="inputfatv" 
                                        name="fatv" 
                                        value="<?php echo $data['fatv']; ?>" 
                                        list="listFA_TV" 
                                        placeholder="Pilih atau ketik manual..."
                                        autocomplete="off"
                                        onmousedown="val = this.value; this.value = ''; setTimeout(() => { this.value = val; this.showPicker(); }, 10);">
                                        <datalist id="listFA_TV">
                                            <option value="Tidak Ada">
                                        </datalist>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputstatus" class="form-label">Status</label>
                                        <input type="text" 
                                        class="form-control" 
                                        id="inputstatus" 
                                        name="status" 
                                        value="<?php echo $data['status']; ?>" 
                                        list="listStatus" 
                                        placeholder="Pilih atau ketik manual..."
                                        autocomplete="off"
                                        onmousedown="val = this.value; this.value = ''; setTimeout(() => { this.value = val; this.showPicker(); }, 10);">
                                        <datalist id="listStatus">
                                            <option value="OK">
                                            <option value="NO">
                                        </datalist>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputteknisipengecekan" class="form-label">Teknisipengecekan</label>
                                        <select class="form-control" id="inputteknisipengecekan" name="teknisipengecekan" required>
                                            <?php
                                            // Daftar opsi dalam array agar kode lebih bersih
                                            $options = [
                                                        "Yovan","Anwar","Rafly"
                                            ];
                                            foreach ($options as $opt) {
                                                // Cek apakah data di database sama dengan opsi saat ini
                                                $selected = ($data['teknisipengecekan'] == $opt) ? 'selected' : '';
                                                echo "<option value='$opt' $selected>$opt</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 text-center">
                               <button type="submit" class="btn btn-success btn-icon-split" name="edit">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Edit</span>
                                </button>
                            </div>
                            </form>

                            <?php 
                                // Cek apakah tombol edit sudah diklik
                                if (isset($_POST['edit'])) {
                                    $id_update = $_POST['id_kelas'];
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

                                    // Query untuk update data berdasarkan ID yang ditangkap dari URL
                                    $query = mysqli_query($koneksi, "UPDATE kelas SET ruangan='$ruangan', tipekelas='$tipekelas', 
                                    accountoffice='$accountoffice', tipepc='$tipepc', snpc='$snpc', fapc='$fapc', spesifikasi='$spesifikasi', 
                                    ipaddress='$ipaddress', macaddress='$macaddress', ssd='$ssd', memory='$memory', tipemonitor='$tipemonitor', 
                                    snmonitor='$snmonitor', famonitor='$famonitor', keyboard='$keyboard', mouse='$mouse', tipewebcam='$tipewebcam', 
                                    snwebcam='$snwebcam', fawebcam='$fawebcam', tipecamera='$tipecamera', sncamera='$sncamera', facamera='$facamera', 
                                    snspeakerufo='$snspeakerufo', merktv='$merktv', sntv='$sntv', fatv='$fatv', status='$status', 
                                    teknisipengecekan='$teknisipengecekan' WHERE id='$id'");

                                    if ($query) {
                                        // Simpan pesan sukses ke dalam session
                                        $_SESSION['info'] = "Data berhasil diupdate!";
                                        
                                        // Alihkan ke halaman kelas.php menggunakan JavaScript
                                        echo "<script>window.location.href='kelas.php';</script>";
                                    } else {
                                        // Jika gagal, tampilkan alert di halaman ini
                                        echo "<script>alert('Data gagal di edit');</script>";
                                    }
                                }
                                ?>
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
                    <a class="btn btn-primary" href="<?php echo $url['base_url'];?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    include '../template/footer.php';
    ?>

    <!-- Fungsi intip password -->
    <script>
function showPassword() {
    var x = document.getElementById("exampleInputPassword1");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
</body>

</html>