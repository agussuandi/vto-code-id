<?php
session_start(); 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));


include "pengaturan.php";

$id = $_GET["code"];

if (isset($_SESSION['user_003'])) {
    $akses = $_SESSION['stat_003'];
    if ($id == "") {
        ?>
        <script language=javascript>
            alert("Periksa Kembali Data");
            document.location.href = "../hapus.php?code=<?php echo $id ?>";
        </script>


        <?php

    } else {

    // delete data from DB 
        $sql = "DELETE FROM tbl_produk WHERE kode_kacamata='$id'";

        $result = pg_query($koneksi, $sql);


    // if successfully delete data from database, displays message "Successful". 
        if ($result) {

            ?>
            <script language=javascript>
                alert("Berhasil Hapus Data");
                document.location.href = "../form-product.php";
            </script>
            <?php
        } else {
            ?>
            <script language=javascript>
                alert("Kegagalan Sistem, silahkan coba lagi");
                document.location.href = "../hapus.php?code=<?php echo $id ?>";
            </script>

            <?php
        }
    }
}else{
    header("Location: ../index.php", TRUE, 301);
    exit();
}
?>