<?php session_start(); ?>

<?php
include "pengaturan.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Website patra media bandung">
    <meta name="author" content="Partra Media Bandung">
    <title>UAT - VTO Melawai</title>
    <link rel="icon" href="./assets/imgs/logo1.png">
    <!-- font icons -->
    <link rel="stylesheet" href="./assets/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + Steller main styles -->
    <link rel="stylesheet" href="./assets/css/steller.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome-->
    <link href="vendor/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Material Design Icons -->
    <link href="vendor/icons/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css">
    <!-- Slick -->
    <link href="vendor/slick-master/slick/slick.css" rel="stylesheet" type="text/css">
    <!-- Lightgallery -->
    <link href="vendor/lightgallery-master/dist/css/lightgallery.min.css" rel="stylesheet">
    <!-- Select2 CSS -->
    <link href="vendor/select2/css/select2-bootstrap.css" />
    <link href="vendor/select2/css/select2.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<!-- Page navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" data-spy="affix" data-offset-top="0">
    <div class="container" style="background-color: #eb4034">
        <a class="navbar-brand" href="https://project.biovinaherbal.com/uat/"><img src="./assets/imgs/logo3.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
 
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="produkkacamata.php">
                        <button type="submit" class="btn btn-contact">
                            <font color="white"><i class="ti-book pr-1"></i>Produk Kacamata</font>
                        </button>
                    </a>
                </li>
                
                <?php
                if (isset($_SESSION['user_003'])) {

                    if($_SESSION['stat_003'] == "codein")
                    {                                    
                        ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="dashboard.php">
                                <button type="submit" class="btn btn-contact"><font color="white"><i class="ti-write pr-1"></i>Dashboard Admin</font></button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./dist/logout.php">
                                <button type="submit" class="btn btn-contact"><font color="white">Keluar</font></button>
                            </a>
                        </li>
                        <?php
                    }
                    else
                    {
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="./logout.php">
                                <button type="submit" class="btn btn-contact">Keluar</button>
                            </a>
                        </li>
                        <?php
                    }
                } else {
                    ?>
                    <li class="nav-item dropdown">
                    <a class="nav-link" href="tempatuntukmasuk.php">
                        <button type="submit" class="btn btn-contact">
                            <font color="white"><i class="ti-user pr-1"></i>Masuk</font>
                        </button>
                    </a>
                </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>          
</nav>
    <!-- End of page navigation -->