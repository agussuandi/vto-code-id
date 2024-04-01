<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "./dist/pengaturan.php";

$barcode = $_POST["barcode"];
$sku = $_POST["sku"];
$brand = $_POST["brand"];
$namaEngine = str_replace(' ', '', $sku);


if (isset($_SESSION['user_003'])) {
 $akses = $_SESSION['stat_003'];


 if (
    $barcode == "" || $sku == "" || $brand == "") {
        ?>
        <script language=javascript>
            alert("Masih Terdapat inputan Kosong");
            document.location.href = "javascript:history.back()";
        </script>


        <?php

    } else {
        
        $targetfolder = "images/";
        $targetfolder = $targetfolder . basename($_FILES['file']['name']);
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder)) {

            $sql = "INSERT INTO tbl_produk(barcode,sku,brand, kode_kacamata,alamat_gambar) VALUES (
            '$barcode','$sku','$brand','$namaEngine','$targetfolder')";

            $result = pg_query($koneksi, $sql);


            // if successfully insert data into database, displays message "Successful". 
            if ($result) {

                echo '<script language=javascript>
                var kode1 = "./detail.php?code='.$namaEngine.'";
                alert("Berhasil Input Data");
                document.location.href = kode1;
                </script>';
                
            } else {
                //echo "ERROR INPUT DATA!!";
                echo "Error :" . $sql;
                ?>
                <script language=javascript>
                    alert("Kegagalan Sistem, silahkan coba lagi");
                    document.location.href = "javascript:history.back()";
                </script>

                <?php
            }
            
        }else{
            ?>
            <script language=javascript>
                alert("Terjadi Kegagalan ketika menyimpan");
                document.location.href = "javascript:history.back()";
            </script>

            <?php
        }
    }}
    ?>
