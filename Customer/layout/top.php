<?php  
	$name = $kw = $a = "";
	$t = 0;
	$sql="SELECT * from product";
	if (isset($_GET['kw'])) {
		$kw = $_GET['kw'];
		$sql = "SELECT * from product
				 INNER JOIN brand ON product.id_brand = brand.id
				 INNER JOIN type  ON product.id_type = type.id 
				 where product.name like '%$kw%' or brand.name_brand like '%$kw%'";
	}
	$rs = mysqli_query($conn,$sql);
	$nr = mysqli_num_rows($rs);
	$limit = 12;
	$sotr = ceil($nr/$limit);
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}
	else {
		$page = 1;
	}
	if ($page > $sotr) {
		$page = $sotr;
	}
	if ($page < 1) {
		$page = 1;
	}
	$offset = ($page - 1)* $limit;

	$sql .= " LIMIT $offset,$limit";
	$rs1 = mysqli_query($conn,$sql);
	if (!$rs1) {
		echo 'Lỗi: '.mysqli_error($conn);
	}
	if (isset($_SESSION['cart'])) {
		foreach ($_SESSION['cart'] as $id_product => $qtt) {
			$t += $qtt;
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<meta charset="utf-8">
		<style type="text/css">
			body, html{
				height: 100%;
				text-align: center;
				background: #EDEDEDFF;
			}
			*{
				margin: 0;
				padding: 0;
				box-sizing: border-box;
			}
			li{
				list-style-type: none;
			}
			#tong{
				width: 1305px;
				height: auto;
				margin: auto;
				position: relative;
				padding-bottom: 30px;
			}


			/* Phần thanh trên */

			.thanh_tren {
				width: 100%;
				height: 120px;
				background: #353922;
				position: relative;
				position: sticky;
				top: 0;
				z-index: 1000;
			}
			#thanh_tren_ngoai{
				width: 100%;
				height: 120px;
				background: #353922;
				position: relative;
				position: fixed;
				top: 0;
				float: left;
			}
			#dn{
				width: 150px;
				height: 100%;
				font-size: smaller;
				text-decoration: none;
				color: white;
				position: absolute;
				right: 10px;
				top: 0;
				text-align: center;
				line-height: 30px;
			}
			#dn a{
				text-decoration: none;
				color: white;
				font-size: smaller;
				width: 100%;
			}
			#logo{
				width: 140px;
				float: left;
				position: absolute;
				top: 10px;
				left: 30px;
			}
			#tk{
				display: inline;
				width: 800px;
				background: white;
				height: 42px;
				position: absolute;
				left: 20%;
				top: 30%;
				border: 1px solid black;
				text-align: center;
				line-height: 60px;
			}
			#tk #kw{
				width: 720px;
				height: 40px;
				border: none;
				position: absolute;
				top: 0;
				left: 10px; 
		        outline: 0;     
		        outline-style: none;     
		        outline-width: 0;
		        font-size: 20px;
		        float: left;
			}
			#tk #but{
				width: 70px;
				height: 40px;
				border: none;
				background: white;     
		        outline: 0;     
		        outline-style: none;     
		        outline-width: 0;
		        position: absolute;
		        top: 0;
		        right: 0;
		        float: left;
			}
			#tk #but:hover{
				background: lightgray;
			}
			#gh{
				width: 50px;
				font-size: 30px;
				color: white;
				float: right;
				position: absolute; 
				top: 35%;
				right: 12%;
			}
			#ghc{
				width: 30px;
				font-size: 30px;
				color: white;
			}
			#content{
				width: 100%;
				height: 100%;
			}
			.c{
				position: relative;
			}
			.c .tb {
				position: absolute;
				top: -10px;
				right: -10px;
				font-size: 15px;
				padding: 0 5px;
				border-radius: 50%;
				background-color: red;
				color: white;
			}
			.hov{
				height: 50%;
			}
			.hov a{
				width: 100%;
				text-decoration: none;
				color: black;
			}
			.hov:hover{
				background: #98D82C;
				color: white;
				transition: ease-in 0.20s;
				-moz-transition: ease-in 0.20s;
				-webkit-transition: ease-in 0.20s;
			}
			.tooltip {
				display: inline-block;
				width: 150px;
				position: absolute;
				color: white;
				right: 0;
				top: 5px;
			}

			.tooltip .tooltiptext {
				visibility: hidden;
				width: 150px;
				line-height:30px;
				background-color: white;
				color: black;
				text-align: center;
				position: absolute;
				z-index: 1;
				top: 120%;
				left: 40%;
				margin-left: -60px;
			}

			

			.tooltip .tooltiptext::after {
				content: "";
				position: absolute;
				bottom: 100%;
				left: 50%;
				margin-left: -5px;
				border-width: 5px;
				border-style: solid;
				border-color: transparent transparent white transparent;
			}

			.tooltip:hover .tooltiptext {
				visibility: visible;
			}
			#menu{
				margin: auto;
				position: absolute;
				top: 80%;
				left: 15%;
			}
			.menu1{
				float: left;
				width: 180px;
				margin: auto;
				color: white;
				/* background: orange; */
			}
			.menu1 a{
				text-decoration: none;
				position: relative;
				color: white ;
				
			}
			.type{
				width: 100%;
				height: 35px;
				display: block;
			}
			.mn{
				background: #353922;
				width: 150px;
				font-size: large;
				text-align: left;
				margin-top: 6px;
				margin-left: 15px;
			}

			.drop_down{
				border-bottom: 1px solid lightgrey;
				line-height: 35px;
				width: 100%;
			}
			.text{
				color: white;
				margin-left: 15px;
				width: 135px;
			}
			.drop_down:hover .text{
				color: black;
				transition: 0.5s;
			}
			.type:hover{
				background: lawngreen;
				color: black;
			}
			.drop_down:hover{
				background: lawngreen;
				color: black;
			}
			.menu_content{
				display: none;
				width: 150px;
			}
			.menu1:hover .menu_content{
				display: block;
			}
			#phon{
				position: relative;
				top: 10px;
				right: 300px;
				color: white;
			}
			table{
				margin: auto;
			} 
			#link{
				width: 100%;
				height: 100%;
				display: block;
				text-decoration: none;
				color: black;
			}
			.item{
				width: 200px;
				height: 250px;
				text-align: center;
				background: white;
			}
			.item:hover{
				box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
				border: 1px solid #353922;
			}
			table .page{
				border: 1px solid darkviolet;
				border-collapse: collapse;
				width: 30px;
			}
			#page{
				margin-top: 10px;
			}
			.a{
				display: block;
				width: 100%;
				text-decoration: none;
				color: black;
			}
			</style>
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
		<link rel="icon" type="image/png" href="../Public/image/logo3.png">
		<script src="https://cdn.tailwindcss.com"></script>
	</head>
	<body>
		<div id="thanh_tren_ngoai">
		</div>
		<div id="tong">
			<div class="thanh_tren">
				<a href="index.php?module=Product&action=home">
					<div class="text-white text-4xl font-bold absolute top-0 left-0 h-full flex items-center">BKC</div>
				</a>

				<!-- Thanh tìm kiếm -->
				<div id="tk">
					<form autocomplete="off">
						<input type="text"    id="kw"  name="kw" placeholder="Tìm kiếm sản phẩm bạn muốn mua..." value="<?php if(isset($kw)) echo $kw; ?>">
						<button type="submit" id="but" name="but" class="flex justify-center items-center transition duration-300 ">
							<svg height="19" viewBox="0 0 19 19" width="19">
								<g fill-rule="evenodd" stroke="none" stroke-width="1">
									<g transform="translate(-1016 -32)">
										<g>
											<g transform="translate(405 21)">
												<g transform="translate(611 11)">
													<path d="m8 16c4.418278 0 8-3.581722 8-8s-3.581722-8-8-8-8 3.581722-8 8 3.581722 8 8 8zm0-2c-3.3137085 0-6-2.6862915-6-6s2.6862915-6 6-6 6 2.6862915 6 6-2.6862915 6-6 6z">
													</path>
													<path d="m12.2972351 13.7114222 4.9799555 4.919354c.3929077.3881263 1.0260608.3842503 1.4141871-.0086574.3881263-.3929076.3842503-1.0260607-.0086574-1.414187l-4.9799554-4.919354c-.3929077-.3881263-1.0260608-.3842503-1.4141871.0086573-.3881263.3929077-.3842503 1.0260608.0086573 1.4141871z">
													</path>
												</g>
											</g>
										</g>
									</g>
								</g>
							</svg>
						</button>
					</form> 
				</div>

				<!-- icon giỏ hàng -->
				<div id="gh">
					<a href="index.php?module=invoice&action=cart" class="c">
						<span><img id="ghc" src="../Public/image/cart.png"></span>
						<?php  
							if ($t > 0) {
								echo '<span class="tb">';
									echo $t;
								echo '</span>';
							}
						?>
					</a>
				</div>
				<div id="phon">Liên hệ: 0989.127.891</div>
				<!-- Đăng nhập, Đăng xuất -->
				<?php
					if (isset($_SESSION['user']['id']) && !empty($_SESSION['user']['id'])) {
						$id = $_SESSION['user']['id'];
						$sql2 = "SELECT name_customer from customer where id = '$id';";
						$rs8 = mysqli_query($conn,$sql2);
						$row = mysqli_fetch_assoc($rs8);
						$name = $row['name_customer'];
						echo '<div class="tooltip">';
							echo $name;
							echo '<span class="tooltiptext">';
								// echo '<div class="hov">';
								// 	echo '<a href="index.php?module=Common&action=information">Thông tin tài khoản</a>';
								// echo '</div>';
								echo '<div class="hov">';
									echo '<a href="index.php?module=invoice&action=history">Lịch sử mua hàng</a>';
								echo '</div>';
								echo '<div class="hov">';
									echo '<a href="index.php?module=Common&action=logout">Đăng xuất</a>';
								echo '</div>';
							echo '</span>';
						echo '</div>';
					}
					else {
						echo '<div id="dn">';
							echo '<a href="index.php?module=Common&action=login"><i class="fa fa-fw fa-user"></i> Đăng Nhập</a>';
							echo '&nbsp;|&nbsp';
							echo '<a href="index.php?module=Common&action=register">Đăng Kí</a>';
						echo '</div>';
					}
				?>

				<div id="menu">
					<div class="menu1">
						<a href="index.php">Trang chủ</a>
					</div>

					<!-- Drop down hãng -->
					<div class="menu1 menu2">
						Danh mục sản phẩm
						<div class="menu_content">
							<table class="mn" cellspacing="0" cellpadding="0">
								<tr>
									<?php  
										$sql1 = "SELECT * from type";
										$rs3 = mysqli_query($conn,$sql1);
										if (!$rs3) {
											echo 'Lỗi: '.mysqli_error($conn);
										}
										$total = mysqli_num_rows($rs3);
										$count = 0;
										while ($count != $total) {
									    	while ($row = mysqli_fetch_assoc($rs3)) {
									    	   	$idty = $row['id'];
												echo "<td class='drop_down'>";
													$type1 = $row['name_type'];
													echo '<a class="type" href="index.php?module=Product&action=list_type&type='.$type1.'">';
														echo '<span class="text">';
															echo $row['name_type'];
														echo '</span>';
													echo '</a>';
												echo "</td>";
										    	$count ++;
									    	    if ($count % 1 == 0 && $count < $total) {
									    	    	echo "</tr>";
									    	    	echo "<tr>";
									    	    }
									    	}
										}
									?>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div id="content">