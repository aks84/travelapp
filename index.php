<?php
@session_start();
$ip = $_SERVER['REMOTE_ADDR'];
$db = new mysqli('localhost', 'root', '', 'travelapp');

// Check for errors
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
}

// CART ARRAY
if (empty($_SESSION['cart_items'])) {
	$_SESSION['cart_items'] = array();
}




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
			
				<div class="cart" id="cart"><h3 id="cart_quantity"><?php $cart_counted = count($_SESSION['cart_items']); echo $cart_counted + 1; ?></h3></div>
			</div>
	

	</div>
		<nav>
			<ul>
				<li><a href="/">Travel Packages</a></li>
			</ul>
		</nav>
	</header>

			<div class="cart_details" id="cart_details">
				<table id="cart_packages">
					<tr>
						<th>Package</th>
						<th>Dapartures</th>
						<th>Quantity</th>
						<th>For</th>
						<th>Price</th>
					</tr>
					
		<?php 
						if ($_SESSION['cart_items']) {
						$card_item_ids = implode(',', $_SESSION['cart_items']);
						$cart_item_rows = $db->query("SELECT * FROM travels WHERE id in ($card_item_ids)");
						while ($cart_item_row = $cart_item_rows->fetch_assoc()) { ?>
							<tr>
						<td><?php echo "{$cart_item_row['froms']} to {$cart_item_row['tos']} {$cart_item_row['vehicle_type']}"; ?></td>
						<td><?php echo "{$cart_item_row['d_date']}"; ?></td>
						<td><?php echo "{$cart_item_row['froms']}"; ?></td>
						<td><?php echo "{$cart_item_row['persons']} Persons"; ?></td>
						<td><?php echo "{$cart_item_row['price']}"; ?></td>
						</tr>
					 <?php }	}

					 if (isset($_POST['empty_cart'])) {
					 	   unset($_SESSION['cart_items']);				 	
					 }
					?>
					
				</table>

				<from method="POST" action="index.php">
					<input type="submit"  name="empty_cart" value="Empty Cart">
				</from>

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
			  	<option value="<?php echo $from_row["froms"]; ?>"><?php echo $from_row["froms"]; ?></option>
				<?php } ?>
			 
			</select>
		</div>

		<div class="search_child" >
			<label for="tos">To:</label>
			<select name="tos" id="tos">
				<?php 
				$tos_rows = $db->query("SELECT DISTINCT tos FROM travels;");
				while ($tos_row = $tos_rows->fetch_assoc()) { ?>
			 		<option value="<?php echo $tos_row["tos"]; ?>"><?php echo $tos_row["tos"]; ?></option>
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

			
		<input type="submit" name='multi_search'value="SEARCH PACKAGES">
		
	</form>
</section>

<?php 

if (!empty($_POST['product_quantity'])) {
	if (isset($_POST['add_to_cart'])) {
		$current_id = $_POST['product_id'];
		$current_q = $_POST['product_quantity'];
		$cart_insertable = $db->query("SELECT * FROM travels WHERE id={$current_id}");
		while ($cart_row = $cart_insertable->fetch_assoc()) { 
			array_push($_SESSION['cart_items'],$current_id);
			// echo ucwords("Title: {$cart_row['froms']} to {$cart_row['tos']} {$cart_row['vehicle_type']}")." <br> Price: {$cart_row['price']} <br> Quantity:  $current_q  <br> Total Price: ". ($cart_row['price'] * $current_q) + 100 ."<br>";
		}
		
		// echo "You clicked travel ID : {$current_id} and quantity was : {$current_q} <br>";
	}

}

 ?>

<section class="all_products">
   <?php 
 
   if(isset($_GET['multi_search'])) {
   	  $froms_value = $_GET['froms'];
   		$tos_value = $_GET['tos'];
   		$date_value = $_GET['d_date'];
   	// echo "{$froms_value} {$tos_value} {$date_value}";
   	$searche_rows = $db->query("SELECT * FROM travels WHERE froms = '$froms_value' AND tos = '$tos_value' AND d_date = '$date_value'");

   	while ($search_row = $searche_rows->fetch_assoc()) { ?>
	  <div class="product_card">
	  	<h3 class="product_title"><?php echo ucwords("{$search_row["froms"]} to {$search_row["tos"]} {$search_row["vehicle_type"]}"); ?></h3>
	     <img src="img/<?php echo $search_row["thumbnail"];?>"/>

	     <form class="card_details" method="POST" action="index.php">
		     <p><b>Departures:</b> <?php echo $search_row["d_date"];?></p>
		     <p><b>Arrives:</b> <?php echo $search_row["a_date"];?></p>
		     <p><b>For:</b> <?php echo $search_row["persons"];?> Persons</p>
		     <h3 class="card_price">&#8377; <?php echo $search_row["price"];?></h3>
		     <input type="number" name="product_quantity" min="1" max="10" value="1">
		     <input type="hidden" name="product_id" value="<?php echo $search_row["id"];?>">
		     <input type="submit" name="add_to_cart" value="Add to Cart">
	     </form>
	   </div>

   <?php } // search while loop ends here
   } else {
   	   
	   $rows = $db->query("SELECT * FROM `travels` ORDER BY id ASC");
	   while ($row = $rows->fetch_assoc()) { ?>
	  <div class="product_card">
	  	<h3 class="product_title"><?php echo ucwords("{$row["froms"]} to {$row["tos"]} {$row["vehicle_type"]}"); ?></h3>
	     <img src="img/<?php echo $row["thumbnail"];?>"/>

	     <form class="card_details" method="POST" action="index.php">
		     <p><b>Departures:</b> <?php echo $row["d_date"];?></p>
		     <p><b>Arrives:</b> <?php echo $row["a_date"];?></p>
		     <p><b>For:</b> <?php echo $row["persons"];?> Persons</p>
		     <h3 class="card_price">&#8377; <?php echo $row["price"];?></h3>
		     <input type="number" name="product_quantity" min="1" max="10" value="1">
		     <input type="hidden" name="product_id" value="<?php echo $row["id"];?>">
		     <input type="submit" name="add_to_cart" value="Add to Cart">
	     </form>

	   </div>
   <?php } }?>

</section>

	</main>


	<?php 

print_r($_SESSION['cart_items']);
// unset($_SESSION['cart_items']); 
// session_destroy();
?>



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
<!-- https://www.youtube.com/watch?v=gZ65_NyXhI8 -->