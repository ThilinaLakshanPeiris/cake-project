<?php include("../db/db.php"); ?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<link rel="stylesheet" type="text/css" href="../css/style.css"  />
<title>Jake's Cofee Shop</title>
</head>
<body>
<div id=" divContainer">
	<div id="divHeader">
		<h1>Rashi's Cake Shop</h1>
	</div>
	<div id="divLeft">
		<a href="../index.php" class="navBar">Home</a>
		<br />
		<a href="addproducts.php" class="navBar">Add Products</a>
		<br />
		<a href="products.php" class="navBar">Products</a>
		<br />
		<a href="abouthUs.php" class="navBar">Abouth Us</a>
		<br />
		<a href="contactUs.php" class="navBar">Contact Us</a>
	</div>
	<div id="divRight">
		<h3>Our Cakes...</h3>

		<br>
		<?php
		// Check connection
		$sql = "SELECT * FROM product";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {

			while ($row = $result->fetch_assoc()) {
				echo "" . $row["id"] . " " . $row["name"] . " " . $row["description"] . "" . $row["price"] . "";
				echo '<a href="' . "updateproducts.php?id=" . $row["id"] . '" >edit</a>' . "<br/>";
			}
			
		} else {
			echo "0 results";
		}
		$conn->close();
		?>

	</div>
	<div id="divFooter">
		Copywrite © 2023 Rashi Cake Shop
		<br />
		<a href="mailto:RashiCakes@gmail.com">RashiCakes@gmail.com</a>
	</div>
	</div>
	</body>

</html>