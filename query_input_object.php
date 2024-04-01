<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "./dist/pengaturan.php";

$model_2 = $_POST['modelInput'];
$mtl_2 = $_POST['mtlInput'];
$txt_2 = $_POST['txtInput'];
$txt_22 = $_POST['txtInput2'];

$sku = $_POST['code'];
$namaEngine = str_replace(' ', '', $sku);


if (isset($_SESSION['user_003'])) {
   $akses = $_SESSION['stat_003'];


   if ($sku == "") {
        ?>
        <script language=javascript>
            alert("Masih Terdapat inputan Kosong");
            document.location.href = "javascript:history.back()";
        </script>


        <?php

    } else {
        mkdir("object/".$namaEngine);

        $targetfolder = "images/";
        $targetfolder3D = "object/".$namaEngine."/";

        $targetfolder = $targetfolder . basename($_FILES['file']['name']);

        $modelName = basename($_FILES['modelInput']['name']);
        $mtlName = basename($_FILES['mtlInput']['name']);

        $targetfolderOBJ = $targetfolder3D . basename($_FILES['modelInput']['name']);
        $targetfolderMTL = $targetfolder3D . basename($_FILES['mtlInput']['name']);
        $targetfolderTXT = $targetfolder3D . basename($_FILES['txtInput']['name']);
        $targetfolderTXT2 = $targetfolder3D . basename($_FILES['txtInput2']['name']);

        $ok = 1;

        
            if (move_uploaded_file($_FILES['modelInput']['tmp_name'], $targetfolderOBJ) && move_uploaded_file($_FILES['mtlInput']['tmp_name'], $targetfolderMTL) && move_uploaded_file($_FILES['txtInput']['tmp_name'], $targetfolderTXT) && move_uploaded_file($_FILES['txtInput2']['tmp_name'], $targetfolderTXT2)) {

                $filename = fopen("engine/".$namaEngine.".html", "w+");
                //engine
                $namaObj = $modelName;
                $namaMtl = $mtlName;
                $head =  "<html> <head> <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" /> <script src=\"https://aframe.io/releases/1.2.0/aframe.min.js\"></script> <script src=\"https://kertekmedia.com/project/frontfacingcamera.js\"></script> <style> body { margin: 0; } .example-container { overflow: hidden; position: absolute; width: 100%; height: 100%; } </style> </head>";

                $body = "<body> <div class=\"example-container\"> <a-scene mindar-face embedded color-space=\"sRGB\" renderer=\"colorManagement: true, physicallyCorrectLights\" vr-mode-ui=\"enabled: false\" device-orientation-permission-ui=\"enabled: false\" > <a-assets> <a-asset-item id=\"headModel\" src=\"../object/dontdelete/headOccluder.glb\"></a-asset-item> <a-asset-item id=\"kacaMata\" src=\"../object/".$namaEngine."/".$namaObj."\"></a-asset-item> <a-asset-item id=\"kacaMataMTL\" src=\"../object/".$namaEngine."/".$namaMtl."\"></a-asset-item> </a-assets> <a-camera active=\"false\" position=\"0 0 0\" look-controls=\"enabled: false\"></a-camera> <!-- head occluder --> <a-entity mindar-face-target=\"anchorIndex: 168\"> <a-gltf-model mindar-face-occluder position=\"0 -0.3 0.15\" rotation=\"0 0 0\" scale=\"0.065 0.065 0.065\" src=\"#headModel\"></a-gltf-model> </a-entity> <a-entity mindar-face-target=\"anchorIndex: 168\" obj-model=\"obj: #kacaMata; mtl: #kacaMataMTL\"> </a-entity> </a-scene> </div> </body> </html>";
                //engine end
                fwrite($filename, $head.$body);
                fclose($filename);
                // Insert data into mysql 
                //$sql = "INSERT INTO tbl_galeri(id_galeri,judul,tgl_galeri,deskripsi,gambar) 
                //VALUES('$id_galeri','$judul','$tgl_galeri','$deskripsi','$targetfolder')";

                $sql = "UPDATE tbl_produk SET alamat_engine = '$namaEngine', alamat_obj = '$targetfolderOBJ', alamat_mtl = '$targetfolderMTL', alamat_txt = '$targetfolderTXT' WHERE sku = '$sku'";

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
                    echo "Error :" . $sql . "<br>";
                    ?>
                    <script language=javascript>
                        alert("Kegagalan Penyimpanan Data, silahkan hubungi admin");
                        document.location.href = "javascript:history.back()";
                    </script>

                    <?php
                }
            } else {

                ?>
                <script language=javascript>
                    alert("Terjadi Kegagalan ketika menyimpan");
                    document.location.href = "javascript:history.back()";
                </script>

                <?php
            }
        
    }
}else{

}
?>