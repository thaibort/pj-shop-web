<?php  
	require_once 'config/check session.php';
?> 
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<style type="text/css">
			*{
				margin: 0;
				padding: 0;
				box-sizing: border-box;
			}
			body, html{
				height: 100%;
				text-align: center;
				background: lightgrey;
			}
			li{
				list-style-type: none;
			}
			#tong{
				width: 1305px;
				height: auto;
				background: #98D82C;
				margin: auto;
				position: relative;
			}


			/* Phần thanh trên */
			#thanh_tren {
				width: 1305px;
				height: 100px;
				background: #353922;
				position: fixed;
				top: 0;
				z-index: 2;
			}
			#list{
				width: 150px;
				position: absolute;
				color: white;
				right: 20px;
				top: 30px;
			}
			#list #name {
				display: block;
				text-align: center;
				width: 100%;
				line-height: 30px;
			}
			#name ul li{
				line-height: 30px;
				display: block;
				text-align: center;
				background: orange;
				width: 100%;
				font-size: larger;
			}
			#list:hover li{
				color: white;
				background: #353922;
			}
			#list ul{
				display: none;
			}
			#list:hover ul{
				display: block;
			}
			.ad a{
				width: 100%;
				text-decoration: none;
				color: #fff;
				display: block;
				background: #353922;
			}
			.ad a:hover {
				background: #98D82C;
				color: white;
				transition: ease-in 0.20s;
				-moz-transition: ease-in 0.20s;
				-webkit-transition: ease-in 0.20s;
			}
			#logo{
				color: white;
				font-weight: bold;
				font-size: 3rem;
				width: 140px;
				float: left;
				position: absolute;
				top: 15px;
				left: 75px;
			}
			#tk{
				display: inline;
				width: 800px;
				background: white;
				height: 40px;
				position: absolute;
				left: 305px;
				top: 30px;
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
			}
			#tk #but:hover{
				background: lightgray;
			}
			#hi{
				font-size: 20px;
				margin: auto;
				color: lawngreen;
			}

			/* Phần thanh menu bên trái */
			#menu_left{
				width: 300px;
				height: 100%;
				background:  #98D82C;
				position: fixed;
				top: 100px;
				z-index: 1111;
			}
			.menu{
				width: 100%;
				height: 70px;
				line-height: 70px;
				text-align: center;
			}
			.menu a{
				text-decoration: none;
				color: black;
				display: block;	
			}
			.menu:hover a{
				color: white;
			}
			.emoji{
				font-size: larger;
			}
			.s{
				position: relative;
				right: 13px;
			}
			#b{
				position: relative;
				right: 5px;
			}

			/* Phần giao diện bên phải */
			#category{
				padding-top: 100px;
				width: 77%;
				min-height: 800px;
				max-height: auto;
				float: right;
				background: white;
				z-index: 1;
				padding-bottom: 50px;
			}
		</style>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
	</head>
	<body>
		<div id="tong">
			<!-- Thanh trên cùng -->
			<div id="thanh_tren">
				<a href="index.php?module=Product&action=list">
					<!-- <img src="image/logo.png" id="logo"> -->
					<div id="logo">BKC</div>
				</a>

				<!-- Thanh tìm kiếm -->
				<div id="tk">
					<form autocomplete="off" method="POST">
						<input type="text"    id="kw"  name="kw" placeholder="Tìm kiếm" value="<?php echo $kw ?>">
						<button type="submit" id="but" name="but2">
							<svg height="19" id="svg" viewBox="0 0 19 19" width="19">
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

				<!-- Đăng nhập, Đăng xuất -->
				<ul id="list">
					<li id="name">
						<span id="hi">HI admin</span>
						<ul>
							<li class="ad">
								<a href="index.php?module=Common&action=logout">Đăng xuất</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>

			<!-- Thanh menu bên trái -->
			<div id="menu_left">
				<div class="menu" id="menu1">
					<a href="index.php?module=Product&action=list">
						<span class="emoji">&#x1f4d2;</span> Quản lí sản phẩm
					</a>
				</div>
				<div class="menu" id="menu2">
					<a href="index.php?module=invoice&action=invoice">
						<div id="b">
							<span class="emoji">&#x1f69b;</span> Quản lí hóa đơn
						</div>
					</a>
				</div>
				<div class="menu" id="menu4">
						<a href="index.php?module=type&action=type">
							<div class="s">					
								<span class="emoji">&#x1f352;</span> Quản lí loại
							</div>
						</a>
				</div>
			</div>
			<div id="category">