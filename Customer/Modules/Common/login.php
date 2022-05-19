<?php  
	$error = $name = $pw = "";
	if (isset($_SESSION['user'])) {
		header("location:index.php");
	}

	if (isset($_POST['but'])) {
		$name = $_POST['user'];
		$pw = $_POST['pw'];
		$pw1 = md5($pw);


		$sql = "SELECT id, name_customer from customer where (phone = '$name' or email = '$name') and pass = '$pw1'";
		$rs = mysqli_query($conn,$sql);
		if (!$rs) {
			$error = mysqli_error($conn);
			mysqli_close($conn);
		}
		else {
			if (mysqli_num_rows($rs) == 0) {
				$error = 'Tài khoản hoặc mật khẩu không đúng';
			}
			else {
				$row = mysqli_fetch_assoc($rs);
				$_SESSION['user']['name'] = $row['name_customer'];
				$_SESSION['user']['id']   = $row['id'];
				if (isset($_GET['di'])) {
					header("location:index.php?module=invoice&action=cart");
				}
				else {
					header("location:index.php");
				}
			}
		} 
	}
?>
<?php  
	$title = "Đăng nhập";
	require_once 'top.php';
?>
<script type="text/javascript">
	function kt() {
		var vuser = document.getElementById('user');
		var user = vuser.value;
		var vpw = document.getElementById('pw');
		var pw = vpw.value;
		var verr = document.getElementById('err');
		if (user == "" || pw == "") {
			verr.innerHTML = "Không được để trống thông tin";
			return false;
		}
		else{
			return true;
		}
	}
</script>
<div id="content1" class="content">
	<h2 class="td">Đăng nhập</h2><br>
	<form method="POST" onsubmit="return kt()">
		<div class="in">
			<input type="text"     name="user" id="user" placeholder="Số điện thoại hoặc email" value="<?php echo $name ?>" >
		</div>
		<br>
		<div class="in">
			<input type="password" name="pw"   id="pw" placeholder="Mật khẩu">
		</div>
		<br>

		<button type="submit" name="but">Đăng nhập</button>
	</form>
	<div id="err"><?php echo $error; ?></div>
	<div class="aa">
		<p class="lin">
			nếu bạn chưa có tài khoản hãy
			<a href="index.php?module=Common&action=register" class="dndk">
				Đăng kí
			</a>
		</p>
		<br>
<?php require_once 'bot.php'; ?>