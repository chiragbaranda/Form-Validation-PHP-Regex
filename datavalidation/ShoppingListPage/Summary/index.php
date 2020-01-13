<!--
	# I, CHIRAG BARANDA, student number 000759867, certify that all code submitted is my own work;
		#that I have not copied it from any other source.
		#I also certify that I have not allowed my work to be copied by others.
	#Author: CHIRAG BARANDA, 000759867
	#Date : 1st October, 2018
	#purpose : This page will show the summary of the both data, Store data and the shopping cart details
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="Font-Awesome-4.7/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/templatemo-style.css">

    <title>Catalyst HTML CSS Template</title>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>


    <!--
    Catalyst Template
    http://www.templatemo.com/tm-499-catalyst
    -->
</head>

<body>

<div class="container">
    <section class="col-md-12 content" id="home">
        <div class="col-lg-6 col-md-6 content-item tm-black-translucent-bg tm-logo-box">
            <h3 class="text-uppercase"><u>Store details </u></h3>
            <br>
            <br>
            <?php
            //starting the session
            session_start();
            //printng the calue of the sesseion variables on the console
            if (isset($_SESSION["storename"]))
                echo "<p>Store Name: " . $_SESSION["storename"];
            echo "<br/>";
            if (isset($_SESSION["storeaddress"]))
                echo "Store Address: " . $_SESSION["storeaddress"];
            echo "<br/>";
            if (isset($_SESSION["storecity"]))
                echo "City Name: " . $_SESSION["storecity"];
            echo "<br/>";
            if (isset($_SESSION["storepostalcode"]))
                echo "Postal Code:  " . $_SESSION["storepostalcode"] . "</p>";
            ?>

            
        </div>
        <div class="col-lg-6 col-md-6 content-item content-item-1 background tm-white-translucent-bg">
            <h2 class="main-title text-center dark-blue-text"> My Shopping List </h2>
            <?php
                //session array printing
            echo "<ol>";
            while (list ($key, $val) = each($_SESSION['shoppingcart']))	
		{
                echo "<li> $val </li>";
            	}
            echo "</ol>";

            ?>

        </div>
    </section>

	<form method="get" action="thankyou.html">
                <button class="btn waves-effect waves-light" onclick="<?php session_destroy(); ?>" type="submit" name="EXIT" style="margin-left:525px"> EXIT
                    <i class="material-icons right"></i>
                </button>
            </form>

</div>

<!--<div class="text-center footer">
	<div class="container">
		Copyright &copy; <span class="tm-current-year">2017</span> Company 
        
        | Design: <a href="http://www.google.com/+templatemo" target="_parent">templatemo</a>
    </div>
</div> -->

<
<div class="text-center footer">
    <div class="container">
        Programmed By : <span class="tm-current-year">CHIRAG BARANDA</span>

        | Design: <a href="http://www.google.com/+templatemo" target="_parent">templatemo</a>
    </div>
</div>

</body>
</html>