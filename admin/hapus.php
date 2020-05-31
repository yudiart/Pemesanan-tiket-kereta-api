<?php 
// koneksi database
require '../server/config.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($conn,"delete from jadwal where id='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:jadwal.php");
 
?>