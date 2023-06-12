<?php include("../db/db.php"); 
			// Check connection
			$sql = "SELECT * FROM product where id=".htmlspecialchars($_GET["id"]);
			$result = $conn->query($sql);
global $id,$name,$desc,$price;
			if ($result->num_rows > 0) {

				while($row = $result->fetch_assoc()) {
					$id=$row["id"];
					$name= $row["name"];
					$desc=$row["description"];
					$price=$row["price"];
				  
				}
			} 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link rel="stylesheet" type="text/css"  href="../css/style.css"  />
<title>Jake's Cofee Shop</title>
</head>
<body>

<div id="divContainer">
    <div id="divHeader">
     <h1>Rashi's Cake Shop</h1>
    </div>
        <div id="divLeft">
            <a href="../index.php" class="navBar" >Home</a>
            <br />
            <a href="addproducts.php" class="navBar">Add Products</a> 
            <br/>
            <a href="products.php" class="navBar">Products</a> 
            <br/>
            <a href="abouthUs.php" class="navBar">Abouth Us</a> 
            <br/>
            <a href="contactUs.php" class="navBar">Contact Us</a> 
        </div>
        <div id="divRight">
                <form method="post" id="frmProduct" >
                     <label for="id">id</label>
                        <input type="text" name="id" placeholder="id" id="id"  readonly="readonly" value='<?php echo  htmlspecialchars($_GET["id"]); ?>' />
                        <br/>
                        <br/>

                    <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Name" id="name" value='<?php echo $name; ?>' />
                        <br/>
                        <br/>
                    
                    <label for="desc">Description</label>
                        <input type="text" name="desc" placeholder="Description" id="desc" value='<?php echo $desc; ?>' />
                        <br/>
                        <br/>
                
                    <label for="price">Price</label>
                        <input type="text" name="price" placeholder="Price" id="price" value='<?php echo $price; ?>' />
                        <br/>
                        <br/>
                <button type="submit" name="submit" id="submit">submit</button>
                    
                </form>
                <br/>
                        <?php
                     
                        // Insert Data
                        if(isset($_POST['submit'])){
                            $name=$_POST['name'];
                            $description=$_POST['desc'];
                            $price=$_POST['price'];
                            $id=$_POST['id'];

                            $sql = 'UPDATE  product SET name="'.$name.'", description="'.$description.'", price="'.$price.'"  WHERE id='.$id;
                            
                            if (mysqli_query($conn, $sql)) {
                            echo "upadte successfully";
                            } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                        }
                        $conn->close();

                        ?>
        </div>
    <div id="divFooter" >
        Copywrite © 2023 Rashi Cake Shop
        <br/>
        <a href="mailto:RashiCakes@gmail.com">RashiCakes@gmail.com</a>
    </div>
</div>
</body>
</html>
