<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

	<?php
		
		include("checkSessionLogin.php");
		include('database.php');
		if(!isset($_POST['idAdmin'])){
			header("Location: Controller_danhSachAdmin.php");
			exit;
		}
		$id=$_POST['idAdmin'];
		$sql = "DELETE FROM `giaotrinh_tbl` WHERE idAdmin=".$id.";";
		$result = mysqli_query($link,$sql);
		if ( !$result ) {
			echo "Không thểthực hiện được câu lệnh SQL:".mysqli_error($link); 
			exit();
		}
		$sql ="DELETE FROM `admin_tbl` WHERE idAdmin=".$id; 
		$result = mysqli_query($link,$sql);
		if ( !$result ) {
			echo "Không thểthực hiện được câu lệnh SQL:".mysqli_error($link); 
			
		}else{
			$msg ="Bạn đã xóa admin mã ".$id." thành công";
			include_once 'admin_danhSachAdmin.php';
		}
	?>

