<?php
session_start();
$db = new mysqli('localhost', 'root', '', 'travelapp');

// Check for errors
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
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
		<div class="logo_wrapper">
			<h2 class="logo">TravelApp</h2>
		</div>
		<nav>
			<ul>
				<li><a href="/">Travel Packages</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<div class="packages">
			<h2>All Travel Packages</h2>

			<table>
   <tr>
     <th>To</th>
     <th>From</th>
     <th>image</th>
     <th>Departs</th>
     <th>Arrives</th>
     <th>Vehicle</th>
     <th>Persons</th>
     <th>Price</th>
   </tr>
   <?php 
   $rows = $db->query("SELECT * FROM `travels` ORDER BY id ASC");
   while ($row = $rows->fetch_assoc()) { ?>
   <tr>
     <td><?php echo $row["tos"]; ?></td>
     <td><?php echo $row["froms"]; ?></td>
     <td><?php echo $row["thumbnail"];?></td>
     <td><?php echo $row["d_date"];?></td>
     <td><?php echo $row["a_date"];?></td>
     <td><?php echo $row["vehicle_type"];?></td>
     <td><?php echo $row["persons"];?></td>
     <td><?php echo $row["price"];?></td>
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
		&copy; 2020-2023 @travelapp - all rights reserved
	</footer>


</body>

</html>

<!-- https://www.youtube.com/watch?v=0wYSviHeRbs&t=1s -->