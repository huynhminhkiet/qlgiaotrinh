	<?php 
		$link = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
		mysqli_select_db($link,"quanlygiaotrinh");
		$id=$_GET['id'];
		$sql = "DELETE FROM `admin_tbl` WHERE idAdmin=".$id; 
		$result = mysqli_query($link,$sql);
		//xoáhết tất cảcác account 
		if ( !$result ) {
			echo "Không thểthực hiện được câu lệnh SQL:".mysqli_error($link); 
			
		}else{
			header('location:admin_danhSachAdmin.php');
		}
	?>

