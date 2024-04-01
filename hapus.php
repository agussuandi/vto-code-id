<?php
include "./dist/bagat.php";
?>

<section class="w3l-main-slider" id="home">
 <div class="container">
  <div class="row justify-content-center align-items-center d-flex vh-100">
   <div class="col-lg-4 mx-auto">
    <div class="osahan-login py-4">
      <?php
      $id = $_GET['code'];

      $sql  = "SELECT * FROM tbl_produk where kode_kacamata='$id'";
      $rest = pg_query($koneksi, $sql);


      if (isset($_SESSION['user_003'])) {
       $akses = $_SESSION['stat_003'];

       while ($data = pg_fetch_assoc($rest)) {
        $gm = $data['alamat_gambar'];
        ?>
        <div class="text-center">
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
      </div>
      <div class="text-center mb-4">
        <span class="seller-name">
         Barcode Kacamata : <?php echo $data['barcode'] ?>
         <br>
         SKU : <?php echo $data['sku'] ?>
         <br>
         Brand : <?php echo $data['brand'] ?>

       </span>
       <div class="">
        <br>
        Anda Yakin ingin menghapus?<br>
        <a href="javascript:history.back()">
         <button type="button" class="btn btn-primary text-uppercase rounded">Tidak</button>
       </a>

       <a href="./dist/query_hapus.php?code=<?php echo $data['kode_kacamata']; ?>">
         <button type="button" class="btn btn-outline-primary text-uppercase rounded">Hapus </button>
       </a>
     </div>
   </div>
 </div>
</div>
</div>
</div>
</div>
</section>
<?php

include "./dist/bagba.php";
}
} else {
  header("Location: index.php", TRUE, 301);
  exit();
}

?>