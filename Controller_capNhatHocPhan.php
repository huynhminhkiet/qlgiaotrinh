<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

		<?php
			
			include("checkSessionLogin.php");
			include('database.php');
			if(!isset($_POST['capNhatHocPhan'])){
				header("Location: Controller_danhSachHocPhan.php");
				exit;
			}
			$idHP=$_POST['idHocPhan'];
		    $ten=$_POST['tenHocPhan'];
			$idKhoa=$_POST['khoa'];
			$ky=$_POST['ky'];
									
			$sql = "UPDATE `hocphan_tbl` SET `tenHocPhan`='".$ten."',`idKhoa`=".$idKhoa.",`ky`=".$ky." WHERE `idHocPhan`=".$idHP; 
			$result = mysqli_query($link,$sql); 
			//đổi password của admin 
			if ( !$result ) {
				echo "Không thểthực hiện được câu lệnh SQL:".mysqli_error($link); 
			
			}else{
				$msg="Bạn đã cập nhật thông tin học phần mã ".$idHP." thành công";
				include_once 'admin_danhSachHocPhan.php';
			}
		?>
		
		