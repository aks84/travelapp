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
			</div>
	<main>
		<div class="packages">
			<h2>All Travel Packages</h2>

			<table>
   <tr>
   	 <th>From</th>
     <th>To</th>
     <th>image</th>
     <th>Departs</th>
     <th>Arrives</th>
     <th>Vehicle</th>
     <th>Persons</th>
     <th>Price</th>
     <th>Quantity</th>
     <th>Cart</th>
   </tr>
   <?php 
   $rows = $db->query("SELECT * FROM `travels` ORDER BY id ASC");
   while ($row = $rows->fetch_assoc()) { ?>
   <tr>
     <td><?php echo $row["tos"]; ?></td>
     <td><?php echo $row["froms"]; ?></td>
     <!-- <td><img src="img/<?php echo $row["thumbnail"];?>"/></td> -->
     <td><?php echo $row["thumbnail"];?></td>
     <td><?php echo $row["d_date"];?></td>
     <td><?php echo $row["a_date"];?></td>
     <td><?php echo $row["vehicle_type"];?></td>
     <td><?php echo $row["persons"];?></td>
     <td>&#8377; <?php echo $row["price"];?></td>
     <td><input type="number" name="product_quantity" min="1" max="10" value="1"></td>
     <td><input type="hidden" name="product_price" value="<?php echo $row["price"];?>"></td>
     <td><input type="submit" name="add_to_cart" value="Add to Cart"></td>
   </tr>
   <?php } ?>
</table>



			<?php
			$rows = $db->query("SELECT * FROM `travels` ORDER BY id ASC");
			printf("Select returned %d rows.\n", $rows->num_rows, '<br>');

			if ($rows) {
				while ($row = $rows->fetch_assoc()) { ?>



			<?php		
				}
			}

			?>


		</div>

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