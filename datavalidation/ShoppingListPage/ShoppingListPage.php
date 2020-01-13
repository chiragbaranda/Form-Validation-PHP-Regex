<!--
	# I, CHIRAG BARANDA, student number 000759867, certify that all code submitted is my own work;
		#that I have not copied it from any other source.
		#I also certify that I have not allowed my work to be copied by others.
	#Author: CHIRAG BARANDA, 000759867
	#Date : 1st October, 2018
	#purpose : This php file contains the logic for adding the data to to the cart, before adding the data to the cart it will check for the data redundancy
	    and if the detail already exist in the array, it will not add the data to array
	    instead give the error message to the user to add something which is not inserted in cart
 -->

<?php

// check/init session
session_start();

//setting the variable  value
$flag=False;
$success = "";
//checking if the session of shopping cart is available or not
if(!isset($_SESSION['shoppingcart'])) 
{ //creating the session array of the shopping cart if not exist alrady
    $_SESSION['shoppingcart'] = array();
}//adding value to the shopping cart
elseif(isset($_POST["insertshoppinglist"]))
{
	
	//checking if the input is already exist in the array  or not, if yes then print error message
	if(in_array($_POST["insertshoppinglist"], $_SESSION['shoppingcart']))
  	{
		$flag=True;
		$error= "You Can't add the same item again!!";
		//echo "Match found"; //for testing purpose
  	}
	else
	{       
		//else print the value on the console with the sucessfull message
 		array_push($_SESSION['shoppingcart'],$_POST["insertshoppinglist"]);
		$success = "Item Addeed Successfully!";
		//echo "Match not found"; //for testing purpose
	}	

}

//print_r($_SESSION);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="bg-contact3" style="background-image: url('images/bg-01.jpg');">
		<div class="container-contact3">
			<div class="wrap-contact3">
				<form class="contact3-form validate-form" action = "ShoppingListPage.php" method="post">
					<span class="contact3-form-title">
						Shopping Cart
					</span>

					

					<div class="wrap-input3 validate-input" data-validate="Item name is required">
						<input class="input3" type="text" name="insertshoppinglist" placeholder="Add item to cart" required>
						<span class="focus-input3"></span>
					</div>
                    <!-- printing the message to the console-->
					<?php if($flag){ echo '<h5 style="color:RED;">'. $error .' </h5>'; $flag=False; }
					else {echo '<h5 style="color:BLUE;">'. $success .' </h5>'; $flag=False;}
					 ?>					

					<div class="container-contact3-form-btn">
						<button class="contact3-form-btn" value="Add item">
							Submit
						</button>
					</div>
				</form>
				<br>
				<!--<div class="wrap-input3 validate-input">-->
					<h1>Your Items</h1> <ol>
						<?php
                                //printinh the item list
								while (list ($key, $val) = each ($_SESSION['shoppingcart'])) 
								{	 
								echo "<li> $val </li>"; 
								}
						?></ol>
					
						<span class="focus-input3"></span>
				<!--</div>-->
			<a href="Summary/index.php">  GO TO SUMMARY </a>
			
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>
</html>
