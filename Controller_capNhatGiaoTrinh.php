<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

		<?php 
			include('header-admin.php');
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
				header('location:admin_danhSachHocPhan.php');
			}
		?>
		
		