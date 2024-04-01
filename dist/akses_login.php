<?php
session_start();
//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "pengaturan.php";
$user_001 = $_POST['username_001'];
$pass_001 = $_POST['password_001'];
      $nama_pengguna = "";
      $pass_pengguna = "";
      $stat_pengguna = "";
    

if ($user_001 == '' || $pass_001 == '') {
    ?>
    <script language=javascript>
        alert('masih ada data kosong');
        document.location.href = "../index.php";
    </script>

    <?php
} else {
    $q = "SELECT * FROM tbl_hak_akses WHERE pengguna = '$user_001'";
    //$result = pg_query($koneksi, $q);
    //$data = pg_fetch_assoc($result);
    $result = pg_query($koneksi, $q);
    //$data = pg_fetch_array($stmt);
    while ($row = pg_fetch_assoc($result)) {
      $nama_pengguna = $row['pengguna'];
      $pass_pengguna = $row['pass'];
      $stat_pengguna = $row['stat'];
    }

    //cek kesesuaian password masukan dengan database
  if ($pass_001 == $pass_pengguna) {
        //menyimpan tipe user dan username dalam session

    $_SESSION['user_003'] = $nama_pengguna;
    $_SESSION['stat_003'] = $stat_pengguna;


    ?>
    <script language=javascript>
        alert('Selamat Datang');
        document.location.href = "../dashboard.php";
    </script>
    <?php
  } else {
    echo "PGERROR";
  }
}
?>