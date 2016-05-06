<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

		<?php 
			include('header-admin.php');
			$id=$_POST['idKhoa'];
		    $ten=$_POST['tenKhoa'];
									
			$sql = "UPDATE `khoa_tbl` SET `tenKhoa`='".$ten."' WHERE `idKhoa`=".$id; 
			$result = mysqli_query($link,$sql); 
			//đổi password của admin 
			if ( !$result ) {
				echo "Không thểthực hiện được câu lệnh SQL:".mysqli_error($link); 
			
			}else{
				
				header("Controller_danhSachKhoa.php")	;
								
			}
		?>
		
		