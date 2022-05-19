<?php  
    $error = "";
	if (isset($_SESSION['admin'])) {
		header("location:index.php?module=Product&action=list");
	}
	if (isset($_POST['but'])) {
		$user = $_POST['user'];
		$pw   = $_POST['pw'];
		$pw   = md5($pw);

		$sql = "SELECT id,name from admin where pass = '$pw' and acc = '$user'";
		$rs = mysqli_query($conn,$sql);
		if (!$rs) {
			$error =  mysqli_error($conn);
		}
		else {
			if (mysqli_num_rows($rs) == 1) {
				$row = mysqli_fetch_assoc($rs);
				session_start();
				$_SESSION['admin']['id'] = $row['id'];
				header("location:index.php?module=Product&action=list");
			}	
			else {
				$error = "Tài khoản hoặc mật khẩu không hợp lệ !";
			}
		}
	}
?>
<!DOCTYPE html> 
<html>
	<head>
		<title>Admin</title>
		<meta charset="utf-8">
		<link rel="icon" type="image/png" href="../Public/image/logo3.png">
		<style type="text/css">
			*{
				margin: 0;
				padding: 0;
			}
			body{
				text-align: center;
				background: #353922;
			}
			#a{
				width: 500px;
				margin: auto;
				position: relative; 
				top: 150px;
				background: slategrey;	
		        outline: 0;     
		        outline-style: none;     
		        outline-width: 0;
				z-index: 2;
				border: 2px solid white;
			}
			.in{  
		        outline: 0;     
		        outline-style: none;     
		        outline-width: 0;
		        width: 200px;
		        height: 30px;
				font-weight: bold;
				text-align: center;
				border: none;
			}
			#but{   
				width: 80px;
				height: 30px;
		        outline: 0;     
		        outline-style: none;     
		        outline-width: 0;
		        background: #353922;
		        color: white;
		        border: none;
				font-weight: bold;
			}
			#but:hover{
				background: lawngreen;
				color: black;
				transition: ease-in 0.2s;
			}
			#logo{
				width: 400px;
				position: relative;
				top: 100px;
			}
			::placeholder{
				font-weight: bold;
				color: slategrey;	
			}
			a{
				display: block;
				width: 100%;
				height: 100%;
				text-decoration: none;
				color: black;
				line-height: 25px;
			}
			#err{
				color: red;
				font-size: 17px;
			}
		</style>
	</head>
	<script type="text/javascript">
		function kt() {
			var vuser = document.getElementById('tk');
			var tk = vtk.value;
			var vmk = document.getElementById('mk');
			var mk = vmk.value;
			var verr = document.getElementById('err');
			if (tk == "" || mk == "") {
				alert("Không được để trống thông tin"); ;
				return false;
			}
			else{
				return true;
			}
		}
	</script>
	<body>
		<img src="image/logo.png" id="logo"><br><br>
		<fieldset style="text-align: center;" id="a">
			<legend style="color: white"><h1>Đăng nhập Admin</h1></legend><br><br>
			<form method="POST" onsubmit="return kt()">
				<input type="text"     name="user" class="in" id="tk" placeholder="Email hoặc số điện thoại"><br><br>
				<input type="password" name="pw"   class="in" id="mk" placeholder="Mật khẩu"><br><br>
				<div id="err"><?php echo $error; ?></div>
				<button type="submit" id="but" name="but">Đăng nhập</button>
				<br><br>
			</form>
		</fieldset>
	</body>
</html>