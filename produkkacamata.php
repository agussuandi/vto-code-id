<?php
include "./dist/bagat.php";

if (empty($_POST['kolom_pencarian'])) {
   $kolom_pencarian = "";
}else{
   $kolom_pencarian = $_POST['kolom_pencarian'];
}

if (empty($_POST['nama_kategori'])) {
   $judul_kategori = "0";
}else{
   $judul_kategori = $_POST['nama_kategori'];
}
?>
<section class="py-5 homepage-search-block text-center homepage-search-block-2 bg-dark position-relative">
   <div class="container">
      <div class="row py-lg-5">
         <div class="col-lg-8 mx-auto">
            <div class="homepage-search-title">
               <h2 class="mb-3 text-shadow text-white font-weight-bold ">&nbsp</h2>
               <h5 class="mb-5 text-shadow text-white-50 font-weight-normal">Cari kacamata terbaik Anda disini.
               </h5>
            </div>
            <div class="homepage-search-form">
               <form class="form-noborder" id="penelusuran_form" action="produkkacamata.php" method="POST">
                  <div class="form-row">
                     <div class="col-lg-3 col-md-3 col-sm-12 form-group">
                        <div class="location-dropdown text-left">
                           <i class="icofont-location-arrow"></i>
                           <select name="nama_kategori" class="custom-select form-control border-0 shadow-sm form-control-lg">
                              <option value="0"> Semua </option>
                              <option value="1"> SKU </option>
                              <option value="2"> Brand </option>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-7 col-md-7 col-sm-12 form-group">
                        <input type="text" placeholder="Kolom Pencarian.."
                        class="form-control" name="kolom_pencarian">
                     </div>
                     <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                        <button type="submit"
                        class="btn btn-danger form-control border-0 shadow-sm form-control-lg"><i
                        class="ti ti-search"></i></button>
                     </div>
                  </div>
               </form>
            </div>
            <h6 class="mb-0 mt-1 text-shadow text-center text-white-50 font-weight-normal">pilih kategori pencarian sebelum menekan tombol cari.
            </div>
         </div>
      </div>
   </section>

   <section class="footer-white">
      <div class="main-page best-selling">
         <div class="view_slider recommended pt-5">
            <div class="container">
               <div class="row">
                  <?php                  
                  //mencoba pagination
                  $batas = 20;
                  $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                  $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

                  $previous = $halaman - 1;
                  $next = $halaman + 1;

                     //Percabangan dari kategori yang dipilih
                  if ($judul_kategori == "1" ) {
                     $sql  = pg_query($koneksi, "SELECT * FROM tbl_produk where sku LIKE '%$kolom_pencarian%' ORDER BY sku DESC OFFSET $halaman_awal limit $batas");
                  }elseif ($judul_kategori == "2") {
                     $sql  = pg_query($koneksi, "SELECT * FROM tbl_produk where brand LIKE '%$kolom_pencarian%' ORDER BY sku DESC OFFSET $halaman_awal limit $batas");
                  }else{
                     $sql  = pg_query($koneksi, "SELECT * FROM tbl_produk where sku LIKE '%$kolom_pencarian%' or brand LIKE'%$kolom_pencarian%' ORDER BY sku DESC OFFSET $halaman_awal limit $batas");
                  }
              // $sql  = "SELECT * FROM tbl_produk where judul LIKE '%$judul_buku%' or penulis LIKE'%$judul_buku%'";
                           //$rest = mysqli_query($koneksi, $sql);
                  //pagination lanjutan
                  $jumlah_data = pg_num_rows($sql);
                  $total_halaman = ceil($jumlah_data / $batas);
                           //$data_produk = mysqli_query($koneksi,"select * from tbl_produk limit $halaman_awal, $batas");
                  $nomor = $halaman_awal+1;

                  while ($data = pg_fetch_assoc($sql)) {
                     $gm = $data['alamat_gambar'];
                     ?>
                     <div class="col-md-3">
                        <a href="detail.php?code=<?php echo $data['kode_kacamata']; ?>">
                           <?php
                           if ($gm == "") {
                              ?>
                              <img src="gambar/gm.JPG" class="col-sm-6 img-thumbnail" />
                              <br>

                              <?php
                           } else {
                              ?>
                              <img class="img-fluid" src="<?php echo $data['alamat_gambar']; ?>" />
                              <?php
                           }
                           ?>
                        </a>
                        <div class="inner-slider">
                           <div class="inner-wrapper">
                              <div class="d-flex align-items-center">
                                 <span class="seller-name">
                                    <a href="#"><?php echo $data['sku'] ?></a>
                                    <span class="level hint--top level-one-seller">
                                       <?php echo $data['brand'] ?>
                                    </span>
                                 </span>
                              </div>
                              <div class="buttons-wrapper">
                                 <br>
                                 <a href="detail.php?code=<?php echo $data['kode_kacamata'] ?>">
                                    <button type="button" class="btn btn-warning btn-block rounded text-uppercase">Detail</button>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>

                  <?php
                  }
                  ?>

               </div>
            </div>
         </div>
      </div>
   </section>
   <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
     <li class="page-item">
       <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>
         <i class="ti-angle-double-left"></i>
      </a>

   </li>
   <?php 
   for($x=1;$x<=$total_halaman;$x++){
    ?> 
    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
    <?php
 }
 ?>  
 <li class="page-item">
    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>><i class="ti-angle-double-right"></i></a>
 </li>
</ul>
</nav>
<?php
include "./dist/bagba.php";
?>