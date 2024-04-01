<?php
include "./dist/bagat.php";
?>
<?php
$kode = $_GET['code'];

$sql  = "SELECT * FROM tbl_produk where kode_kacamata='$kode'";
$rest = pg_query($koneksi, $sql);
$data = pg_fetch_assoc($rest);

$gm = $data['alamat_gambar'];
?>
<br><br><br>
    <div class="main-page py-5 col-lg-10 mx-auto">
        <div class="container">
            <div class="row py-lg-12">
                <div class="col-lg-8 left">
                   <div class="slider mt-4">
                    <div id="aniimated-thumbnials" >
                        <?php
                        if ($gm == "") {
                            ?>
                            <a href="">
                                <img class="img-fluid" src="gambar/gm.JPG" />
                            </a>
                            <br>
                            <?php
                        } else {
                            ?>

                            <a href="<?php echo $data['alamat_gambar'];?>">
                                <img class="img-fluid" src="<?php echo $data['alamat_gambar']; ?>" />
                            </a>
                            <br>
                            <?php
                        }
                        ?>

                    </div>
                    <br>
                    <div id="description" class="description">
                        <h3>Detail</h3>

                    </div>
                    <ul class="metadata">
                        <li class="metadata-attribute">
                            <p>SKU</p>
                            <ul>
                                <li><?php echo $data['sku']; ?></li>
                            </ul>
                        </li>
                        <li class="metadata-attribute">
                            <p>Brand</p>
                            <ul>
                               <li><?php echo $data['brand']; ?></li>
                           </ul>
                       </li>
                   </ul>
      </div>
  </div>
    <div class="col-lg-4 right">
        <div class="contact-seller-wrapper">
            <div class="">
            </div><br>
            <?php if (!empty($data['alamat_engine'])){ ?>
                 <a class="btn btn-primary btn-block rounded" href="vto.php?code=<?php echo $data['kode_kacamata']; ?>">Virtual Try On</a>
            <?php }else{ ?>
                <a class="btn btn-secondary btn-block rounded" href="#">VTO Tidak Tersedia</a>
       
            <?php } ?>
        </div>
    </div>
</div>
</div>
</div>
</body>
<?php
include "./dist/bagba.php";
?>