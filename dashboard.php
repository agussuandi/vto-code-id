﻿<?php
include "./dist/bagat-ad.php";

if (isset($_SESSION['user_003'])) {
    include "./data/data-dashboard.php";
}else{
    header('Refresh: 0; URL=./index.php');
}
include "./dist/bagba-ad.php";
?>