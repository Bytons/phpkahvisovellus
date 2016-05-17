<?php
require_once "Kahvi.php";
/**
 * User: antti
 * Date: 4/17/16
 * Time: 5:32 PM
 */

session_start ();

if (isset($_POST["Tallenna"])) {
    $kahvi = new Kahvi  ($_POST["nimi"], $_POST["laji"], $_POST["kuvaus"], $_POST["paahtoaste"], $_POST["tuotantomaa"]);

    $_SESSION ["sumppi"] = $kahvi;
    session_write_close();
    
    $nimiVirhe = $kahvi->checkNimi();
    $lajiVirhe = $kahvi->checkLaji();
    $kuvausVirhe = $kahvi->checkKuvaus();
    $paahtoasteVirhe = $kahvi->checkPaahtoaste();
    $tuotantomaaVirhe = $kahvi->checkTuotantomaa();
    
    if ($nimiVirhe == 0 && lajiVirhe == 0 && kuvausVirhe == 0 && $paahtoasteVirhe == 0 && $tuotantomaaVirhe == 0) {
    
    	try {
    		require_once "kahviPDO.php";
    			
    		$kantaSetit = new kahviPDO ();
    			
    		$id = $kantaSetit->lisaakahvi($kahvi);
    		// Muutetaan istunnossa olevan olion id lisäykseltä saaduksi id:ksi
    		$_SESSION ["sumppi"]->setId ( $id );
    	} catch ( Exception $error ) {
    		session_write_close ();
    		header ( "location: virhe.php?sivu=" . urlencode ( "Lisäys" ) . "&virhe=" . $error->getMessage () );
    		exit ();
    	}
    	
    	
    	session_write_close ();
    	header ( "location: naytaKahvi.php" );
    	exit ();
    }

} elseif (isset ($_POST ["Peruuta"])) {
	header ( "location: index.php" );
	unset ( $_SESSION ["sumppi"] );
	exit();
}else {
	if (isset ( $_SESSION ["sumppi"] )) {
	
		$kahvi = $_SESSION ["sumppi"];
    
    $nimiVirhe = $kahvi->checkNimi();
    $lajiVirhe = $kahvi->checkLaji();
    $kuvausVirhe = $kahvi->checkKuvaus();
    $paahtoasteVirhe = $kahvi->checkPaahtoaste();
    $tuotantomaaVirhe = $kahvi->checkTuotantomaa();
} else {

    $kahvi = new Kahvi();

    $nimiVirhe = 0;
    $lajiVirhe = 0;
    $kuvausVirhe = 0;
    $paahtoasteVirhe = 0;
    $tuotantomaaVirhe = 0;
	}
}

//tällä voin debugata koodia consolille.
function debug($data)
{

    if (is_array($data))
        $output = "<script>console.log( 'Debug Objects: " . implode(',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

    echo $output;
}

 

 



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
            <a class="navbar-brand page-scroll" href="index.php">
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
            <div id="coffeeForm" class="container fluid text-center">
                <h2> Lisää uusi kahvimaku</h2>

                <form class="form-horizontal"  method="POST" action="kahviForm.php">
                    <div class="form-group">
                        <label for="nimi" class="col-sm-2 control-label">Kahvin nimi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="nimi"
                                   placeholder="Kirjoita lisättävän kahvin nimi"
                                   value="<?php print(htmlspecialchars($kahvi->getNimi(), ENT_QUOTES, "UTF-8")); ?>">
                            <?php print "<p class='text-danger'>" . $kahvi->getErrors($nimiVirhe) . "</p>"; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kahviLaji" class="col-sm-2 control-label">Kahvin Laji</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kahvilaji" name="laji"
                                   placeholder="Nimeä Kahvin lajike:Esim Arabica, Robusta..."
                                   value="<?php print(htmlspecialchars($kahvi->getLaji(), ENT_QUOTES, "UTF-8")); ?>">
                            <?php print "<p class='text-danger'>" . $kahvi->getErrors($lajiVirhe) . "</p>"; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kuvaus" class="col-sm-2 control-label">Kahvin kuvaus:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="4" name="kuvaus"
                                      value="<?php print(htmlspecialchars($kahvi->getKuvaus(), ENT_QUOTES, "UTF-8")); ?>"></textarea>
                            <?php print "<p class='text-danger'>" . $kahvi->getErrors($kuvausVirhe) . "</p>"; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="paahtoaste" class="col-sm-2 control-label">Paahtoaste</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="paahtoaste" name="paahtoaste"
                                   placeholder="Kahvin paahtoaste: Tumma/kevyt/vaalea"
                                   value="<?php print(htmlspecialchars($kahvi->getPaahtoaste(), ENT_QUOTES, "UTF-8")); ?>">
                            <?php print "<p class='text-danger'>" . $kahvi->getErrors($paahtoasteVirhe) . "</p>"; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tuotantomaa" class="col-sm-2 control-label">Kahvin tuotantomaa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tuotantomaa" name="tuotantomaa"
                                   placeholder="Tuotantomaa: Missä kahvi on tehty"
                                   value="<?php print(htmlspecialchars($kahvi->getTuotantomaa(), ENT_QUOTES, "UTF-8")); ?>">
                            <?php print "<p class='text-danger'>" . $kahvi->getErrors($tuotantomaaVirhe) . "</p>"; ?>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <input name="Tallenna" type="submit" value="Tallenna"
                                   class="btn btn-success pull-left">
                            <input name="Peruuta" type="submit" value="Peruuta"
                                   class="btn btn-danger pull-right">
                        </div>
                    </div>

                </form>


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