<!--
	# I, CHIRAG BARANDA, student number 000759867, certify that all code submitted is my own work;
		#that I have not copied it from any other source.
		#I also certify that I have not allowed my work to be copied by others.
	#Author: CHIRAG BARANDA, 000759867
	#Date : 1st October, 2018
	#purpose : This php file contains the logic to validate the user input data and behave accordingly
	i           if the datavalidation is sucessfull then printing the validated datato console and if the not sucessfull then taking user back to the main page for new data
    #tools used : https://regexr.com/
 -->

<?php
session_start();

//getting an input from the textbox (form)and validate it using the regular expression with proper syntax

//Validation string for the the store name
$Storenamepattern = '/((^[A-Z][a-z\s]+|[0-9-\s]+)(\s[A-Z|a-z]+|[0-9-]+)+)$/';
$Storenamestring = rtrim(filter_input(INPUT_GET, "storename", FILTER_SANITIZE_SPECIAL_CHARS));

//validation string for the street address
$Storeaddresspattern = '/^[0-9]+\s[A-Z][a-z]+\s(st.|blvd.|ave.|rd.)(\s)?(([N|n]|[E|e]|[W|w]|[S|s])?)*$/';
$Storeaddressstring = rtrim(filter_input(INPUT_GET, "storeaddress", FILTER_SANITIZE_SPECIAL_CHARS));


//valdiation string for the name of the city
$citypattern = '/^[A-Z][a-z]+$/';
$citystring = rtrim(filter_input(INPUT_GET, "city", FILTER_SANITIZE_SPECIAL_CHARS));


//validation string for the the postal cide
$Postalcodepattern = '/^[A-Z][0-9][A-Z]\s[0-9][A-Z][0-9]$/';
$Postalcodestring = rtrim(filter_input(INPUT_GET, "postalcode", FILTER_SANITIZE_SPECIAL_CHARS));


//validating the name of the store
if (preg_match($Storenamepattern, $Storenamestring))
{   //if validation successfull save the store name in session
    //echo "Store Name". $Storenamestring ." is LEGAL<br>";
    if(!isset($_SESSION['storename']))
    {
        $_SESSION["storename"] = $Storenamestring;
    }
}
else
{
    //echo "Store Name". $Storenamestring." - it's <b>not</b> LEGAL<br>";
}
//validating the street
if (preg_match($Storeaddresspattern , $Storeaddressstring))
{   //if validation successfull save the store address in session
    //echo "Store Address".$Storeaddressstring." is LEGAL<br>";
    if(!isset($_SESSION['storeaddress']))
    {
        $_SESSION["storeaddress"] = $Storeaddressstring;
    }
}
else
{
    //echo "Store Address".$Storeaddressstring." it's <b>not</b> LEGAL<br>";
}
//validating city name
if (preg_match($citypattern , $citystring))
{   //if validation successfull save the store city in session
   // echo "City Name".$citystring." is LEGAL<br>";
    if(!isset($_SESSION['storecity']))
    {
        $_SESSION["storecity"] = $citystring;
    }
}
else
{
    //echo "City Name".$citystring." it's <b>not</b> LEGAL<br>";
}
//validating the postal code
if (preg_match($Postalcodepattern, $Postalcodestring))
{   //if validation successfull save the store name in session
    //echo "Postal code".$Postalcodestring." is LEGAL<br>";
    if(!isset($_SESSION['storepostalcode']))
    {
        $_SESSION["storepostalcode"] = $Postalcodestring;
    }
}
else
{
    //echo "Postal code".$Postalcodestring." it's <b>not</b> LEGAL<br>";
}

?>


<!DOCTYPE html>
<html lang="en" onload="window.history.forward()">
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
        <div class="col-lg-6 col-md-6 content-item tm-black-translucent-bg tm-logo-box"
             style="position: absolute ; left:30%">
            <h3 class="text-uppercase"><u>My Store details </u></h3>
                <br>
                <br>
                <?php

                //validating the Data, if the data is

                if (preg_match($Storenamepattern, $Storenamestring) && preg_match($Storeaddresspattern, $Storeaddressstring) && preg_match($Storeaddresspattern, $Storeaddressstring) && preg_match($Postalcodepattern, $Postalcodestring))
                {   //if all data validate successfully then print all data on console to the user and  ask user for next page

                    //echo 'INSIDE THE TRUE SECTION!!';
                    echo '<script language="javascript">';
                    echo 'alert("Now You are Redirecting to another page")'; //alerting the user about the redirection of the page
                    echo '</script> <br/>';

                    //printing data on console
                    echo "<h4>Data validation Successful!!! </h4>";
                    echo "<p> Store Name: $Storenamestring <br/>";
                    echo "Store Address: $Storeaddressstring <br/>";
                    echo "City Name: $citystring<br/>";
                    echo "Postal Code: $Postalcodestring<br/> </p>";
                    //redirecting url
                    echo "<a href= 'ShoppingListPage/ShoppingListPage.php'> GO TO SHOPPING CART </a>";
                }
                else
                {
                    //alerting user about the data validation unsuccessful
                    echo '<script language="javascript">';
                    echo "alert('Due to some error you cannot go to the next page!!!  GO BACK AND TRY AGAIN!!!')";
                    echo '</script>';
                    //link to main page
                    echo "<a href= '../index.html'> GO BACK TO MAIN PAGE </a>";
                }


                ?>


        </div>

    </section>


</div>

<!--<div class="text-center footer">
	<div class="container">
		Copyright &copy; <span class="tm-current-year">2017</span> Company 
        
        | Design: <a href="http://www.google.com/+templatemo" target="_parent">templatemo</a>
    </div>
</div> -->

<!--<div class="text-center footer">-->
<!--    <div class="container">-->
<!--        Programmed By : <span class="tm-current-year">CHIRAG BARANDA</span>-->
<!---->
<!--        | Design: <a href="http://www.google.com/+templatemo" target="_parent">templatemo</a>-->
<!--    </div>-->
<!--</div>-->

</body>
</html>