<?php  
	$name = $kw = "";
	$sql = "SELECT * from type";
	if (isset($_POST['nut'])) {
		//Gán biến
		$name = $_POST['name'];

		//Kết nối SQL
		$sql1 = "INSERT into type values (null,'$name')";
		$result = mysqli_query($conn,$sql1);
		if (!$result) {
			echo '<script type="text/javascript"> alert("Loại đã tồn tại"); </script>';	
		}	
		else {
			header("location:index.php?module=type&action=type");
			mysqli_close($conn);
		}
	}
	$rs = mysqli_query($conn,$sql);
?>
<?php  
	$title = "Quản lí loại";
	require_once 'layout/top.php';
?>
<style type="text/css">
	#menu4 a{
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
	#brand{
		width: 100%;
	}
	fieldset{
		width: 300px;
		height: 110px;
		margin: auto;
		background: lightgrey;
		padding: 0 0 10px 0;
		border: 2px solid black;
	}
	#br{
		width: 150px;
		height: 20px;     
        outline: 0;     
        outline-style: none;     
        outline-width: 0;
        padding-left: 10px;
	}
	h3{
		font-weight: bold;
		font-size: larger;
	}
	table{
		width: 80%;
		margin: auto;
		margin-top: 50px;
		margin-bottom: 30px;
		text-align: center;
	}
	.c1{
		width: 60%;
		height: 50px;
		background: lawngreen;
	}
	#taga{
		text-decoration: none;
		color: royalblue;
		font-weight: bold;
	}
	#taga:hover{
		color: darkblue;
	}
	#taga2{
		text-decoration: none;
		color: indianred;
		font-weight: bold;
	}
	#taga2:hover{
		color: darkred;
	}
	tr{
		height: 30px;
	}
	td{
		height: 30px;
	}
	#nut{
		background: none;
		width: 50px;
		height: 50px;
		border: none;
        outline: 0;     
        outline-style: none;     
        outline-width: 0;
        position: relative;
        top: -20px;
	}
	#them{
		font-size: 30px;
		color: forestgreen;
	}
	#them:hover{
		color: lawngreen;
		font-size: 40px;
		transition: ease-in 0.2s;
	}
</style>
<script type="text/javascript">
	function ktl() {
		var vty = document.getElementById('br');
		var ty = vty.value.trim();
		if (ty == "") {
			alert('Không để trống thông tin');
			return false;
			vty = focus();
		}
		else {
			return true;
		}
	}
</script>
<?php  
	if (isset($_GET['err'])) {
		echo '<script type="text/javascript">';
			echo "alert('không thể xóa');";
		echo '</script>';
	}
?>
<div id="brand">
	<h1>Quản lí loại</h1><br>

	<!-- Thêm loại -->
	<fieldset>
		<h3>Thêm loại sản phẩm</h3><br>
		<form method="POST" onsubmit="return ktl()">
			<input type="text" placeholder="Tên loại..." id="br" name="name"><br><br>
			<button type="submit" id="nut" name="nut"><i id="them" class="fa fa-plus-circle"></i></button><br>
		</form>
	</fieldset> 

	<!-- Danh sách loại -->
	<table border="1px" cellspacing="0" cellpadding="0">
		<tr>
			<th class="c1">Tên Loại</th>
			<th class="c1">Chỉnh Sửa</th>
		</tr>
		<?php  
		if (!$rs) {
			echo 'Lỗi: '.mysqli_error($conn);
		}
		else {
			if (mysqli_num_rows($rs) == 0) {
				echo 'Danh sách rỗng';
			}
			else {
				foreach ($rs as $row) {
					$id = $row['id'];
					$name = $row['name_type'];
					echo '<tr>';
						echo '<td>'.$name.'</td>';
						echo '<td>';
							echo '<a id="taga" href="index.php?module=type&action=edit&id='.$id.'&name='.$name.'"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>';
							echo '&nbsp;&nbsp;&nbsp;&nbsp;';
							echo '||';
							echo '&nbsp;&nbsp;&nbsp;&nbsp;';
							echo '<a id="taga2" href="index.php?id='.$id.'&module=type&action=delete"><i class="fa fa-trash"></i>&nbsp;&nbsp;Delete</a>';
						echo '</td>';
					echo '</tr>';
				}
			}
		}
		?>
	</table>
</div>
<?php
	require_once 'layout/bot.php';
?>