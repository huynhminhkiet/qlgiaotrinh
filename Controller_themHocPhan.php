<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

	<?php 
		include('database.php');
		$tenHP=$_POST['tenHocPhan'];
		$idKhoa=$_POST['khoa'];
		$ky=$_POST['ky'];
		$query="INSERT INTO `hocphan_tbl`( `idKhoa`, `tenHocPhan`, `ky`) VALUES (".$idKhoa.",'".$tenHP."',".$ky.")";
		$result = mysqli_query($link,$query); 
		if ( !$result ) {
			echo "Không thểthực hiện được câu lệnh SQL:".mysqli_error($link); 
			
		}else{
			$msg="Bạn đã thêm học phần thành công";
				include_once 'admin_danhSachHocPhan.php';
		}
	
	?>

