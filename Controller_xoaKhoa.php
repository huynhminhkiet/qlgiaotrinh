	<?php 
		$link = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
		mysqli_select_db($link,"qlgiaotrinh");
		$idKhoa=$_GET['id'];
		$sql = "DELETE FROM `khoa_tbl` WHERE idKhoa=".$idKhoa; 
		$result = mysqli_query($link,$sql);
		//xoáhết tất cảcác account 
		if ( !$result ) {
			echo "Không thểthực hiện được câu lệnh SQL:".mysqli_error($link); 
			
		}else{
			header('location:admin_danhSachKhoa.php');
		}
	?>

