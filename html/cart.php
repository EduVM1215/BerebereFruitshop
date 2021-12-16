<!DOCTYPE html>


<?php
require 'conexion.php';
$conexion->set_charset('utf8'); //establece el conjunto de caracteres en la conexión, para que no haya problema de acentos y ñ de los campos
$sql = "SELECT * FROM lineapedido WHERE pedidoID = $_COOKIE[id]";
$resultado = $conexion->query($sql);
$numfilas=$resultado->num_rows;
$numcolumns=$resultado->field_count;
if (!$resultado) {
die("No se puede realizar la consulta $conexion->errno: $conexion->error");
}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Cart</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.php">
								<img src="assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="index.php">Home</a></li>
								<li><a href="shop.php">Shop</a></li>
								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="cart.php"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search arewa -->
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>FRESCAS Y ORGÁNICAS</p>
						<h1>Carrito</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									
									<th class="product-image">Imagen</th>
									<th class="product-name">Nombre</th>
									<th class="product-price">Precio</th>
									<th class="product-quantity">Cantidad</th>
									<th class="product-total">Total</th>
									<th class="product-remove"></th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$preciototal = 0;
									while($pedido = $resultado->fetch_assoc()){
										
										
										$sql = "SELECT * FROM producttb WHERE frutaID  = $pedido[frutaID] ";
										$resultadofruta = $conexion->query($sql);
										$fruta = $resultadofruta->fetch_assoc();
										
										
										echo"<tr>";
										
											
											echo '<td class="product-image">';
											
											echo "<img src=$fruta[product_image]></td>";
											
											echo '<td class="product-name">';
											
											echo $fruta["product_name"];
										
										
											echo '<td class="product-price">';
											
											echo $fruta["product_price"];
											
											echo '<td class="product-quantity">';
											
											echo $pedido["cantidad"];
																			
											
											echo '<td class="product-total">';

											echo $pedido["cantidad"] * $fruta["product_price"]; echo " € ";
											
											echo ' <td class="product-remove">
											
											<form method="POST">
											<td><input type = "Submit" font-size= 10px name ='; echo "$fruta[product_name]"; echo ' value = Quitar></td>
											</form>'
											;
											
											
												
											
											echo "</tr>"; 
											
											$preciototal = $preciototal + $fruta["product_price"] * $pedido["cantidad"];
											
											
									}
									
									
									
									if(isset($_POST['Fresas'])) 
											
											{
												$sql = "DELETE FROM lineapedido WHERE frutaID  = 1 AND pedidoID = $_COOKIE[id]";
												$resultadofruta = $conexion->query($sql);
												
											}
									
									if(isset($_POST['Uva'])) 
											
											{
												$sql = "DELETE FROM lineapedido WHERE frutaID  = 2 AND pedidoID = $_COOKIE[id]";
												$resultadofruta = $conexion->query($sql);
												
											}
											
									if(isset($_POST['Limones'])) 
											
											{
												$sql = "DELETE FROM lineapedido WHERE frutaID  = 3 AND pedidoID = $_COOKIE[id]";
												$resultadofruta = $conexion->query($sql);
											
											}
									if(isset($_POST['Kiwi'])) 
											
											{
												$sql = "DELETE FROM lineapedido WHERE frutaID  = 4 AND pedidoID = $_COOKIE[id]";
												$resultadofruta = $conexion->query($sql);
												
											}	
									if(isset($_POST['Manzanas'])) 
											
											{
												$sql = "DELETE FROM lineapedido WHERE frutaID  = 5 AND pedidoID = $_COOKIE[id]";
												$resultadofruta = $conexion->query($sql);
												
											
											}
											
									if(isset($_POST['Frambuesas'])) 
											
											{
												$sql = "DELETE FROM lineapedido WHERE frutaID  = 6 AND pedidoID = $_COOKIE[id]";
												$resultadofruta = $conexion->query($sql);
												
											}
								

								?>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td><?php echo "$preciototal €"; ?></td>
								</tr>
								<tr class="total-data">
									<td><strong>Shipping: </strong></td>
									<td><?php 
									
									$shipping = $preciototal/10;
									echo "$shipping €"; ?></td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td><?php 
									
									$total = $preciototal+ $shipping;
									echo "$total €"; ?></td>
								</tr>
							</tbody>
						</table>
						
						
						
						<div class="cart-buttons">
							
							<form action="https://www.sandbox.paypal.com/es/cgi-bin/webscr" method="post">
								<input type="hidden" name="cmd" value="_xclick">
								<input type="hidden" name="business" value='vendedorpruebaasd@business.example.com'>
								<input type="hidden" name="item_name" value="Compra con prueba mínima">
								<input type="hidden" name="currency_code" value="EUR">
								<input type="hidden" name="amount" value="<?php echo "$total"?>">
								<input type="hidden" name="return" value="http://localhost/berebere/fruitkha/index.php">
								<input type="image"
								src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_100x26.p
								ng" alt="PayPal Checkout" name="submit" >
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->

	
	
	
	
	
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

</body>
</html>