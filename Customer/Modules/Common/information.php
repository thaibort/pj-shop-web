<?php  
	$id_us = $_SESSION['user']['id'];
	$name1 = $phone1 = $email1 = $add1 = "";
	$sql = "SELECT * from customer where id = '$id_us'";
	$rs = mysqli_query($conn,$sql);
	if (!$rs) {
		echo 'Lỗi: '.mysqli_error($conn);
	}
	else {
		$row = mysqli_fetch_assoc($rs);
		$name2  = $row['name_customer'];
		$phone = $row['phone'];
		$email = $row['email'];
		$add   = $row['addr'];
	}
	if (isset($_POST['but'])) {
		$name1 = $_POST['name'];
		$phone1 = $_POST['phone'];
		$email1 = $_POST['email'];
		$add1 = $_POST['add'];
		$sql = "UPDATE customer set name_customer = '$name1', phone = '$phone1', email = '$email1', addr = '$add' where id = '$id_us'";
		$rs1 = mysqli_query($conn,$sql);
		if (!$rs1) {
			echo 'Lỗi: '.mysqli_error($conn);
		}
		else {
			header("location:index.php?module=Common&action=information");
		}
	}
?>
<?php  
	$title = "Thông tin cá nhân";
	require_once 'layout/top.php'; 
?>
<style type="text/css">
	#content1{
		width:55%;
		background: white;
		float: left;
		text-align: center;
	}
	#li1{
		color: red;
	}
	textarea{
	 	resize: none;
	 	background: white;
	 	font-size: larger;
	 	font-weight: bolder;
	 	border: none;
	 	margin-top: 6px;
        outline-style: none;     
        outline-width: 0;
        width: 470px;
	}
	.cl{
		text-align: right;
	}
	.cr{
		text-align: left;
	}
	#nut{
		float: left;
		width: 100px;
		height: 40px;
		background: #353922;
		border: none;
		color: white;
		transition: 0.3s;
	}
	#nut:hover{
		background: lawngreen;
		color: black;
	}
	#tb{
		margin: auto;
	}
	.inp{
		width: 500px;
		height: 30px;
		text-align: center;
		border: 1px solid black;
	}
	.in{
		border: none;
		width: 470px;
        outline-style: none;     
        outline-width: 0;
        font-size: larger;
        margin-top: 3px;
	}
	#dc{
		width: 500px;
		height: 70px;
		text-align: center;
		border: 1px solid black;
	}
</style>
<br>
<h1>Thông tin cá nhân</h1>
<?php require_once 'layout/font.php'; ?>
<br><br>
<div id="content1">
	<form method="POST">
		<br><br>
		<table cellpadding="0" cellspacing="20" id="tb" >
			<tr>
				<td class="cl">
					Tên
				</td>
				<td class="cr">
					<div class="inp">
						<input type="text" name="name"  class="in" id="" value="<?php echo $name2 ; ?>">
					</div>
				</td>
			</tr>
			<tr>
				<td class="cl">
					Email
				</td>
				<td class="cr">
					<div class="inp">
						<input type="email" name="email" class="in" id="" value=" <?php echo $email ; ?> ">
					</div>
				</td>
			</tr>
			<tr>
				<td class="cl">
					Số điện thoại
				</td>
				<td class="cr">
					<div class="inp">
						<input type="text" name="phone"  class="in" id="" value="<?php echo trim($phone) ; ?>">
					</div>
				</td>
			</tr>
			<tr>
				<td class="cl">
					Địa chỉ
				</td>
				<td class="cr">
					<div id="dc">
						<textarea name="add" cols="50" rows="3"><?php echo $add ; ?></textarea>
					</div>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>	
					<button type="submit" id="nut" name="but">Lưu</button>
				</td>
			</tr>
		</table>
		<br><br>
	</form>
</div>
<?php  require_once 'layout/bottom.php'; ?>