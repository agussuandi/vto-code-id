<?php
//jika dibutuhkan untuk kolom pencarian
if (empty($_POST['sku'])) {
   $sku = "";
}else{
   $sku = $_POST['sku'];
}

if (empty($_POST['brand'])) {
   $brand = "0";
}else{
   $brand = $_POST['brand'];
}
$judul_kategori = 0;
?>


          <li>
            <a href="dashboard.php"><i class="fa fa-dashboard "></i>Dashboard</a>
          </li>                    
          <li>
            <a href="#" class="active-menu-top"><i class="fa fa-bicycle "></i>Produk <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">

             <li>
              <a href="form-product.php" class="active-menu"><i class="fa fa-desktop "></i>Katalog Produk </a>
            </li>
            <li>
              <a href="form-input.php" ><i class="fa fa-code "></i>Tambah Data</a>
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
          <h1 class="page-head-line">Katalog Produk</h1>
          <h1 class="page-subhead-line">Daftar produk yang dimiliki. </h1>

        </div>
      </div>
      <!-- /. ROW  -->
      
      <!--    Hover Rows  -->
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr >
                  <th>#</th>
                  <th>Barcode</th>
                  <th>SKU</th>
                  <th>Brand</th>
                  <th></th>
                  <th>VTO</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php

                  //mencoba pagination
                     $batas = 20;
                     $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                     $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

                     $previous = $halaman - 1;
                     $next = $halaman + 1;
                     $number = 0;

                  //Percabangan dari kategori yang dipilih (belum ada kolom pencarian)
                     if ($judul_kategori ==1 ) {
                        $sql  = pg_query($koneksi, "SELECT * FROM tbl_produk where sku LIKE '%sku%' ORDER BY sku DESC limit $halaman_awal offset $batas");
                     }elseif ($judul_kategori == 2) {
                        $sql  = pg_query($koneksi, "SELECT * FROM tbl_produk where brand LIKE '$brand%' ORDER BY sku DESC limit $halaman_awal offset $batas");
                     }else{
                        $sql  = pg_query($koneksi, "SELECT * FROM tbl_produk ORDER BY sku DESC");
                     }
               
                     $jumlah_data = pg_num_rows($sql);
                     $total_halaman = ceil($jumlah_data / $batas);

                     $nomor = $halaman_awal+1;
                 while ($data = pg_fetch_assoc($sql)) {
                        $gm = $data['alamat_gambar'];
                        ?>
                <tr>
                  <td><?php echo $number=$number+1 ?></td>
                  <td><?php echo $data['barcode'] ?></td>
                  <td><?php echo $data['sku'] ?></td>
                  <td><?php echo $data['brand'] ?></td>
                  <td>
                    <a href="detail.php?code=<?php echo $data['kode_kacamata']; ?>" target="_BLANK"><button type="button" class="btn btn-sm btn-success">Detail</button></a>
                  </td>
                  <td>
                    <?php
                      if (!empty($data['alamat_engine'])) {
                       ?> 
                    <a href="vto.php?code=<?php echo $data['kode_kacamata']; ?>" target="_BLANK"><button type="button" class="btn btn-sm btn-info">VTO</button></a> | 
                    <a href="form-input-object.php?code=<?php echo $data['sku']; ?>"><button type="button" class="btn btn-sm btn-warning">Ubah File</button></a>
                    <?php
                  }else{
                    ?>
                    - | <a href="form-input-object.php?code=<?php echo $data['sku']; ?>"><button type="button" class="btn btn-sm btn-warning">Unggah File</button></a>
                    <?php
                  }
                    ?>
                  </td>
                  <td>
                    <a href="./form-update.php?code=<?php echo $data['kode_kacamata'] ?>"><button type="button" class="btn btn-sm btn-warning">Ubah</button></a>
                    | 
                    <a href="./hapus.php?code=<?php echo $data['kode_kacamata'] ?>"><button type="button" class="btn btn-sm btn-danger">Hapus</button></a>
                  </td>
                </tr>
                <?php
              }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- End  Hover Rows  -->
    </div>
  </div>

  <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
