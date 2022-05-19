<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<meta charset="utf-8">
		<link rel="icon" type="image/png" href="../Public/image/logo3.png">
		<style type="text/css">
			*{
				margin: 0;
				padding: 0;
			}
			body{
				background: #353922;
				font-family: 
			}
			#tong{
				width: 1150px;
				margin: auto;
				height: 500px;
				position: relative;
			}
			#img{
				width: 40%;
				position: absolute;
				left: 5%;
				top: 40%;
			}
			.content{
				border: 1px solid black;
				border-radius: 5px;
				float: left;
				position: absolute;
				right: 5%;
				font-size: x-large;
			}
			#content1{
				width: 400px;
				height: 350px;
				background: white;
				text-align: center;
				padding-top: 20px;
				position: absolute;
				top: 40%;

			}
			#content2{
				width: 400px;
				height: 520px;
				background: white;
				text-align: center;
				padding-top: 20px;
				position: absolute;
				top: 20%;
			}
			.lin{
				font-size: 70%;
			}
			.dndk{
				text-decoration: none;
				font-weight: bolder;
				color: rebeccapurple;
			}
			.dndk:hover{
				color: red;
			}
			button{
				width: 100px;
				height: 40px;
				background: none;
				border-radius: 5px;
			}
			button:hover{
				background: forestgreen;
				color: white;
				transition: 0.2s;
			}
			.in{
				width: 250px;
				height: 30px;
				margin: auto;
				border: 1px solid black;
			}
			input{
				width: 230px;
				height: 20px;
		        outline: 0;     
		        outline-style: none;     
		        outline-width: 0;	
		        border: none;
		        position: relative;
		        bottom: 2px;
			}
			#tl{
				color: white;
				text-align: center;
				width: 500px;
				font-size: xx-large;
				position: absolute;
				top: 100%;
				left: 3%;
			}
			.td{
				font-size: larger;
				font-weight: bolder;
			}
			input:-webkit-autofill,
			input:-webkit-autofill:hover, 
			input:-webkit-autofill:focus, 
			input:-webkit-autofill:active  {
				-webkit-box-shadow: 0 0 0 30px white inset !important;
			}
			#err{
				color: red;
				font-size: 17px;
				margin: 10px 0 10px 0;
			}
			.aa{
				position: absolute;
				bottom: 20px;
				left: 70px;
			}
		</style>
	</head>
	<body>
		<div id="tong">
			<div id="img" style="color: white;font-weight: bold;font-size: 9rem;text-align: center;">BKC</div>
			<div id="tl">Antiques and Auctions</div>