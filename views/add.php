<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php 
    include '../template/link.php';
    include '../template/head.php';
    include '../template/koneksi.php';
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
                        <h1 class="h3 mb-0 text-gray-800">Add User</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-4">
                            <form method="post">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="showPassword()">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                               <button type="submit" class="btn btn-success btn-icon-split" name="simpan">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Submit</span>
                                </button>
                            </form>

                            <?php 
                            
                            //cek apakah Buttonya sudah di klik
                            if (isset($_POST['simpan'])) {
                                $username=$_POST['username'];
                                $password=$_POST['password'];

                                //query untuk menyimpan
                                $query=mysqli_query($koneksi, "INSERT INTO user(username, password) VALUES ('$username', '$password')");

                                if ($query) {
                                    // Set pesan sukses ke session
                                    $_SESSION['info'] = "Data berhasil disimpan!";
                                    
                                    // Redirect langsung ke user.php
                                    echo "<script>window.location.href='user.php';</script>";
                                } else {
                                    // Jika gagal, tampilkan alert di halaman ini saja atau set session gagal
                                    echo "<script>alert('Data gagal di simpan');</script>";
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

<!-- untuk mengintip tipe input password -->
<script>
function showPassword() {
    // Ambil elemen input password berdasarkan ID-nya
    var x = document.getElementById("exampleInputPassword1");
    
    // Cek jika tipenya password, ubah ke text. Jika bukan, kembalikan ke password.
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
</body>

</html>