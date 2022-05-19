<?php  
	if (isset($_POST['check'])) {
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$add = $_POST['add'];
		$total = $_GET['total'];
		$id_ct = $_SESSION['user']['id'];
		$a = date('Y-m-d H:i:s');

		$sql = "INSERT into invoices values (null,'$total',0,'$add','$phone','$a',null,'$id_ct','$name')";
		$rs = mysqli_query($conn,$sql);
		if (!$rs) {
			echo 'Lỗi: '.mysqli_error($conn);
		}
		else {
			$id_iv = mysqli_insert_id($conn);
			foreach ($_SESSION['cart'] as $id_pd => $qtt1) {
				$sql = "INSERT into invoices_details values ($id_iv,$id_pd,$qtt1)";
				$rs1 = mysqli_query($conn,$sql);
				if (!$rs1) {
					echo 'Lỗi: '.mysqli_error($conn);
				}
			}
			unset($_SESSION['cart']);
		}
	}
?>
<?php  
	$title = "Thanh toán";
	require_once 'layout/top.php'; 
?>
<div>
	<h1>
		Đặt hàng thành công mã đơn hàng của bạn là #<?php echo $id_iv; ?>
	</h1>
	<br>
	<a href="index.php?module=invoice&action=detail&id=<?php echo $id_iv; ?>"> Xem đơn hàng của bạn</a>
</div>
<?php  require_once 'layout/bottom.php'; ?>
