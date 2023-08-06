<?php
session_start();
$db = new mysqli('localhost', 'root', '', 'travelapp');

// Check for errors
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
}

// CART ARRAY
if (empty($_SESSION['cart_items'])) {
	$_SESSION['cart_items'] = array();
}

array_push($_SESSION['cart_items'], isset($_POST['add_to_cart']));

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<title>Travel App</title>
</head>

<body>
	<header>
	<div class="logowrapper">
			<div class="logo_div">
			<a href="/"><img src="img/logo.png" alt="travel app"></a>
			</div>
			<div class="cart_div">
			
				<div class="cart" id="cart"><h3 id="cart_quantity"><?php echo count($_SESSION['cart_items']); ?></h3></div>
			</div>
	

	</div>
		<nav>
			<ul>
				<li><a href="/">Travel Packages</a></li>
			</ul>
		</nav>
	</header>

			<div class="cart_details" id="cart_details">
				<h2>Visible only on cart-click</h2>
				<h2>Visible only on cart-click</h2>
				<h2>Visible only on cart-click</h2>
				<h2>Visible only on cart-click</h2>
				<h2>Visible only on cart-click</h2>
				<h2>Visible only on cart-click</h2>
				<h2>Visible only on cart-click</h2>
				<h2>Visible only on cart-click</h2>
				<h2>Visible only on cart-click</h2>
				<h2>Visible only on cart-click</h2>
				<h2>Visible only on cart-click</h2>
				<div class="empty_cart"><input type="submit" value="Empty Cart"></div>
			</div>
	<main>
<section class="search_products">
	<form class="search_form" action="index.php">

		<div class="search_child" >
			<label for="froms">From:</label>
			<select name="froms" id="froms">
				<?php 
				$froms_rows = $db->query("SELECT DISTINCT froms FROM travels;");
				while ($from_row = $froms_rows->fetch_assoc()) { ?>
			  	<option value="<?php echo strtoupper($from_row["froms"]); ?>"><?php echo strtoupper($from_row["froms"]); ?></option>
				<?php } ?>
			 
			</select>
		</div>

		<div class="search_child" >
			<label for="tos">To:</label>
			<select name="tos" id="tos">
				<?php 
				$tos_rows = $db->query("SELECT DISTINCT tos FROM travels;");
				while ($tos_row = $tos_rows->fetch_assoc()) { ?>
			 		<option value="<?php echo strtoupper($tos_row["tos"]); ?>"><?php echo strtoupper($tos_row["tos"]); ?></option>
				<?php } ?>
			</select>
		</div>

		<div class="search_child">
			<label for="d_date">Daparture Data:</label>
			<select name="d_date" id="d_date">
				<?php 
				$date_rows = $db->query("SELECT DISTINCT d_date FROM travels;");
				while ($date_row = $date_rows->fetch_assoc()) { ?>
 					<option value="<?php echo $date_row["d_date"]; ?>"><?php echo $date_row["d_date"]; ?></option>
				<?php } ?>
			</select>
		</div>

			
		<input type="submit" value="SEARCH PACKAGES">
		
	</form>
</section>

<section class="all_products">
   <?php 
   $rows = $db->query("SELECT * FROM `travels` ORDER BY id ASC");
   while ($row = $rows->fetch_assoc()) { ?>
  <div class="product_card">
  	<h3 class="product_title"><?php echo ucwords("{$row["froms"]} to {$row["tos"]} {$row["vehicle_type"]}"); ?></h3>
     <img src="img/<?php echo $row["thumbnail"];?>"/>
     <div class="card_details">
	     <p><b>Departures:</b> <?php echo $row["d_date"];?></p>
	     <p><b>Arrives:</b> <?php echo $row["a_date"];?></p>
	     <p><b>For:</b> <?php echo $row["persons"];?> Persons</p>
	     <h3 class="card_price">&#8377; <?php echo $row["price"];?></h3>
	     <input type="number" name="product_quantity" min="1" max="10" value="1">
	     <input type="hidden" name="product_price" value="<?php echo $row["price"];?>">
	     <input type="submit" name="add_to_cart" value="Add to Cart">
     </div>
   </div>
   <?php } ?>

</section>

	</main>
	<footer>
		<div class="copyright">
			<p>&copy; 2020-2023 @travelapp - all rights reserved.</p>
		</div>
		<div class="getsocial">
			<a href="#"></a>
			<a href="#"></a>
			<a href="#"></a>
			<a href="#"></a>
		</div>
	</footer>

<script src="script.js"></script>
</body>

</html>

<!-- https://www.youtube.com/watch?v=0wYSviHeRbs&t=1s -->