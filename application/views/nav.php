<!DOCTYPE html>
<html class="menu">
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $metacontent; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/nav.css" />
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
    </style>
    <title><?php echo $title; ?></title>
</head>

<body>
    <nav class="main-menu">
        <div>
            <img class="logo" src="<?php echo $base_url; ?>assets/images/coronavirus.png" alt="coronavirus">
        </div>
        <div class="scrollbar" id="style-1">
            <ul>
                <li class="darkerlishadow">
                    <a href="<?php echo $base_url; ?>information-covid-19-0.html">
                        <i class="fa fa-info-circle fa-lg"></i>
                        <h4 class="nav-text">Information</h4>
                    </a>
                </li>

                <li class="darkerli">
                    <a href="<?php echo $base_url; ?>statistique-covid-19-0.html">
                        <i class="fa fa-line-chart fa-lg"></i>
                        <h4 class="nav-text">Statistique</h4>
                    </a>
                </li>

                <li class="darkerli">
                    <a href="<?php echo $base_url; ?>actualite-covid-19-0.html">
                        <i class="fa fa-leanpub fa-lg"></i>
                        <h4 class="nav-text">Actualite</h4>
                    </a>
                </li>
            </ul>
            <ul class="logout">
                <li>
                    <a href="<?php echo $base_url; ?>deconnection.logout">
                        <i class="fa fa-power-off fa-lg"></i>
                        <h4 class="nav-text">
                            Deconnection
                        </h4>
                    </a>
                </li>
            </ul>
        </div>
    </nav>