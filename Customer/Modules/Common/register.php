<?php  
	$error = "";
	$name = $email = $add = $pw = $phone = "";
	if (isset($_POST['but'])) {
		$name  = $_POST['name'];
		$phone = $_POST['phone'];
		$pw    = $_POST['pw'];
		$email = $_POST['email'];
		$add   = $_POST['add'];

		$pw = md5($pw);

		require_once 'config/connect.php';

		$sql = "INSERT into customer values (null,'$name','$phone','$email','$add','$pw')";

		$rs  = mysqli_query($conn,$sql);

		if (!$rs) {
			$error = "Số điện thoại hoặc Email đã tồn tại";
		}
		else {
			header("location:index.php?module=Common&action=login");
		}
	}
?>
<?php  
	$title = "Đăng kí";
	require_once 'top.php';
?>
<script type="text/javascript">
	function kt() {
		var vname = document.getElementById('name');
		var name = vname.value;
		var vphone = document.getElementById('phone');
		var phone = vphone.value;
		var vemail = document.getElementById('email');
		var email = vemail.value;
		var vadd = document.getElementById('add');
		var add = vadd.value;
		var vpw = document.getElementById('pw');
		var pw = vpw.value;
		var verr = document.getElementById('err');
		if (name == "" || phone == "" || email == "" || add == "" || pw == "") {
			verr.innerHTML = "Không được để trống thông tin";
			return false;
		}
		else{
			return true;
		}
	}
</script>
<div id="content2" class="content">
	<p class="td">Đăng kí</p><br>
	<form method="POST" onsubmit="return kt()">
		<div class="in">
			<input type="text"     placeholder="Tên"           name="name"  value="<?php echo $name ; ?>"  id="name">         
		</div>
		<br>
		<div class="in">
			<input type="text"     placeholder="Số điện thoại" name="phone" value="<?php echo $phone ; ?>" id="phone">
		</div>
		<br>
		<div class="in">
			<input type="email"    placeholder="Email"         name="email" value="<?php echo $email ; ?>" id="email">
		</div>
		<br>
		<div class="in">
			<input type="text"     placeholder="Địa chỉ"       name="add"   value="<?php echo $add ; ?>"   id="add">
		</div>
		<br>
		<div class="in">
			<input type="password" placeholder="Mật khẩu"      name="pw"    id="pw">   
		</div>
		<br>

		<button type="submit" name="but">Đăng kí</button>
	</form>
	<div id="err"><?php echo $error; ?></div>
	<div class="aa">
	<p class="lin">
		nếu bạn có tài khoản hãy
		<a href="index.php?module=Common&action=login" class="dndk">
			Đăng nhập
		</a>
	</p>
	<br>
<?php require_once 'bot.php'; ?>