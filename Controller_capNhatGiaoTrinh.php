<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

		<?php 
			
			include("checkSessionLogin.php");
			include('database.php');
			if(!isset($_POST['capNhatGiaoTrinh'])){
				header("Location: Controller_danhSachGiaoTrinh.php");
				exit;
			}
			$idGT=$_POST['idGT'];
			$tenGT=$_POST['tenGT'];
			$idHP=$_POST['hocPhan'];
			
			$moTa=$_POST['moTa'];
			$tacGia=$_POST['tacGia'];
			$linkD=$_POST['link'];
									
			$sql = "UPDATE `giaotrinh_tbl` SET `tenGiaoTrinh`='".$tenGT."',`idHocPhan`=".$idHP.",`moTa`='".$moTa."' ,`tacGia`='".$tacGia."',`link`='".$linkD."' WHERE `idGiaoTrinh`=".$idGT; 
			$result = mysqli_query($link,$sql); 
			
			//đổi password của admin 
			
			if ( !$result ) {
				echo "Không thểthực hiện được câu lệnh SQL:".mysqli_error($link); 
			
			}else{
				$msg ="Bạn đã cập nhật giao trình mã ".$idGT." thành công";
				include_once 'admin_danhSachGiaoTrinh.php';
			}
		?>
		
		