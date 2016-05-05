	<?php 
		$link = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
		mysqli_select_db($link,"quanlygiaotrinh");
		$tenHP=$_POST['tenHocPhan'];
		$idKhoa=$_POST['khoa'];
		$ky=$_POST['ky'];
		$query="INSERT INTO `hocphan_tbl`( `idKhoa`, `tenHocPhan`, `ky`) VALUES (".$idKhoa.",'".$tenHP."',".$ky.")";
		$result = mysqli_query($link,$query); 
		if ( !$result ) {
			echo "Không thểthực hiện được câu lệnh SQL:".mysqli_error($link); 
			
		}else{
			header('location:admin_danhSachHocPhan.php');
		}
	
	?>

