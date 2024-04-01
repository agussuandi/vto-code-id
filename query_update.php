<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "./dist/pengaturan.php";

$alamat_engine = $_POST['alamat_engine'];
$barcode = $_POST["barcode"];
$sku = $_POST["sku"];
$brand = $_POST["brand"];
$kode_kacamata = str_replace(' ', '', $sku);
$code = $_POST["code"];
$code2 = $code;


if (isset($_SESSION['user_003'])) {
 $akses = $_SESSION['stat_003'];



 if (
    $barcode == "" || $sku == ""
    || $brand == "") {
        ?>
        <script language=javascript>
            alert("Masih Terdapat inputan Kosong");
            var php_var = "<?php echo "./form-update.php?code=$code"; ?>";
            document.location.href = ""+php_var;
        </script>

        <?php

    } else {

        if ($_FILES['file']['error'] == 4 || ($_FILES['file']['size'] == 0 && $_FILES['file']['error'] == 0))
        {
            $sql = "UPDATE tbl_produk SET sku = '$sku',  barcode = '$barcode', brand = '$brand', kode_kacamata = '$kode_kacamata' WHERE kode_kacamata='$code2'";

            $result = pg_query($koneksi, $sql);

            // if successfully insert data into database, displays message "Successful". 
            if ($result) {
                ?>
                <script language=javascript>
                    alert("Berhasil Ubah Data");
                    var php_var = "<?php echo "./detail.php?code=$kode_kacamata"; ?>";
                    document.location.href = ""+php_var;
                </script>
                <?php
            } else {
                //ERROR UBAH DATA!!
                echo "Error :" . $sql;
                ?>
                <script language=javascript>
                    alert("Kegagalan Sistem, silahkan coba lagi");
                    var php_var = "<?php echo "./form-update.php?code=$code"; ?>";
                    document.location.href = ""+php_var;
                </script>

                <?php
            }
        }else{            
            $targetfolder = "images/";
            $targetfolder = $targetfolder . basename($_FILES['file']['name']);
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder)) {

                $sql = "UPDATE tbl_produk SET sku = '$sku',  barcode = '$barcode', brand = '$brand', kode_kacamata = '$kode_kacamata', alamat_gambar = '$targetfolder' WHERE kode_kacamata='$code2'";

                $result = pg_query($koneksi, $sql);

            // if successfully update database, displays message.
                if ($result) {
                    ?>
                    <script language=javascript>
                        alert("Berhasil Ubah Data");
                        var php_var = "<?php echo "./detail.php?code=$kode_kacamata"; ?>";
                        document.location.href = ""+php_var;
                    </script>
                    <?php
                } else {
                //ERROR UBAH DATA!!
                    echo "Error :" . $sql . "<br>";
                    ?>
                    <script language=javascript>
                        alert("Kegagalan Sistem, silahkan coba lagi");
                        var php_var = "<?php echo "./form-update.php?code=$code"; ?>";
                        document.location.href = ""+php_var;
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
        }     
    }
}
else{
  header("Location: index.php", TRUE, 301);
  exit();
}
?>