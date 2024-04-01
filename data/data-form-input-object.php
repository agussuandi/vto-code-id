<?php

if (isset($_SESSION['user_003'])) {
    $akses = $_SESSION['stat_003'];
    
    $sku = $_GET['code'];

    $sql  = "SELECT sku, kode_kacamata FROM tbl_produk where sku='$sku'";
    $rest = pg_query($koneksi, $sql);
    $data = pg_fetch_assoc($rest);
    $code = $data['kode_kacamata'];
    ?>
    <li>
        <a href="dashboard.php"><i class="fa fa-dashboard "></i>Dashboard</a>
    </li>                    
    <li>
        <a href="#" class="active-menu-top"><i class="fa fa-bicycle "></i>Produk <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">

         <li>
            <a href="form-product.php"><i class="fa fa-desktop "></i>Katalog Produk </a>
        </li>
        <li>
            <a href="#" class="active-menu"><i class="fa fa-code "></i>Tambah Data 3D</a>
        </li>


    </ul>
</li>
</ul>

</div>

</nav>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">DATA OBJEK 3D VTO<br>SKU:
                    <?php
                    echo $data['sku'];
                    ?>                    
                </h1>
                <h1 class="page-subhead-line">Pastikan data yang anda masukkan telah sesuai sebelum melakukan simpan.</h1>

            </div>
            <div class="container"><br><br><br><br>
                <div class="py-5 justify-content-center align-items-center">
                    <form id="penelusuran_form" action="./query_input_object.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group col-md-10 mx-auto">
                            <input type="hidden"  name="code" id="code" value="<?php echo $sku; ?>">
                            <h1 class="page-subhead-line">Input Data 3D VTO</h1>
                            <div class="position-relative icon-form-control">

                                <p align="left">Unggah Objek OBJ Kacamata</p>

                                <input type="file" class="form-control" name="modelInput" accept=".obj" required>
                                <p></p>
                            </div><br>
                            <div class="position-relative icon-form-control">

                                <p align="left">Unggah MTL Kacamata</p>

                                <input type="file" class="form-control" name="mtlInput" accept=".mtl" required>
                                <p></p>
                            </div><br>
                            <div class="position-relative icon-form-control">

                                <p align="left">Unggah Texture Kacamata - 1</p>

                                <input type="file" class="form-control" name="txtInput" accept="image/png, image/jpeg" required>
                                <p></p>
                            </div><br>
                            <div class="position-relative icon-form-control">

                                <p align="left">Unggah Texture Kacamata - 2</p>

                                <input type="file" class="form-control" name="txtInput2" accept="image/png, image/jpeg" required>
                                <p></p>
                            </div><br>
                            <button type="submit" class="btn btn-primary rounded btn-block text-uppercase">Simpan Data</button></div>
                        </form></div>
                    </div>
                    <div class="container col-md-10 " align="right"><a href="javascript:history.back()">Membatalkan</a></div>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
    </div>
    <!-- /. ROW  -->

    <!--/.Chat Panel End-->
</div>
<!-- /. ROW  -->
<?php
}
?>

<!-- /. WRAPPER  -->
