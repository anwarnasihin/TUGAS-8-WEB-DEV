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
    $query=mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");
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
                        <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-4">
                            <form method="post">
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id" value="<?php echo $data['id']; ?>">
                                    <label for="exampleInputEmail1" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" value="<?php echo $data['username']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?php echo $data['password']; ?>">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="showPassword()">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                               <button type="submit" class="btn btn-success btn-icon-split" name="edit">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Edit</span>
                                </button>
                            </form>



                            <?php 
                                // Cek apakah tombol edit sudah diklik
                                if (isset($_POST['edit'])) {
                                    $username = $_POST['username'];
                                    $password = $_POST['password'];

                                    // Query untuk update data berdasarkan ID yang ditangkap dari URL
                                    $query = mysqli_query($koneksi, "UPDATE user SET username='$username', password='$password' WHERE id='$id'");

                                    if ($query) {
                                        // Simpan pesan sukses ke dalam session
                                        $_SESSION['info'] = "Data berhasil diupdate!";
                                        
                                        // Alihkan ke halaman user.php menggunakan JavaScript
                                        echo "<script>window.location.href='user.php';</script>";
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