<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php 
    include '../template/link.php';
    include '../template/head.php';
    include '../template/koneksi.php';
    ?>
    <link rel="stylesheet" href="<?php echo $url['base_url']; ?>assets/css/custom-datatables.css">
    <link rel="stylesheet" href="<?php echo $url['base_url']; ?>assets/css/style-tabel.css">

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
                    <div class="mb-2">
                        <h1 class="h3 mb-0 text-gray-800">Data Asset Kelas</h1>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-3"> 
                        <a href="<?php echo $url['base_url']; ?>views/add_kelas.php" class="btn btn-success btn-icon-split shadow-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Add Data</span>
                        </a>
                        
                        <a href="../template/export_excel_kelas.php" class="btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report to Excel
                        </a>
                    </div>
                    <!-- Content Row -->
                    
                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tables Assets Kelas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
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
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php

                                        // 2. Query untuk mengambil data
                                        $query = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY id DESC");
                                        $no = 1;

                                        // 3. Loop data
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['ruangan']; ?></td>
                                                <td><?php echo $row['tipekelas']; ?></td>
                                                <td><?php echo $row['accountoffice']; ?></td>
                                                <td><?php echo $row['tipepc']; ?></td>
                                                <td><?php echo $row['snpc']; ?></td>
                                                <td><?php echo $row['fapc']; ?></td>
                                                <td><?php echo $row['spesifikasi']; ?></td>
                                                <td><?php echo $row['ipaddress']; ?></td>
                                                <td><?php echo $row['macaddress']; ?></td>
                                                <td><?php echo $row['ssd']; ?></td>
                                                <td><?php echo $row['memory']; ?></td>
                                                <td><?php echo $row['tipemonitor']; ?></td>
                                                <td><?php echo $row['snmonitor']; ?></td>
                                                <td><?php echo $row['famonitor']; ?></td>
                                                <td><?php echo $row['keyboard']; ?></td>
                                                <td><?php echo $row['mouse']; ?></td>
                                                <td><?php echo $row['tipewebcam']; ?></td>
                                                <td><?php echo $row['snwebcam']; ?></td>
                                                <td><?php echo $row['fawebcam']; ?></td>
                                                <td><?php echo $row['tipecamera']; ?></td>
                                                <td><?php echo $row['sncamera']; ?></td>
                                                <td><?php echo $row['facamera']; ?></td>
                                                <td><?php echo $row['snspeakerufo']; ?></td>
                                                <td><?php echo $row['merktv']; ?></td>
                                                <td><?php echo $row['sntv']; ?></td>
                                                <td><?php echo $row['fatv']; ?></td>
                                                <td><?php echo $row['status']; ?></td>
                                                <td><?php echo $row['teknisipengecekan']; ?></td>
                                                <td>
                                                    <div class="text-center">
                                                    <a href="#" 
                                                        class="btn btn-danger btn-circle btn-sm mr-2"
                                                        data-toggle="modal"
                                                        data-target="#deleteModal"
                                                        data-id="<?php echo $row['id']; ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <a href="<?php echo $url['base_url'];?>views/edit_kelas.php?id=<?php echo $row['id']; ?>" 
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
        var deleteUrl = "delete_kelas.php?id=" + id;
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

// Agar posisi pagination Next Previous berada di sebelah kanan dan sejajar dengan kolom search
$(document).ready(function() {
    $('#dataTable').DataTable({
        // Layouting: 
        // Baris atas: Length (l) dan Filter (f)
        // Baris tengah: Table (t)
        // Baris bawah: Info (i) dan Pagination (p) sejajar
        "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
               "<'row'<'col-sm-12'tr>>" +
               "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        "language": {
            "paginate": {
                "previous": "<i class='fas fa-angle-left'></i>",
                "next": "<i class='fas fa-angle-right'></i>"
            }
        }
    });

    $('#dataTable').on('draw.dt', function() {
        // Memaksa class Bootstrap agar pagination rapat kanan
        $('.pagination').addClass('justify-content-end');
        // Memberikan margin kiri otomatis agar terdorong ke kanan
        $('.dataTables_paginate').css('margin-left', 'auto');
    });
    
    // Panggil sekali saat pertama kali halaman dimuat
    $('.pagination').addClass('justify-content-end');
});
</script>

    <?php
    include '../template/footer.php';
    ?>

</body>

</html>