<?php  
	$id = $name = $pri = $pic = $kw = $des = $stt = $brand = $type = "";
	$page = $_GET['page'];
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "SELECT * from product where id = '$id'";
		$rs = mysqli_query($conn,$sql);
		if (!$rs) {
			echo 'Lỗi: '.mysqli_error($conn);
		}
		else if (mysqli_num_rows($rs) > 0) {
			$row = mysqli_fetch_assoc($rs);
			$name = $row['name'];
			$path = $row['pic'];
			$pri = $row['pri'];
			$type = $row['id_type'];
			$brand = $row['id_brand'];
			$stt = $row['status'];
			$des = $row['dess'];
		}
		else {
			header("location:index.php?module=Product&action=list&page=$page");
		}
	}

	if (isset($_POST['but'])) {

		//lấy dữ liệu nhập
		$name = $_POST['name'];
		$pri = $_POST['pri'];
		$des = $_POST['des'];
		$stt = $_POST['stt'];
		$brand = $_POST['brand'];
		$type = $_POST['type'];

		//lưu ảnh lên mysql
		if ($_FILES['pic']['size'] > 0) {
			$pic = $_FILES['pic']	;
			$folder = "../Public/image/";
			$path = $folder.$pic['name'];
			move_uploaded_file($pic['tmp_name'],$path);
		}


		//câu lệnh sql
		$sql = "UPDATE product set name = '$name', pic = '$path', pri = '$pri', dess = '$des', status = '$stt', id_brand = '$brand', id_type = '$type' where id = '$id'";
		$rs = mysqli_query($conn,$sql);


		//Kiểm tra kết nối
		if ($rs) {
			header("location:index.php?module=Product&action=list&page=$page");
			mysqli_close($conn);
		}
		else {
			echo 'Lỗi'.mysqli_error($conn);
			mysqli_close($conn);
		}
	}
?>
<?php  
	$title = "Sửa sản phẩm";
	require_once 'layout/top.php';
?>
<style type="text/css">
	#menu1 a{
		background: darkolivegreen;
		color: floralwhite;
		border-left: 2px solid red;
		font-size: large;
	}
	#menu3:hover {
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
	.fa{
		font-size: 50px;
	}
	form{
		/* text-align: left; */
		width: 90%;
		margin: auto;
	}
	input{
		height: 30px;
		font-size: larger;
	}
	textarea {
	 	resize: none;
	}
	#img{
		width: 200px;
		height: 200px;
		border: 1px solid black;
		background: floralwhite;
	}
	#left{
		width: 50%;
		float: left;
		text-align: left;
		position: relative;
		top: 50px;
	}
	#right{
		width: 50%;
		float: left;
		text-align: left;
		position: relative;
		top: 50px;		
	}
	#nut{
		margin-right: 80px;
		margin-top: 120px;
		background: none;
		border: none;
		outline: 0;     
        outline-style: none;     
        outline-width: 0;
	}
	#nut:hover{
		color: orangered;
	}
	input[type='file'] {
		outline-style: none;
		width: 94px;
		height: 28px;
		border-radius: 3px;
	}
</style>
<script type="text/javascript">
	function kt(){
		// Gan bien -> view HTML
		let vAvatar = document.getElementById('img');
		let vFile = document.getElementById('file1');
		let url = URL.createObjectURL(vFile.files[0]);
		vAvatar.src = url;
	}
	function kta() {
		var vname = document.getElementById('name1');
		var name = vname.value.trim();
		var vpri = document.getElementById('pri1');
		var pri = vpri.value.trim();
		var dess = document.getElementsByClassName("dess2")[0].className;
		if (name == "") {
			alert('Không để trống tên sản phẩm');
			vname = focus();
			return false;
		}
		else if (pri == "") {
			alert('Không để trống giá');
			vpri = focus();
			return false;
		}
		else if (dess == "") {
			alert('Không để trống mô tả sản phẩm');
			vdess = focus();
			return false;
		}
		else {
			return true;
		}
	}
</script>
<div>
	<h1>Chỉnh sửa</h1>
	<form method="POST" onsubmit="return kta()" enctype="multipart/form-data">
		<div id="left">
			<div>
				<h3>Tên sản phẩm : </h3>
				<input type="text" id="name1" name="name" value="<?php echo $name ?>">
			</div>
			<br>
			<div>
				<h3>Giá : </h3>
				<input type="text" id="pri1" name="pri" value="<?php echo $pri ?>">
			</div>
			<br>

			<!-- Tình trạng -->
			<div>
				<h3>Tình trạng : </h3>
				<select name="stt" id="">
					<option value="1" <?php if ($stt == 1) echo 'selected'; ?>>Có hàng</option>
					<option value="2" <?php if ($stt == 2) echo 'selected'; ?>>Sắp có</option>
					<option value="0" <?php if ($stt == 0) echo 'selected'; ?>>Hết hàng</option>
					<option value="3" <?php if ($stt == 3) echo 'selected'; ?>>Ngừng kinh doanh</option>
				</select>
			</div>
			<br>

			<!-- Hãng	 -->
			<label style="display: none;">
				<h3>Hãng : </h3>
				<select name="brand" id="">
					<?php  
						$sql = "SELECT * from brand";
						$rs1 = mysqli_query($conn,$sql);
						if (!$rs1) {
							echo 'Lỗi: '.mysqli_error($conn);
						}
						else if (mysqli_num_rows($rs1) > 0) {
							foreach ($rs1 as $row) {
								$idbr = $row['id'];
								if ($idbr == $brand) {
									$selected = "selected";
								}
								else {
									$selected = "";
								}
								echo "<option value='$idbr' $selected>";
									echo $row['name_brand'];
								echo "</option>";
							}
						}
					?>
				</select>
			</label>	

			<!-- Loại -->
			<label>
				<h3>Loại : </h3>
				<select name="type" id="">
					<?php  
						$sql = "SELECT * from type";
						$rs = mysqli_query($conn,$sql);
						if (!$rs) {
							echo 'Lỗi: '.mysqli_error($conn);
						}
						else if (mysqli_num_rows($rs1) > 0) {
							foreach ($rs as $row) {
								$idty = $row['id'];
								if ($idty == $type) {
									$selected = "selected";
								}
								else {
									$selected = "";
								}
								echo "<option value='$idty' $selected>";
									echo $row['name_type'];
								echo "</option>";
							}
						}
					?>
				</select>
			</label>
			<br><br>

			<!-- Mô tả -->
			<div>
				<h3>Mô tả :</h3>
				<textarea name="des" id="editor" class="dess2"><?php echo $des; ?></textarea>
				<script>
			        ClassicEditor
			            .create( document.querySelector( '#editor' ) )
			            .catch( error => {
			                console.error( error );
			            } );
			    </script>
			</div>
		</div>

		<div id="right">
			<br>

			<!-- Ảnh -->
			<div>
				<h3>Ảnh : </h3>
				<img src="<?php echo $path ?>" id="img"><br><br>
				<input type="file" id="file1" onchange="kt()" name="pic" accept="image/*">
			</div>
		</div>
		<br><br><br><br>
		<button name="but" id="nut"><i class="fa fa-check">&nbsp;Lưu</i></button>
	</form>
</div>
<?php  
	require_once 'layout/bot.php';
?>
