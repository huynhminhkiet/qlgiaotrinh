<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

		<?php
			
			include("checkSessionLogin.php");
			include('database.php');
			if(!isset($_POST['capNhatKhoa'])){
				header("Location: Controller_danhSachKhoa.php");
				exit;
			}
			$id=$_POST['idKhoa'];
		    $ten=$_POST['tenKhoa'];
									
			$sql = "UPDATE khoa_tbl SET tenKhoa='".$ten."' WHERE idKhoa=".$id; 
			$result = mysqli_query($link,$sql); 
			//đổi password của admin 
			if ( !$result ) {
				echo "Không thểthực hiện được câu lệnh SQL:".mysqli_error($link); 
			
			}else{
				$msg ="Bạn đã cập nhật khoa mã ".$id." thành công";
				include_once 'admin_danhSachKhoa.php';
				
								
			}
		?>
		
		