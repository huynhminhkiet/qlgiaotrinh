<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

	<?php
		
		include("checkSessionLogin.php");
		include('database.php');
		$id=$_POST['idGT'];
		if(!isset($_POST['idGT'])){
			header("Location: Controller_danhSachGiaoTrinh.php");
			exit;
		}
		$sql = "DELETE FROM `giaotrinh_tbl` WHERE idGiaoTrinh=".$id; 
		
		$result = mysqli_query($link,$sql);
		//xoáhết tất cảcác account 
		if ( !$result ) {
			echo "Không thểthực hiện được câu lệnh SQL:".mysqli_error($link); 
			
		}else{
			$msg ="Bạn đã xóa giáo trình mã ".$id." thành công";
			include_once 'admin_danhSachGiaoTrinh.php';
		}
	?>

