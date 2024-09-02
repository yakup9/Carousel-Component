<?php
include_once("public/lib/Carouselfonk.php");
$sinif = new CarouselTema;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title><?php echo $sinif->title; ?></title>
    <meta name="title" content="<?php echo $sinif->metatitle; ?>"/>
    <meta name="description" content="<?php echo $sinif->metadesc; ?>"/>
    <meta name="keywords" content="<?php echo $sinif->metakey; ?>"/>
    <meta name="author" content="<?php echo $sinif->metaauthor; ?>"/>
    <meta name="owner" content="<?php echo $sinif->metaowner; ?>"/>
    <meta name="copyright" content="<?php echo $sinif->metacopy; ?>"/>

    <!-- DAHİLLER -->
    <link href="lib/bootstrap.css" rel="stylesheet">
    <link href="css/tema3.css" rel="stylesheet">
    <link href="css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="lib/jquery.js"></script>
    <script src="lib/bootstrap.js"></script>


    <script>

        $(document).ready(function (e) {

            $("#gonderbtn").click(function () {

                $.ajax({
                    type: "POST",
                    url: 'public/lib/mail/gonder.php',
                    data: $('#mailform').serialize(),
                    success: function (donen) {
                        $('#mailform').trigger("reset");
                        $('#formtutucu').fadeOut(500);
                        $('#mesajsonuc').html(donen);

                    },


                });
            });


        });


    </script>


</head>

<body>

<!--  navbar-->

<nav class="navbar fixed-top navbar-expand-lg  fixed-top navbararkaplan">
    <div class="container">
        <a class="navbar-brand navlink" href="index"><?php echo $sinif->logoyazisi; ?></a>

        <button class="navbar-toggler navbar-toggler-right navbar-dark" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link navlink" href="index">Anasayfa</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link navlink" href="hakkimizda.html">Hakkımızda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navlink" href="hizmetlerimiz.html">Hizmetlerimiz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navlink" href="aracfilomuz.html">Araçlarımız</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navlink" href="musterilerimiz.html">Müşterilerimiz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navlink" href="iletisim.html">İletişim</a>
                </li>


            </ul>
        </div>
    </div>
</nav>
  