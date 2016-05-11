<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

	<?php
		
		
		include('database.php');
		$id=$_POST['idHP'];
		$sql ="DELETE FROM `giaotrinh_tbl` WHERE idHocPhan=".$id.";";
		
		
		$result = mysqli_query($link,$sql);
		//xoáhết tất cảcác account 
		if ( !$result ) {
			echo "Không thểthực hiện được câu lệnh SQL:".mysqli_error($link); 
			
		}else{
			$sql ="DELETE FROM `hocphan_tbl` WHERE idHocPhan=".$id.";";
			$rs = mysqli_query($link,$sql);
			if(!$rs){
				echo "Không thểthực hiện được câu lệnh SQL:".mysqli_error($link); 
			}else{
				$msg="Bạn đã xóa học phần mã ".$id." và các giáo trình thuộc học phần trên thành công";
				include_once 'admin_danhSachHocPhan.php';
			}
		}
		
	?>

