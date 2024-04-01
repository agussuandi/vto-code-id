<?php
include "dist/bagat.php";
?>

            <div class="row justify-content-center align-items-center d-flex vh-100">
               <div class="col-lg-4 mx-auto">
                  <div class="osahan-login py-4">
                     <div class="text-center mb-4">
                        <a href="index.html"><img src="./assets/imgs/logo3.png" alt=""></a>
                        <h5 class="font-weight-bold mt-3">Selamat Datang</h5>
                        <p class="text-muted">Silahkan masukkan Username dan Password anda</p>
                     </div>
                     <form action="./dist/akses_login.php" method="POST">
                        <div class="form-group">
                           <label class="mb-1">Username</label>
                           <div class="position-relative icon-form-control">
                              <i class="mdi mdi-account position-absolute"></i>
                              <input type="username" class="form-control" name="username_001">
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="mb-1">Password</label>
                           <div class="position-relative icon-form-control">
                              <i class="mdi mdi-key-variant position-absolute"></i>
                              <input type="password" class="form-control" name="password_001">
                           </div>
                        </div>
                        
                        <button class="btn btn-primary rounded btn-block text-uppercase" type="submit"> Masuk </button>
                        
                     </form>
                  </div>
               </div>
            </div>
<?php
include "dist/bagba.php";
?>
