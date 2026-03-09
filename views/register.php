<?php
    session_start();
    include '../template/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    include '../template/link.php';
    include '../template/head.php';
    ?>

</head>

<body class="bg-gradient-primary">

    <div class="container">

    

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form method="POST" class="user">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" placeholder="Username..." required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password..." required>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck" onclick="showPassword()">
                                        <label class="custom-control-label" for="customCheck">Check me out</label>
                                    </div>
                                </div>
                                <button type="submit" name="register" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <?php
                                if (isset($_POST['register'])) {
                                    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
                                    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

                                    $query = mysqli_query($koneksi, "INSERT INTO user(username, password) VALUES ('$username', '$password')");

                                    if ($query) {
                                        echo "
                                        <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
                                        <script>
                                            $(document).ready(function(){
                                                // Tampilkan Modal
                                                $('#successModal').modal('show');
                                                
                                                // Redirect otomatis setelah 2 detik (2000 milidetik)
                                                setTimeout(function(){
                                                    window.location.href = '../index.php';
                                                }, 2000);
                                            });
                                        </script>";
                                    } else {
                                        echo "<script>alert('Gagal registrasi: " . mysqli_error($koneksi) . "');</script>";
                                    }
                                }
                                ?>
                            <div class="text-center">
                                <a class="small" href="<?php echo $url['base_url']?>">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        

    </div>

    <!-- fungsi notif registrasi -->
    <script>
    function showPassword() {
        var x = document.getElementById("exampleInputPassword");
        x.type = x.type === "password" ? "text" : "password";
    }
    </script>

    <?php
    include '../template/footer.php';
    ?>

    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel">Registrasi Berhasil!</h5>
            </div>
            <div class="modal-body text-center p-4">
                <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                <p>Akun anda berhasil didaftarkan. Sedang mengalihkan ke halaman login...</p>
            </div>
        </div>
    </div>
</div>
</div>
</body>

</html>