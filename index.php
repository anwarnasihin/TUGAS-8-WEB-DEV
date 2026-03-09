<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    include 'template/link.php';
    include 'template/head.php';
    include 'template/koneksi.php';
    ?>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login!</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user" placeholder="Username..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="InputPassword" placeholder="Password..." required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" onclick="showPassword()">
                                                <label class="custom-control-label" for="customCheck">Check me out</label>
                                            </div>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>

                                    
                                    <div class="text-center">
                                        <a class="small" href="<?php echo $url['base_url']; ?>views/register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


        </div>

    </div>

    <?php
    include 'template/footer.php';
    ?>

<!-- untuk mengintip tipe input password -->
<script>
function showPassword() {
    // Ambil elemen input password berdasarkan ID-nya
    var x = document.getElementById("InputPassword");
    
    // Cek jika tipenya password, ubah ke text. Jika bukan, kembalikan ke password.
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Notifikasi Login</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="modalMessage">
                </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal" id="btnOk">Oke</button>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['username'] = $data['username'];
        $_SESSION['status'] = "login";
        
        // LANGSUNG PINDAH: Tanpa modal, tanpa delay.
        echo "<script>window.location.href='views/dashboard.php';</script>";
        exit(); 
    } else {
        // TETAP MODAL: Jika salah, tampilkan modal peringatan.
        echo "<script>
            $(document).ready(function(){
                $('#modalMessage').html('<span class=\"text-danger\"><b>Username atau Password Salah!</b></span>');
                $('#loginModal').modal('show');
            });
        </script>";
    }
}
?>
</body>

</html>