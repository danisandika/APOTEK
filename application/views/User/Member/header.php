<!doctype html>
<?php

if($this->session->userdata('user_role') != 'User')
{
  echo "<script language='javascript'>alert('Member');</script>";
  redirect(base_url('CFLogin'));
}
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mustika Farma | <?php echo $title ?></title>
    <link rel="icon" href="<?php echo base_url('medico/img/favicon.png');?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('medico/css/bootstrap.min.css'); ?>">
    <!-- animate CSS -->
    <link rel="stylesheet" href="<?php echo base_url('medico/css/animate.css'); ?>">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="<?php echo base_url('medico/css/owl.carousel.min.css'); ?>">
    <!-- themify CSS -->
    <link rel="stylesheet" href="<?php echo base_url('medico/css/themify-icons.css'); ?>">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="<?php echo base_url('medico/css/flaticon.css'); ?>">
    <!-- magnific popup CSS -->
    <link rel="stylesheet" href="<?php echo base_url('medico/css/magnific-popup.css'); ?>">
    <!-- nice select CSS -->
    <link rel="stylesheet" href="<?php echo base_url('medico/css/nice-select.css'); ?>">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="<?php echo base_url('medico/css/slick.css'); ?>">
    <!-- style CSS -->
    <link rel="stylesheet" href="<?php echo base_url('medico/css/style.css'); ?>">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('wizard/css/roboto-font.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('wizard/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')?>">
    <!-- datepicker -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('wizard/css/jquery-ui.min.css')?>">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="<?php echo base_url('wizard/css/style.css')?>"/>
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="#"> <img src="<?php echo base_url('medico/img/favicon.png'); ?>" alt="logo"> </a>
                        <h3>Mustika Farma</h3>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-center"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="<?php echo site_url('CFDashboard/index')?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('CFBooking/index')?>">Obat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('CFBooking/view_Info')?>">Artikel</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('CFBooking/index2')?>">Transaksi Saya</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Profil
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?php echo site_url('CFBooking/editUser/'.$this->session->userdata('user_userID')) ?>">Edit Profil</a>
                                        <a class="dropdown-item" href="<?php echo site_url('CFLogin/logout')?>">Log Out</a>

                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('CFBooking/daftar_keranjang')?>"><span class="ti-shopping-cart">&nbsp;(<?php echo $keranjang ?>)</span></a>
                                </li>

                            </ul>
                        </div>

                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->
