<?php
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kahvisovellus </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="auto-tach.ico" type="image/x-icon">
    <link rel="icon" href="auto-tach.ico" type="image/x-icon"> <!-- Icon for address bar -->
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    <link rel="icon" href="img/logo.ico" type="image/x-icon">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">
                <i class="fa fa-play-circle"></i> <span class="light">Haaga-helian Kahviklubi</span>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="kahviForm.php">Lisää kahvi</a>
                </li>
                <li>
                    <a class="page-scroll" href="listaaKahvit.php">Listaa kahvit</a>
                </li>
                <li>
                    <a class="page-scroll" href="asetukset.php">Asetukset</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Intro Header -->
<header class="intro">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                   <form action="index.php">
                   <h2>Anna käyttäjänimi</h2>
                   <input type="text" class="form-control" id="kayttajanimi" name="kayttajanimi" autofocus>
                   <input type="submit" class="btn btn-success" value="Aseta käyttäjäsi" name="aseta_kayttaja">
                   </form>
                   
                   
                    <p class="intro-text">Haaga-Helian<br> Kahviklubi</p>
                </div>
            </div>
        </div>
    </div>
</header>


<!-- Footer -->
<footer>
    <div class="container text-center">
        <p>Antti Häkkinen &copy; 2016</p>
        <br>
        <div class="btn-group text-center">


            <a href="https://www.facebook.com/anttihakkine" target="_blank"> <img src="img/fb.png"
                                                                                  class="img-circle iconology "
                                                                                  width="4%"></a>


            <a href="https://github.com/Bytons" target="_blank"><img src="img/github.png" class="img-circle iconology "
                                                                     width="4%"></a>

s

            <a href="https://www.linkedin.com/in/antti-h%C3%A4kkinen-75b26a91" target="_blank"><img src="img/link.png"
                                                                                                    class="img-circle iconology"
                                                                                                    width="4%"></a>

        </div> <!-- btn group ends -->

    </div>
</footer>


<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="js/jquery.easing.min.js"></script>


<!-- Custom Theme JavaScript -->
<script src="js/grayscale.js"></script>

<script>
    (function pulse() {
        $(".pulse").delay(220).animate({'opacity': 1}).delay(500).animate({'opacity': 0}, pulse);
    })();
</script>


</body>

</html>