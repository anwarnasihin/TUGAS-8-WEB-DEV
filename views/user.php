

<!DOCTYPE html>
<!-- Session untuk notifikasi delete data -->
<?php session_start(); ?> <!DOCTYPE html>
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
                        <h1 class="h3 mb-0 text-gray-800">Data User</h1>
                        
                    </div>

                    <a href="<?php echo $url['base_url']; ?>views/add.php" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Add Data</span>
                    </a>

                    <!-- Content Row -->
                    
                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tables User</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        //Untuk mengambil data dari db
                                        $query=mysqli_query($koneksi, "SELECT * FROM user ORDER BY id ASC");
                                        while($data=mysqli_fetch_array($query)){

                                        ?>
                                        <tr>
                                            <td><?php echo $no++?></td>
                                            <td><?php echo $data['username']?></td>
                                            <td><?php echo $data['password']?></td>
                                            <td>
                                                <div class="text-center">
                                                <a href="#" 
                                                class="btn btn-danger btn-circle btn-sm mr-2" 
                                                data-toggle="modal" 
                                                data-target="#deleteModal" 
                                                data-id="<?php echo $data['id']; ?>">
                                                    <i class="fas fa-trash"></i>
                                                </a>

                                                <a href="<?php echo $url['base_url'];?>views/edit.php?id=<?php echo $data['id']; ?>" 
                                                class="btn btn-warning btn-circle btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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
                    <a class="btn btn-danger" href="<?php echo $url['base_url'];?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- modal notifikasi delete -->
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content border-left-success shadow">
                <div class="modal-body text-center">
                    <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                    <p class="mb-0 font-weight-bold"><?php echo $_SESSION['info']; ?></p>
                </div>
                <div class="modal-footer p-2">
                    <button class="btn btn-secondary btn-sm block-btn" type="button" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


    <!-- modal dan script jQuery konfirmasi hapus  -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah Anda yakin ingin menghapus data ini?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger" id="confirmDelete">Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- Script modal konfirmasi delete data -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // 1. LOGIKA MODAL KONFIRMASI HAPUS
    // Fungsi ini menangkap ID dari tombol trash yang diklik di tabel
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); 
        var id = button.data('id'); 
        
        // Memasukkan ID ke link 'Hapus' yang ada di dalam modal
        var deleteUrl = "delete.php?id=" + id;
        $('#confirmDelete').attr('href', deleteUrl);
    });

    // 2. LOGIKA MODAL NOTIFIKASI (SESUDAH HAPUS)
    // Jika ada session 'info', modal notifikasi akan langsung muncul saat halaman diload
    <?php if (isset($_SESSION['info'])) : ?>
        $('#infoModal').modal('show');
    <?php 
        unset($_SESSION['info']); // Penting: hapus agar tidak muncul lagi saat di-refresh
        endif; 
    ?>
});
</script>

    <?php
    include '../template/footer.php';
    ?>

</body>

</html>