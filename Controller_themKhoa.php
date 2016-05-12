<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

	<?php
		
		include("checkSessionLogin.php");
		include('database.php');
		
		if(!isset($_POST['themKhoa'])){

			header("Location:admin_themKhoa.php");


			header("Location:Controller_danhSachKhoa.php");
			exit;

		}else{
			$tenKhoa=$_POST['tenKhoa'];
			$query="INSERT INTO `khoa_tbl`( `tenKhoa`) VALUES ('".$tenKhoa."')";
			$result = mysqli_query($link,$query); 
			if ( !$result ) {
				echo "Không thểthực hiện được câu lệnh SQL:".mysqli_error($link); 
				
			}else{
				$msg ="Bạn đã thêm khoa thành công";
					include_once 'admin_danhSachKhoa.php';
			}
		}
	?>

