<?php	
	session_start();
	require_once("includes/connect.php");
?>
<?php
	if (isset($_GET['action']) && $_GET['action'] == "add")
	{
		$id = intval($_GET['id']);
		if(isset($_SESSION['cart']['$id']))
		{
			 $_SESSION['cart']['$id']['quantity']++;

		}else
		{
			$sql2 = "SELECT * FROM `products` WHERE `id_products`= '$id'";
			$query2 = mysql_query($sql2);
			
			if (mysql_num_rows($query2) !=0)
			{
				$row2 =  mysql_fetch_array($query2);
				$_SESSION['cart'][$row2['id_products']] = array("quantity" => 1, "price" => $row2['price']);
			}else
			{
				$message = "This product id is invalid";
			}
		}
	}
?>
<?php if(isset($message)) { echo $message; }?>	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Tablet Restaurant Ordering System</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<link rel="stylesheet" href="_/css/yellow.css" />
	<link rel="stylesheet" href="_/css/structure.css" />
	
	<script src="_/js/jquery.js"></script>
	<script src="_/js/jquery.mobile.js"></script>

	<script src="_/js/myscript.js"></script>
	<link rel="stylesheet" href="_/css/mystyles.css" />
</head>
<body>
	<!-- Page: home -->
	<div id="home"
		data-role="page"
		data-theme="a"
		data-title="Tablet Restaurant Ordering System: Home">
		<div data-role="content">
			<img src="images/viewsourcelogo.png" alt="View Source Logo" />
		</div>
		<div data-role="controlgroup">
			<a href="#soup" 
				data-role="button"
				data-icon="arrow-r"
			>Soups & Salads</a>
			<a href="#appetizer" 
				data-role="button"
				data-icon="arrow-r"
			>Appetizer</a>
			<a href="#maincourse" 
				data-role="button"
				data-icon="arrow-r"
			>Main Course</a>
			<a href="#desserts" 
				data-role="button"
				data-icon="arrow-r"
			>Desserts</a>
			<a href="#beverages" 
				data-role="button"
				data-icon="arrow-r"
			>Beverages</a>
			<a href="#cart" 
				data-role="button"
				data-icon="arrow-r"
			>View Cart</a>
		</div><!-- links -->
	</div><!-- page -->

	<!-- Page: soup and salads -->
	<div id="soup"
		data-theme="a"
		data-role="page"
		data-title="Tablet Restaurant Ordering System: Soup">
		<div data-role="header"
			data-theme="a"
			data-position="fixed"
			data-id="vs_header">
			<h1>Soup & Salads</h1>
			<a href="#home"
				data-icon="home"
				data-iconpos="notext"
				>Home</a>
			<a href="#info"
				data-icon="info"
				data-iconpos="notext"
				data-rel="dialog"
				>Info</a>
		</div><!-- header -->
		<div data-theme="a"
		data-role="content">
			<div data-role="collapsible-set">
				<div data-role="collapsible">
					<h3>Cream of Chicken Soup</h3>
					<!--<p>Tender chicken pieces in creamy soup base</p>
					
					<!--script-->
					<table>
						<tr>
							<!--<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Action</th>-->
						</tr>
						<!-- Test Template Features -->
						<?php
							$sql = "SELECT * FROM products WHERE name = 'Cream'";
							$query =  mysql_query($sql) or die(mysql_error());
							
							while ($rows = mysql_fetch_assoc($query))
							{
						?>	
							<tr>
								<td><img src="images/soupssalad_01.jpg" style=" width: 250px;"/></td>
							
								<td>&nbsp&nbsp<?php echo $rows['description']; ?></td>
							
								<td style=" color: red;">&nbsp&nbsp&nbsp&nbsp RM&nbsp&nbsp<?php echo $rows['price']; ?></td>
							
								<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="index.php?page=products&action=add&id=<?php echo $rows['id_products']; ?>">Add to cart</a></td>
							</tr>
						<?php	
							}
						?>
					</table>
					<!--end-->
				</div><!-- collapsible -->
				
				<div data-role="collapsible">
					<!--data-collapsed="false">-->
					<h3>Mixed Vegetable Soup</h3>
					<!--<p>Fresh from the garden, in light-clear soup</p>-->
					
					<table>
						<tr>
							<!--<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Action</th>-->
						</tr>
						<!-- Test Template Features -->
						<?php
							$sql = "SELECT * FROM products WHERE name = 'Mixed'";
							$query =  mysql_query($sql) or die(mysql_error());
							
							while ($rows = mysql_fetch_assoc($query))
							{
						?>	
							<tr>
								<td><img src="images/soupssalad_02.jpg" style=" width: 200px;"/></td>
							
								<td>&nbsp&nbsp<?php echo $rows['description']; ?></td>
							
								<td style=" color: red;">&nbsp&nbsp&nbsp&nbsp RM&nbsp&nbsp<?php echo $rows['price']; ?></td>
							
								<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="index.php?page=products&action=add&id=<?php echo $rows['id_products']; ?>">Add to cart</a></td>
							</tr>
						<?php	
							}
						?>
					</table>
					<!--end-->
				</div><!-- collapsible -->
				
				<div data-role="collapsible">
					<h3>Fetush</h3>
					<!--<p>Romaine lettuce, tomato, cucumber & white radish topped with crunchy toasted Lebanese bread & dressed with lemon juice, olive oil & balsimic vinegar</p>
					<img src="images/soupssalad_04.jpg" style=" width: 200px;"/>
					<!--script-->
					<table>
						<tr>
							<!--<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Action</th>-->
						</tr>
						<!-- Test Template Features -->
						<?php
							$sql = "SELECT * FROM products WHERE name = 'Fetush'";
							$query =  mysql_query($sql) or die(mysql_error());
							
							while ($rows = mysql_fetch_assoc($query))
							{
						?>	
							<tr>
								<td><img src="images/soupssalad_04.jpg" style=" width: 200px;"/></td>
							
								<td>&nbsp&nbsp<?php echo $rows['description']; ?></td>
							
								<td style=" color: red;">&nbsp&nbsp&nbsp&nbsp RM&nbsp&nbsp<?php echo $rows['price']; ?></td>
							
								<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="index.php?page=products&action=add&id=<?php echo $rows['id_products']; ?>">Add to cart</a></td>
							</tr>
						<?php	
							}
						?>
					</table>
					<!--end-->
					
				</div><!-- collapsible -->
				
				<div data-role="collapsible">
					<h3>Arabic Salad</h3>
					<!--<p>The classic green salad with the hint of Sumak herb</p>
					<img src="images/soupssalad_05.jpg" style=" width: 200px;"/>
					<!--script-->
					<table>
						<tr>
							<!--<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Action</th>-->
						</tr>
						<!-- Test Template Features -->
						<?php
							$sql = "SELECT * FROM products WHERE name = 'Arabic'";
							$query =  mysql_query($sql) or die(mysql_error());
							
							while ($rows = mysql_fetch_assoc($query))
							{
						?>	
							<tr>
								<td><img src="images/soupssalad_05.jpg" style=" width: 200px;"/></td>
							
								<td>&nbsp&nbsp<?php echo $rows['description']; ?></td>
							
								<td style=" color: red;">&nbsp&nbsp&nbsp&nbsp RM&nbsp&nbsp<?php echo $rows['price']; ?></td>
							
								<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="index.php?page=products&action=add&id=<?php echo $rows['id_products']; ?>">Add to cart</a></td>
							</tr>
						<?php	
							}
						?>
					</table>
					<!--end-->
				</div><!-- collapsible -->
				
				<!-- <div data-role="collapsible">
					<h3>Creating a Photo Rotator with JQuery Cycle</h3>
					<p>I love the JQuery tagline…write less, do more. </p>
				</div>collapsible -->
			</div><!-- accordion -->
		</div><!-- content -->
		<div data-role="footer"
			data-position="fixed"
			data-theme="a"
			data-id="vs_footer">
			<div data-role="navbar">
				<ul>
					<li><a href="#home" 
					data-role="button"
					data-icon="home"
					>Home</a></li>
					
					<li><a href="#appetizer" 
					data-role="button"
					data-icon="arrow-r"
					>Appetizer</a></li>
					<li><a href="#maincourse" 
					data-role="button"
					data-icon="arrow-r"
					>Main Course</a></li>
					<li><a href="#desserts" 
					data-role="button"
					data-icon="arrow-r"
					>Desserts</a></li>
					<li><a href="#beverages" 
					data-role="button"
					data-icon="arrow-r"
					>Beverages</a></li>
					<li><a href="#cart" 
					data-role="button"
					data-icon="arrow-r"
					>Cart</a></li>
					
				</ul>
			</div><!-- navbar -->
		</div><!-- footer -->
	</div><!-- page -->
	
	<!-- Page: appetizer -->
	<div id="appetizer"
		data-theme="a"
		data-role="page"
		data-title="Tablet Restaurant Ordering System: Appetizers">
		<div data-role="header"
			data-theme="a"
			data-position="fixed"
			data-id="vs_header">
			<h1>Appetizers</h1>
			<a href="#home"
				data-icon="home"
				data-iconpos="notext"
				>Home</a>
			<a href="#info"
				data-icon="info"
				data-iconpos="notext"
				data-rel="dialog"
				>Info</a>
		</div><!-- header -->
		<div data-theme="a"
		data-role="content">
			<div data-role="collapsible-set">
				<div data-role="collapsible">
					<h3>Tarbush Hommus</h3>
					<!--<p>Chickpeas with tahina sauce (sesame paste), garlic & parsley topped with olive oil. A strong-flavoured dip & the House signature dish</p>
					<img src="images/appertizers_01.jpg" style=" width: 250px;"/>
					<!--script-->
					<table>
						<tr>
							<!--<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Action</th>-->
						</tr>
						<!-- Test Template Features -->
						<?php
							$sql = "SELECT * FROM products WHERE name = 'Tarbush'";
							$query =  mysql_query($sql) or die(mysql_error());
							
							while ($rows = mysql_fetch_assoc($query))
							{
						?>	
							<tr>
								<td><img src="images/appertizers_01.jpg" style=" width: 250px;"></td>
							
								<td>&nbsp&nbsp<?php echo $rows['description']; ?></td>
							
								<td style=" color: red;">&nbsp&nbsp&nbsp&nbsp RM&nbsp&nbsp<?php echo $rows['price']; ?></td>
							
								<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="index.php?page=products&action=add&id=<?php echo $rows['id_products']; ?>">Add to cart</a></td>
							</tr>
						<?php	
							}
						?>
					</table>
					<!--end-->
				</div><!-- collapsible -->
				
				<div data-role="collapsible">
					<!--data-collapsed="false">-->
					<h3>Baba Ghanoush</h3>
					<!--<p>A dip of grilled eggplant & tahina sauce, generously drenched in olive oil</p>
					<img src="images/appertizers_02.jpg" style=" width: 250px;"/>
					<!--script-->
					<table>
						<tr>
							<!--<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Action</th>-->
						</tr>
						<!-- Test Template Features -->
						<?php
							$sql = "SELECT * FROM products WHERE name = 'Baba'";
							$query =  mysql_query($sql) or die(mysql_error());
							
							while ($rows = mysql_fetch_assoc($query))
							{
						?>	
							<tr>
								<img src="images/appertizers_02.jpg" style=" width: 250px;"/>
							
								<td>&nbsp&nbsp<?php echo $rows['description']; ?></td>
							
								<td style=" color: red;">&nbsp&nbsp&nbsp&nbsp RM&nbsp&nbsp<?php echo $rows['price']; ?></td>
							
								<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="index.php?page=products&action=add&id=<?php echo $rows['id_products']; ?>">Add to cart</a></td>
							</tr>
						<?php	
							}
						?>
					</table>
					<!--end-->
				</div><!-- collapsible -->
				
				<div data-role="collapsible">
					<h3>Warak Ainab</h3>
					<!--<p>A mixture of rice, tomatoes, onions and herbs stuffed in pickled wine leaves</p>
					<img src="images/appertizers_03.jpg" style=" width: 250px;"/>
					<!--script-->
					<table>
						<tr>
							<!--<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Action</th>-->
						</tr>
						<!-- Test Template Features -->
						<?php
							$sql = "SELECT * FROM products WHERE name = 'Warak'";
							$query =  mysql_query($sql) or die(mysql_error());
							
							while ($rows = mysql_fetch_assoc($query))
							{
						?>	
							<tr>
								<td><img src="images/appertizers_03.jpg" style=" width: 250px;"/></td>
							
								<td>&nbsp&nbsp<?php echo $rows['description']; ?></td>
							
								<td style=" color: red;">&nbsp&nbsp&nbsp&nbsp RM&nbsp&nbsp<?php echo $rows['price']; ?></td>
							
								<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="index.php?page=products&action=add&id=<?php echo $rows['id_products']; ?>">Add to cart</a></td>
							</tr>
						<?php	
							}
						?>
					</table>
					<!--end-->
				</div><!-- collapsible -->
				
				<div data-role="collapsible">
					<h3>Falafel</h3>
					<!--<p>Deep-fried patties made of a fine-blended of chickpeas with onion, garlic, coriander, cumin & flour</p>
					<img src="images/appertizers_04.jpg" style=" width: 250px;"/>
					<!--script-->
					<table>
						<tr>
							<!--<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Action</th>-->
						</tr>
						<!-- Test Template Features -->
						<?php
							$sql = "SELECT * FROM products WHERE name = 'Falafel'";
							$query =  mysql_query($sql) or die(mysql_error());
							
							while ($rows = mysql_fetch_assoc($query))
							{
						?>	
							<tr>
								<td><img src="images/appertizers_04.jpg" style=" width: 250px;"/></td>
							
								<td>&nbsp&nbsp<?php echo $rows['description']; ?></td>
							
								<td style=" color: red;">&nbsp&nbsp&nbsp&nbsp RM&nbsp&nbsp<?php echo $rows['price']; ?></td>
							
								<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="index.php?page=products&action=add&id=<?php echo $rows['id_products']; ?>">Add to cart</a></td>
							</tr>
						<?php	
							}
						?>
					</table>
					<!--end-->
				</div><!-- collapsible -->
				
				<!-- <div data-role="collapsible">
					<h3>Creating a Photo Rotator with JQuery Cycle</h3>
					<p>I love the JQuery tagline…write less, do more. </p>
				</div>collapsible -->
			</div><!-- accordion -->
		</div><!-- content -->
		<div data-role="footer"
			data-position="fixed"
			data-theme="a"
			data-id="vs_footer">
			<div data-role="navbar">
				<ul>
					<li><a href="#home" 
					data-role="button"
					data-icon="home"
					>Home</a></li>
					<li><a href="#soup" 
					data-role="button"
					data-icon="arrow-r"
					>Soups & Salads</a></li>
					
					<li><a href="#maincourse" 
					data-role="button"
					data-icon="arrow-r"
					>Main Course</a></li>
					<li><a href="#desserts" 
					data-role="button"
					data-icon="arrow-r"
					>Desserts</a></li>
					<li><a href="#beverages" 
					data-role="button"
					data-icon="arrow-r"
					>Beverages</a></li>
					<li><a href="#cart" 
					data-role="button"
					data-icon="arrow-r"
					>Cart</a></li>
					
				</ul>
			</div><!-- navbar -->
		</div><!-- footer -->
	</div><!-- page -->
	
	<!-- Page: main course -->
	<div id="maincourse"
		data-theme="a"
		data-role="page"
		data-title="Tablet Restaurant Ordering System: Main Course">
		<div data-role="header"
			data-theme="a"
			data-position="fixed"
			data-id="vs_header">
			<h1>Main Course</h1>
			<a href="#home"
				data-icon="home"
				data-iconpos="notext"
				>Home</a>
			<a href="#info"
				data-icon="info"
				data-iconpos="notext"
				data-rel="dialog"
				>Info</a>
		</div><!-- header -->
		<div data-theme="a"
		data-role="content">
			<div data-role="collapsible-set">
				<div data-role="collapsible">
					<h3>Shish Kebab Irany</h3>
					<!--<p>Minced tender lamb, marinated and grilled, served on the top of white rice</p>
					<img src="images/mains_01.jpg" style=" width: 250px;"/>
					<!--script-->
					<table>
						<tr>
							<!--<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Action</th>-->
						</tr>
						<!-- Test Template Features -->
						<?php
							$sql = "SELECT * FROM products WHERE name = 'Shish'";
							$query =  mysql_query($sql) or die(mysql_error());
							
							while ($rows = mysql_fetch_assoc($query))
							{
						?>	
							<tr>
								<td><img src="images/mains_01.jpg" style=" width: 250px;"/></td>
							
								<td>&nbsp&nbsp<?php echo $rows['description']; ?></td>
							
								<td style=" color: red;">&nbsp&nbsp&nbsp&nbsp RM&nbsp&nbsp<?php echo $rows['price']; ?></td>
							
								<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="index.php?page=products&action=add&id=<?php echo $rows['id_products']; ?>">Add to cart</a></td>
							</tr>
						<?php	
							}
						?>
					</table>
					<!--end-->
				</div><!-- collapsible -->
				
				<div data-role="collapsible">
					<!--data-collapsed="false">-->
					<h3>Biryani Lamb/Chicken</h3>
					<!--<p>Biryani rice served with succulent lamb chunks or with a half-baked chicken</p>
					<img src="images/mains_02.jpg" style=" width: 250px;"/>
					<!--script-->
					<table>
						<tr>
							<!--<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Action</th>-->
						</tr>
						<!-- Test Template Features -->
						<?php
							$sql = "SELECT * FROM products WHERE name = 'Biryani'";
							$query =  mysql_query($sql) or die(mysql_error());
							
							while ($rows = mysql_fetch_assoc($query))
							{
						?>	
							<tr>
								<td><img src="images/mains_02.jpg" style=" width: 250px;"/></td>
							
								<td>&nbsp&nbsp<?php echo $rows['description']; ?></td>
							
								<td style=" color: red;">&nbsp&nbsp&nbsp&nbsp RM&nbsp&nbsp<?php echo $rows['price']; ?></td>
							
								<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="index.php?page=products&action=add&id=<?php echo $rows['id_products']; ?>">Add to cart</a></td>
							</tr>
						<?php	
							}
						?>
					</table>
					<!--end-->
				</div><!-- collapsible -->
				
				<div data-role="collapsible">
					<h3>Bazilla with Rice</h3>
					<!--<p>Rice cooked with green peas & chicken</p>
					<img src="images/mains_03.jpg" style=" width: 250px;"/>
					<!--script-->
					<table>
						<tr>
							<!--<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Action</th>-->
						</tr>
						<!-- Test Template Features -->
						<?php
							$sql = "SELECT * FROM products WHERE name = 'Bazilla'";
							$query =  mysql_query($sql) or die(mysql_error());
							
							while ($rows = mysql_fetch_assoc($query))
							{
						?>	
							<tr>
								<td><img src="images/mains_03.jpg" style=" width: 250px;"/></td>
							
								<td>&nbsp&nbsp<?php echo $rows['description']; ?></td>
							
								<td style=" color: red;">&nbsp&nbsp&nbsp&nbsp RM&nbsp&nbsp<?php echo $rows['price']; ?></td>
							
								<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="index.php?page=products&action=add&id=<?php echo $rows['id_products']; ?>">Add to cart</a></td>
							</tr>
						<?php	
							}
						?>
					</table>
					<!--end-->
				</div><!-- collapsible -->
				
				<div data-role="collapsible">
					<h3>Fried Pomfret with Rice</h3>
					<!--<p>Steamed Basmati rice served with fried pomfret</p>
					<img src="images/mains_05.jpg" style=" width: 250px;"/>
					<!--script-->
					<table>
						<tr>
							<!--<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Action</th>-->
						</tr>
						<!-- Test Template Features -->
						<?php
							$sql = "SELECT * FROM products WHERE name = 'Fried'";
							$query =  mysql_query($sql) or die(mysql_error());
							
							while ($rows = mysql_fetch_assoc($query))
							{
						?>	
							<tr>
								<td><img src="images/mains_05.jpg" style=" width: 250px;"/></td>
							
								<td>&nbsp&nbsp<?php echo $rows['description']; ?></td>
							
								<td style=" color: red;">&nbsp&nbsp&nbsp&nbsp RM&nbsp&nbsp<?php echo $rows['price']; ?></td>
							
								<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="index.php?page=products&action=add&id=<?php echo $rows['id_products']; ?>">Add to cart</a></td>
							</tr>
						<?php	
							}
						?>
					</table>
					<!--end-->
				</div><!-- collapsible -->
				
				<!-- <div data-role="collapsible">
					<h3>Creating a Photo Rotator with JQuery Cycle</h3>
					<p>I love the JQuery tagline…write less, do more. </p>
				</div>collapsible -->
			</div><!-- accordion -->
		</div><!-- content -->
		<div data-role="footer"
			data-position="fixed"
			data-theme="a"
			data-id="vs_footer">
			<div data-role="navbar">
				<ul>
					<li><a href="#home" 
					data-role="button"
					data-icon="home"
					>Home</a></li>
					<li><a href="#soup" 
					data-role="button"
					data-icon="arrow-r"
					>Soups & Salads</a></li>
					<li><a href="#appetizer" 
					data-role="button"
					data-icon="arrow-r"
					>Appetizer</a></li>
					
					<li><a href="#desserts" 
					data-role="button"
					data-icon="arrow-r"
					>Desserts</a></li>
					<li><a href="#beverages" 
					data-role="button"
					data-icon="arrow-r"
					>Beverages</a></li>
					<li><a href="#cart" 
					data-role="button"
					data-icon="arrow-r"
					>Cart</a></li>
					
				</ul>
			</div><!-- navbar -->
		</div><!-- footer -->
	</div><!-- page -->
	
	<!-- Page: Desserts -->
	<div id="desserts"
		data-theme="a"
		data-role="page"
		data-title="Tablet Restaurant Ordering System: Desserts">
		<div data-role="header"
			data-theme="a"
			data-position="fixed"
			data-id="vs_header">
			<h1>Desserts</h1>
			<a href="#home"
				data-icon="home"
				data-iconpos="notext"
				>Home</a>
			<a href="#info"
				data-icon="info"
				data-iconpos="notext"
				data-rel="dialog"
				>Info</a>
		</div><!-- header -->
		<div data-theme="a"
		data-role="content">
			<div data-role="collapsible-set">
				<div data-role="collapsible">
					<h3>Mahalabia</h3>
					<!--<p>Milk cream pudding garnished with chopped pistachio</p>
					<img src="images/dessert_01.jpg" style=" width: 250px;"/>
					<!--script-->
					<table>
						<tr>
							<!--<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Action</th>-->
						</tr>
						<!-- Test Template Features -->
						<?php
							$sql = "SELECT * FROM products WHERE name = 'Mahalabia'";
							$query =  mysql_query($sql) or die(mysql_error());
							
							while ($rows = mysql_fetch_assoc($query))
							{
						?>	
							<tr>
								<td><img src="images/dessert_01.jpg" style=" width: 250px;"/></td>
							
								<td>&nbsp&nbsp<?php echo $rows['description']; ?></td>
							
								<td style=" color: red;">&nbsp&nbsp&nbsp&nbsp RM&nbsp&nbsp<?php echo $rows['price']; ?></td>
							
								<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="index.php?page=products&action=add&id=<?php echo $rows['id_products']; ?>">Add to cart</a></td>
							</tr>
						<?php	
							}
						?>
					</table>
					<!--end-->
				</div><!-- collapsible -->
				
				<div data-role="collapsible">
					<!--data-collapsed="false">-->
					<h3>Ma'moul Bi Fustouq</h3>
					<!--<p>A Middle Eastern type of cookies with pistachio fillings</p>
					<img src="images/dessert_02.jpg" style=" width: 250px;"/>
					<!--script-->
					<table>
						<tr>
							<!--<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Action</th>-->
						</tr>
						<!-- Test Template Features -->
						<?php
							$sql = "SELECT * FROM products WHERE name = 'Ma\'moul'";
							$query =  mysql_query($sql) or die(mysql_error());
							
							while ($rows = mysql_fetch_assoc($query))
							{
						?>	
							<tr>
								<td><img src="images/dessert_02.jpg" style=" width: 250px;"/></td>
							
								<td>&nbsp&nbsp<?php echo $rows['description']; ?></td>
							
								<td style=" color: red;">&nbsp&nbsp&nbsp&nbsp RM&nbsp&nbsp<?php echo $rows['price']; ?></td>
							
								<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="index.php?page=products&action=add&id=<?php echo $rows['id_products']; ?>">Add to cart</a></td>
							</tr>
						<?php	
							}
						?>
					</table>
					<!--end-->
				</div><!-- collapsible -->
				
				<!--<div data-role="collapsible">--
					<h3>Fetush</h3>
					<!--<p>Romaine lettuce, tomato, cucumber & white radish topped with crunchy toasted Lebanese bread & dressed with lemon juice, olive oil & balsimic vinegar</p>
					<img src="images/soupssalad_04.jpg" style=" width: 200px;"/>
					<!--script-->
					
					<!--end--
				</div><!-- collapsible 
				
				<div data-role="collapsible">
					<h3>Arabic Salad</h3>
					<p>The classic green salad with the hint of Sumak herb</p>
					<img src="images/soupssalad_05.jpg" style=" width: 200px;"/>
					<!--script-->
					
					<!--end--
				</div><!-- collapsible -->
				
				<!-- <div data-role="collapsible">
					<h3>Creating a Photo Rotator with JQuery Cycle</h3>
					<p>I love the JQuery tagline…write less, do more. </p>
				</div>collapsible -->
			</div><!-- accordion -->
		</div><!-- content -->
		<div data-role="footer"
			data-position="fixed"
			data-theme="a"
			data-id="vs_footer">
			<div data-role="navbar">
				<ul>
					<li><a href="#home" 
					data-role="button"
					data-icon="home"
					>Home</a></li>
					<li><a href="#soup" 
					data-role="button"
					data-icon="arrow-r"
					>Soups & Salads</a></li>
					<li><a href="#appetizer" 
					data-role="button"
					data-icon="arrow-r"
					>Appetizer</a></li>
					<li><a href="#maincourse" 
					data-role="button"
					data-icon="arrow-r"
					>Main Course</a></li>
					
					<li><a href="#beverages" 
					data-role="button"
					data-icon="arrow-r"
					>Beverages</a></li>
					<li><a href="#cart" 
					data-role="button"
					data-icon="arrow-r"
					>Cart</a></li>
					
				</ul>
			</div><!-- navbar -->
		</div><!-- footer -->
	</div><!-- page -->
	
	<!-- Page: Beverages -->
	<div id="beverages"
		data-theme="a"
		data-role="page"
		data-title="Tablet Restaurant Ordering System: Beverages">
		<div data-role="header"
			data-theme="a"
			data-position="fixed"
			data-id="vs_header">
			<h1>Beverages</h1>
			<a href="#home"
				data-icon="home"
				data-iconpos="notext"
				>Home</a>
			<a href="#info"
				data-icon="info"
				data-iconpos="notext"
				data-rel="dialog"
				>Info</a>
		</div><!-- header -->
		<div data-theme="a"
		data-role="content">
			<div data-role="collapsible-set">
				<div data-role="collapsible">
					<h3>Sparkling Drinks</h3>
					<!--<p>Apple La Vim - Vimto, apple juice & 7 Up
						Lemonavim - Vimto, lime juice & 7 Up
						Frezzy Miscela - Lime juice, sugar syrup & soda
						Lemon Na'na' - Lemonade with fresh mint</p>
					<img src="images/beverages_01.jpg" style=" width: 200px;"/>
					<!--script-->
					<table>
						<tr>
							<!--<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Action</th>-->
						</tr>
						<!-- Test Template Features -->
						<?php
							$sql = "SELECT * FROM products WHERE name = 'Sparkling'";
							$query =  mysql_query($sql) or die(mysql_error());
							
							while ($rows = mysql_fetch_assoc($query))
							{
						?>	
							<tr>
								<td><img src="images/beverages_01.jpg" style=" width: 200px;"/></td>
							
								<td>&nbsp&nbsp<?php echo $rows['description']; ?></td>
							
								<td style=" color: red;">&nbsp&nbsp&nbsp&nbsp RM&nbsp&nbsp<?php echo $rows['price']; ?></td>
							
								<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="index.php?page=products&action=add&id=<?php echo $rows['id_products']; ?>">Add to cart</a></td>
							</tr>
						<?php	
							}
						?>
					</table>
					<!--end-->
				</div><!-- collapsible -->
				
				<div data-role="collapsible">
					<h3>Hot Drinks</h3>
					<!--<p>Arabic Coffee, Brewed Coffee, Espresso, Mocha, Cappucino, Cafe Latte, Arabic Tea, Earl Grey, Green Tea & Hot Chocolate </p>
					<img src="images/beverages_02.jpg" style=" width: 200px;"/>
					<!--script-->
					<table>
						<tr>
							<!--<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Action</th>-->
						</tr>
						<!-- Test Template Features -->
						<?php
							$sql = "SELECT * FROM products WHERE name = 'Hot'";
							$query =  mysql_query($sql) or die(mysql_error());
							
							while ($rows = mysql_fetch_assoc($query))
							{
						?>	
							<tr>
								<td><img src="images/beverages_02.jpg" style=" width: 200px;"/></td>
							
								<td>&nbsp&nbsp<?php echo $rows['description']; ?></td><br /><br />
							
								<td style=" color: red;">&nbsp&nbsp&nbsp&nbsp RM&nbsp&nbsp<?php echo $rows['price']; ?></td>
							
								<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="index.php?page=products&action=add&id=<?php echo $rows['id_products']; ?>">Add to cart</a></td>
							</tr>
						<?php	
							}
						?>
					</table>
					<!--end-->
				</div><!-- collapsible -->
				
				<div data-role="collapsible">
					<h3>Cool Drinks</h3>
					<!--<p>Lemonade, Lemon Na'na', Vimto/Mulberry Juice, Mango Lassi, Yogurt Drink, Ice Lemon Tea & Mineral Water</p>
					<!--script-->
					<table>
						<tr>
							<!--<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Action</th>-->
						</tr>
						<!-- Test Template Features -->
						<?php
							$sql = "SELECT * FROM products WHERE name = 'Cool'";
							$query =  mysql_query($sql) or die(mysql_error());
							
							while ($rows = mysql_fetch_assoc($query))
							{
						?>	
							<tr>
															
								<td>&nbsp&nbsp<?php echo $rows['description']; ?></td>
							
								<td style=" color: red;">&nbsp&nbsp&nbsp&nbsp RM&nbsp&nbsp<?php echo $rows['price']; ?></td>
							
								<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="index.php?page=products&action=add&id=<?php echo $rows['id_products']; ?>">Add to cart</a></td>
							</tr>
						<?php	
							}
						?>
					</table>
					<!--end-->
				</div><!-- collapsible -->
				
				<div data-role="collapsible">
					<h3>Fresh Juices</h3>
					<p>Orange, Watermelon, Honeydew, Carrot, Apple, Mango & Starfruit</p>
					<!--script-->
					<table>
						<tr>
							<!--<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Action</th>-->
						</tr>
						<!-- Test Template Features -->
						<?php
							$sql = "SELECT * FROM products WHERE name = 'Fresh'";
							$query =  mysql_query($sql) or die(mysql_error());
							
							while ($rows = mysql_fetch_assoc($query))
							{
						?>	
							<tr>
															
								<td>&nbsp&nbsp<?php echo $rows['description']; ?></td>
							
								<td style=" color: red;">&nbsp&nbsp&nbsp&nbsp RM&nbsp&nbsp<?php echo $rows['price']; ?></td>
							
								<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="index.php?page=products&action=add&id=<?php echo $rows['id_products']; ?>">Add to cart</a></td>
							</tr>
						<?php	
							}
						?>
					</table>
					<!--end-->
				</div><!-- collapsible -->
				
				<div data-role="collapsible">
					<h3>Soft Drinks</h3>
					<p>7up, Mirinda Orange, Pepsi, Pepsi diet </p>
					<!--script-->
					<table>
						<tr>
							<!--<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Action</th>-->
						</tr>
						<!-- Test Template Features -->
						<?php
							$sql = "SELECT * FROM products WHERE name = 'Soft'";
							$query =  mysql_query($sql) or die(mysql_error());
							
							while ($rows = mysql_fetch_assoc($query))
							{
						?>	
							<tr>
															
								<td>&nbsp&nbsp<?php echo $rows['description']; ?></td>
							
								<td style=" color: red;">&nbsp&nbsp&nbsp&nbsp RM&nbsp&nbsp<?php echo $rows['price']; ?></td>
							
								<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="index.php?page=products&action=add&id=<?php echo $rows['id_products']; ?>">Add to cart</a></td>
							</tr>
						<?php	
							}
						?>
					</table>
					<!--end-->
				</div><!-- collapsible -->
				
				<!-- <div data-role="collapsible">
					<h3>Creating a Photo Rotator with JQuery Cycle</h3>
					<p>I love the JQuery tagline…write less, do more. </p>
				</div>collapsible -->
			</div><!-- accordion -->
		</div><!-- content -->
		<div data-role="footer"
			data-position="fixed"
			data-theme="a"
			data-id="vs_footer">
			<div data-role="navbar">
				<ul>
					<li><a href="#home" 
					data-role="button"
					data-icon="home"
					>Home</a></li>
					<li><a href="#soup" 
					data-role="button"
					data-icon="arrow-r"
					>Soups & Salads</a></li>
					<li><a href="#appetizer" 
					data-role="button"
					data-icon="arrow-r"
					>Appetizer</a></li>
					<li><a href="#maincourse" 
					data-role="button"
					data-icon="arrow-r"
					>Main Course</a></li>
					<li><a href="#desserts" 
					data-role="button"
					data-icon="arrow-r"
					>Desserts</a></li>
					
					<li><a href="#cart" 
					data-role="button"
					data-icon="arrow-r"
					>Cart</a></li>
					
				</ul>
			</div><!-- navbar -->
		</div><!-- footer -->
	</div><!-- page -->

	<!-- Page: ViewCart -->
	<div id="cart"
		data-theme="a"
		data-role="page"
		data-title="Tablet Restaurant Ordering System: Cart">
		<div data-role="header"
			data-theme="a"
			data-position="fixed"
			data-id="vs_header">
			<h1>View Cart</h1>
			<a href="#home"
				data-icon="home"
				data-iconpos="notext"
				>Home</a>
			<a href="#info"
				data-icon="info"
				data-iconpos="notext"
				data-rel="dialog"
				>Info</a>
		</div><!-- header -->
		<div data-theme="a"
		data-role="content"><!--cart-->
		<?php
			if (isset($_POST['submit']))
			{
				foreach($_POST as $key => $value)
				{
					$key = explode("-",$key);
					$key = end($key);
					$key = explode("submit",$key);
					$key = end($key);
					
					if ($_POST['quantity-'.$key] == 0)
					{
						unset($_SESSION['cart'][$key]);
						//echo "Unset session";
					}else
					{
						$_SESSION['cart'][$key]['quantity'] = $value;
						//echo "Updated session";
					}	
				}
			}
		?>

		<center><form method="POST" action="#">
			<table>
				<tr>
					<th>Name</th>
					<th>Quantity</th>
					<th>Price per item</th>
					<th>Total Cost</th>
				</tr>
				<?php
					$sql = "SELECT * FROM products WHERE id_products IN (";
						foreach($_SESSION['cart'] as $id => $value)
						{
							$sql .= $id . ",";
						}
						$sql = substr($sql,0,-1).") ";
						$query = mysql_query($sql);
						$total_price = 0;
						if(!empty($query))
						{
							while($row = mysql_fetch_array($query))
							{
								$subtotal = $_SESSION['cart'][$row['id_products']]['quantity']*$row['price'];
								$total_price += $subtotal;
								?>
									<tr>
										<td><?php echo $row['name']; ?></td>
										<td><input type="text" name="quantity-<?php echo $row['id_products']; ?>" size="1" value="<?php echo $_SESSION['cart'][$row['id_products']]['quantity']; ?>" /></td>
										<td>&nbsp&nbsp&nbsp&nbsp<?php echo "$" . $row['price']; ?></td>
										<td><?php echo"$" . $_SESSION['cart'][$row['id_products']]['quantity']*$row['price']; ?></td>
									</tr>
								<?php
							}
							}else
								{
									echo "<i>You need to add items for them to be visible here</i> ";
								}
				?>
				<tr>
					<td></td>
					<td></td>
					<td>Total Price:</td>
					<td><?php echo"$" . $total_price; ?></td>
				</tr>
			</table>
			<br />
			Remarks:<br /><input type="text" cols="15" rows="5" />
			<br />
			<input type="submit" name="submit" value="Update Cart"></input>
			<center><a href="#send"
				data-icon="info"
				data-iconpos="notext"
				data-rel="dialog"
				>Send Order</a></center>
			<!--<input type="submit" name="submit" value="Send Order"></input>--->
		</form></center><br />
		
		<p style=" color: red;"> To remove an item, set quantity to 0</p>
		<p style=" color: green;"> Please, refresh the page for the items to appear or removing them from cart after update</p>	
			<!-- accordion -->
		</div><!-- content -->
		<div data-role="footer"
			data-position="fixed"
			data-theme="a"
			data-id="vs_footer">
			<div data-role="navbar">
				<ul>
					<li><a href="#home" 
					data-role="button"
					data-icon="home"
					>Home</a></li>
					<li><a href="#soup" 
					data-role="button"
					data-icon="arrow-r"
					>Soups & Salads</a></li>
					
					<li><a href="#maincourse" 
					data-role="button"
					data-icon="arrow-r"
					>Main Course</a></li>
					<li><a href="#desserts" 
					data-role="button"
					data-icon="arrow-r"
					>Desserts</a></li>
					<li><a href="#beverages" 
					data-role="button"
					data-icon="arrow-r"
					>Beverages</a></li>
					<li><a href="#cart" 
					data-role="button"
					data-icon="arrow-r"
					>Cart</a></li>
					
				</ul>
			</div><!-- navbar -->
		</div><!-- footer -->
	</div><!-- page -->
	
	<div data-role="page"
		id="info"
		data-theme="a"
		>
		<div data-role="header">
			<h1>About The Table Restaurant Ordering System</h1>
		</div>
		<div data-role="content">
			<p>The background of the restaurant to server customer at flexible time and quality</p>
			<a href="#"
				data-role="button"
				data-inline="true"
				data-rel="back"
				data-theme="a"
			>cancel</a>
			<a href="#home"
				data-role="button"
				data-inline="true"
				data-theme="a"
			>home</a>
		</div>
	</div>
	
	<!-- Send order notification -->
	<div data-role="page"
		id="send"
		data-theme="a"
		>
		<div data-role="header">
			<h1>Order Notification</h1>
		</div>
		<div data-role="content">
			<p>Your order has been sent. Please, we will serve you shortly.Thanks</p>
			<!--<a href="#"
				data-role="button"
				data-inline="true"
				data-rel="back"
				data-theme="a"
			>cancel</a>-->
			<a href="#home"
				data-role="button"
				data-inline="true"
				data-theme="a" 
			>home</a>
		</div>
	</div>
	
	
	
</body>
</html>
