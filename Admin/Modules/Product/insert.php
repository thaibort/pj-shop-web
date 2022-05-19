<?php  
	$page = $_GET['page'];
	$kw = "";
	if (isset($_POST['but'])) {

		//lấy dữ liệu nhập
		$name = $_POST['name'];
		$pri = $_POST['pri'];
		$des = $_POST['des'];
		$stt = $_POST['stt'];
		$brand = $_POST['brand'];
		$type = $_POST['type'];

		//lưu ảnh lên mysql
		if (isset($_FILES['pic'])) {
			$pic = $_FILES['pic'];
			$folder = "../Public/image/";
			$path = $folder.$pic['name'];
			move_uploaded_file($pic['tmp_name'],$path);
			$img = $pic['name'];


			//câu lệnh sql
			$sql = "INSERT into product values (null,'$name','$path','$pri','$des','$stt','$brand','$type')";
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
	}
?>
<?php  
	$title = "Thêm sản phẩm";
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
		var name = vname.value;
		var vpri = document.getElementById('pri1');
		var pri = vpri.value;
		// var vdess = document.getElementById('dess1');
		// var dess = vdess.value;

		var dess = document.getElementsByClassName("dess2")[0].className;
		var vfile = document.getElementById('file1');
		var file = vfile.value;
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
		else if (file == "") {
			alert('Không để trống ảnh');
			return false;
		}
		else {
			return true;
		}
	}
</script>
<div>
	<h1>Thêm sản phẩm</h1>
	<form method="POST" onsubmit="return kta()" enctype="multipart/form-data">
		<div id="left">
			<div>
				<h3>Tên sản phẩm : </h3>
				<input type="text" id="name1" name="name" >
			</div>
			<br>


			<div>
				<h3>Giá : </h3>
				<input type="text" id="pri1" name="pri" >
			</div>
			<br>

			<!-- Tình trạng -->
			<div>
				<h3>Tình trạng : </h3>
				<select name="stt" id="" >
					<option value="1">Có hàng</option>
					<option value="2">Sắp có</option>
					<option value="0">Hết hàng</option>
					<option value="3">Ngừng kinh doanh</option>
				</select>
			</div>
			<br>

			<!-- Hãng	 -->
			<label style="display: none;">
				<h3>Hãng : </h3>
				<select name="brand" id="" >
					<?php  
						$sql = "SELECT * from brand";
						$rs1 = mysqli_query($conn,$sql);
						if (!$rs1) {
							echo 'Lỗi: '.mysqli_error($conn);
						}
						else if (mysqli_num_rows($rs1) > 0) {
							foreach ($rs1 as $row) {
								$idbr = $row['id'];
								echo "<option value='$idbr'>";
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
				<select name="type" id="" >
					<?php  
						$sql = "SELECT * from type";
						$rs = mysqli_query($conn,$sql);
						if (!$rs) {
							echo 'Lỗi: '.mysqli_error($conn);
						}
						else if (mysqli_num_rows($rs) > 0) {
							foreach ($rs as $row) {
								$idty = $row['id'];
								echo "<option value='$idty'>";
									echo $row['name_type'];
								echo "</option>";
							}
						}
					?>
				</select>
			</label>

			<!-- Mô tả -->
			<div>
				<h3>Mô tả :</h3>
				<textarea name="des" id="dess1" class="dess2"></textarea>
				<script>
			        ClassicEditor
			            .create( document.querySelector( '#dess1' ) )
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
				<label>
					<h3>Ảnh : </h3>
					<img src="image/add.png" id="img"><br><br>
					<input type="file" id="file1" onchange="kt()" name="pic" accept="image/*" >
				</label>
			</div>
		</div>
		<br><br><br><br>
		<button name="but" id="nut"><i class="fa fa-plus-circle"> Thêm</i></button>
	</form>
</div>
<?php  
	require_once 'layout/bot.php';
?>