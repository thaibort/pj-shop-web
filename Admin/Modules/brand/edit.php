<?php  
	$kw = "";
	$id = $_GET['id'];
	$name = $_GET['name'];
	if (isset($_POST['nut'])) {
		$name = $_POST['name'];
		$sql = "UPDATE brand set name_brand = '$name' where id = '$id'";
		$rs = mysqli_query($conn,$sql);
		if ($rs) {
			header("location:index.php?module=brand&action=brand");
			mysqli_close($conn);
		}
		else {
			echo 'Lỗi: '.mysqli_error($conn);
			mysqli_close($conn);
		}
	}
	$sql = "SELECT * from brand where id = '$id'";
	$rs1 = mysqli_query($conn,$sql);
	if (!$rs1) {
		echo 'Lỗi: '.mysqli_error($conn);
	}
	else {
		$row = mysqli_fetch_assoc($rs1);
		$name_brand = $row['name_brand'];
	}
?>
<?php  
	$title = "Chỉnh sửa hãng sản xuất";
	require_once 'layout/top.php';
?>
<style type="text/css">
	#menu3 a{
		background: darkolivegreen;
		color: floralwhite;
		border-left: 2px solid red;
		font-size: large;
	}
	#menu1:hover {
		border-left: 2px solid red;
		color: floralwhite;
		background: darkolivegreen;
		width: 100%;
		transition: ease-in 0.2s;
		-moz-transition: ease-in 0.2s;
		-webkit-transition: ease-in 0.2s;
		font-size: large;
	}
	#menu2:hover {
		border-left: 2px solid red;
		color: floralwhite;
		background: darkolivegreen;
		width: 100%;
		transition: ease-in 0.2s;
		-moz-transition: ease-in 0.2s;
		-webkit-transition: ease-in 0.2s;
		font-size: large;
	}
	#menu4:hover {
		border-left: 2px solid red;
		color: floralwhite;
		background: darkolivegreen;
		width: 100%;
		transition: ease-in 0.2s;
		-moz-transition: ease-in 0.2s;
		-webkit-transition: ease-in 0.2s;
		font-size: large;
	}
	fieldset{
		height: 200px;
		margin: auto;
		margin-bottom: 50px;
		background: dimgrey;
		padding: 0 0 10px 0;
		border: 2px solid black;
	}
	#in{
		width: 50%;
		height: 40px;
		font-size: large;
		position: relative;
		top: 30px;
		padding-left: 20px;
        outline: 0;     
        outline-style: none;     
        outline-width: 0;
	}
	#nut{
		position: relative;
		top: 50px;
		width: 50px;
		height: 30px;
	}
	#nut:hover{
		background: lightskyblue;
	}
	h2{
		color: whitesmoke;
	}
</style>
<script type="text/javascript">
	function ktl() {
		var vbr = document.getElementById('in');
		var br = vbr.value.trim();
		if (br == "") {
			alert('Không để trống thông tin');
			return false;
			vbr = focus();
		}
		else {
			return true;
		}
	}
</script>
<div>
	<h1 style ="text-align: center;">Sửa Hãng</h1><br><br>
	<fieldset style="text-align: center; width: 60%;margin: auto;">
			<form method="POST" onsubmit="return ktl()">
				<br>
				<h2>Tên cũ : <?php echo $name; ?></h2>
				<input type="text" id="in" name="name" value="<?php echo $name_brand ?>"><br><br>
				<button type="submit" id="nut" name="nut">Sửa</button>
			</form>	
	</fieldset>
</div>
<?php
	require_once 'layout/bot.php';
?>