	<?php 
		$link = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
		mysqli_select_db($link,"quanlygiaotrinh");
		$tenKhoa=$_POST['tenKhoa'];
		$query="INSERT INTO `khoa_tbl`( `tenKhoa`) VALUES ('".$tenKhoa."')";
		$result = mysqli_query($link,$query); 
		if ( !$result ) {
			echo "Không thểthực hiện được câu lệnh SQL:".mysqli_error($link); 
			
		}else{
			header('location:admin_danhSachKhoa.php');
		}
	?>

