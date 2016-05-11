<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

	<?php
		
		
		include('database.php');
		$ten=$_POST['ten'];
		$tenDangNhap=$_POST['tenDangNhap'];
		$matKhau=$_POST['matKhau'];
		//allAdmin
			
			$query="SELECT * FROM `admin_tbl` WHERE tenDangNhap='".$tenDangNhap."'";
			$result1=mysqli_query($link,$query);
									
			if (!$result1) {
				echo 'Could not run query: ' . mysqli_error($link);
				exit;
			} else {
					$row = mysqli_fetch_assoc($result1); 
					if($row!=null){
						$msg ="Tên đăng nhập của bạn bị trùng";
						include_once 'admin_themAdmin.php';
					}else{
						$query="INSERT INTO `admin_tbl`(`tenAdmin`, `tenDangNhap`, `matKhau`) VALUES ('".$ten."','".$tenDangNhap."','".$matKhau."')";
						$result = mysqli_query($link,$query); 
						if ( !$result ) {
							echo "Không thểthực hiện được câu lệnh SQL:".mysqli_error($link); 
			
						}else{
							$msg ="Bạn đã thêm Admin thành công";
							include_once 'admin_danhSachAdmin.php';
						}
					}
			}		
		// allAdmin-end
		
		
	
	?>

