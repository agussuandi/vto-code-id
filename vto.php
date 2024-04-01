<?php
include "dist/bagat.php";

   $kode = $_GET['code'];
   $sql  = "SELECT * FROM tbl_produk where kode_kacamata='$kode'";
   $rest = pg_query($koneksi, $sql);
   $data = pg_fetch_assoc($rest);
?>
      <!-- 404 Page -->
      <section class="py-5 bg-white border-top border-bottom">
         <div class="container">
            <div class="row py-lg-5">
               <div class="col-lg-8 col-md-8 mx-auto text-center">
                  <h1><iframe src="./engine/<?php echo $data['alamat_engine'].'.html';?>" height="480" width="100%" title="glasses"></iframe>
                  </h1>
                  <h1><?php echo $data['sku'] ?></h1>
                  <p class="land"><?php echo $data['brand'] ?></p>
                  <div class="mt-5">
                     <a onclick="history.back()" class="btn btn-success"><i class="mdi mdi-keyboard-backspace"></i>Back</a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End 404 Page -->
      <footer class="bg-white">
         <div class="container">
            
            <div class="copyright">
               <div class="logo">
               </div>
               <p>© Copyright 2023
               </p>
               
            </div>
         </div>
      </footer>
      <?php

include "dist/bagba.php";
?>