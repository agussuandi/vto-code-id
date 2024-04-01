
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
                            <a href="form-input.php" class="active-menu"><i class="fa fa-code "></i>Tambah Data</a>
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
                    <h1 class="page-head-line">TAMBAH DATA</h1>
                    <h1 class="page-subhead-line">Pastikan data yang anda masukkan telah sesuai sebelum melakukan simpan.</h1>

                </div>
                <div class="container"><br><br><br><br>
                    <div class="py-5 justify-content-center align-items-center">
                        <form id="penelusuran_form" action="./query_input.php" method="POST" enctype="multipart/form-data">

                            <div class="form-group col-md-10 mx-auto">
                                <div class="position-relative icon-form-control">
                                    <p align="left">Barcode</p>
                                    <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Silahkan Masukkan Kode Barcode Kacamata" required="" value="" required>
                                </div><br>

                                <div class="position-relative icon-form-control">
                                    <p align="left">SKU</p>
                                    <input type="text" class="form-control" name="sku" id="sku" placeholder="Silahkan Masukkan SKU Kacamata" required="" value="" required>
                                </div><br>

                                <div class="position-relative icon-form-control">
                                    <p align="left">Brand</p>
                                    <input type="text" class="form-control" name="brand" id="brand" placeholder="Silahkan Masukkan Brand Kacamata" required="" value="" required>
                                </div><br>

                                <div class="position-relative icon-form-control">

                                    <p align="left">Unggah Gambar Kacamata</p>

                                    <input type="file" class="form-control" name="file" accept="image/png, image/jpeg" required>
                                    <p></p>
                                </div><br>
                                
                                <button type="submit" class="btn btn-primary rounded btn-block text-uppercase">Simpan Data</button></div>
                            </form></div>
                        </div>

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


    <!-- /. WRAPPER  -->
