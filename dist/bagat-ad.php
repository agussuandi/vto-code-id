<?php 
session_start(); 
include "pengaturan.php";
$nama_tampil = "";

if (isset($_SESSION['user_003'])) {
	$pengguna = $_SESSION['user_003'];
	$sql2 = pg_query($koneksi, "SELECT nama FROM tbl_hak_akses where pengguna = '$pengguna'");
    while ($data2 = pg_fetch_assoc($sql2)) {
      $nama_tampil = $data2['nama'];
    }
	include "./dist/bagat-ad-data.php";
}else{

}
?>