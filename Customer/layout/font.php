<style type="text/css">
	#font {
		width: 150px;
		display: inline;
		float: left;
		margin: 70px 90px;
	}
	.li{
		text-align: left;
		height: 30px;
		line-height: 30px;
	}
	.abc{
		margin-left: 30px;
		text-decoration: none;
		color: black;
	}
	.abc:hover{
		color: red;
	}
</style>
<div id="font">
	<ul>
		<li class="li">
			<?php echo $name; ?>
			<ul>
				<!-- <li class="li">
					<a class="abc" id="li1" href="index.php?module=Common&action=information">Thông tin cá nhân</a>				
				</li> -->
				<li class="li">
					<a class="abc" id="li2" href="index.php?module=invoice&action=history">Hóa đơn</a>
				</li>
			</ul>
		</li>
	</ul>
</div>