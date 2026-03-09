<?php
session_start();
include('../template/koneksi.php');

//Menangkap id sesuai target yang dipilih
$id = $_GET['id'];

//menjalankan query delete
$query = mysqli_query($koneksi, "DELETE FROM kelas WHERE id='$id'");

if ($query) {
    $_SESSION['info'] = "Data berhasil dihapus!";
} else {
    $_SESSION['info'] = "Data gagal dihapus!";
}

// Langsung lempar kembali ke halaman user
header("Location: kelas.php");
exit();

?>