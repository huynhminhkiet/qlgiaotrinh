<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

	<?php 
		include('database.php');
		$idKhoa=$_GET['id'];
		$sql = "DELETE FROM `khoa_tbl` WHERE idKhoa=".$idKhoa; 
		$result = mysqli_query($link,$sql);
		//xoáhết tất cảcác account 
		if ( !$result ) {
			echo "Không thểthực hiện được câu lệnh SQL:".mysqli_error($link); 
			
		}else{
			$msg ="Bạn đã xóa khoa mã ".$idKhoa." thành công";
				include_once 'admin_danhSachKhoa.php';
		}
	?>

