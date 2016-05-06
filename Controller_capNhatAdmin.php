<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

		<?php 
			include('database.php');
			$id=$_POST['idAdmin'];
		    $ten=$_POST['ten'];
			$user=$_POST['tenDangNhap'];
			$pass=$_POST['matKhau'];						
			//allAdmin
			
			$query="SELECT * FROM `admin_tbl` WHERE tenDangNhap='".$user."' and idAdmin<>".$id;
			$result1=mysqli_query($link,$query);
									
			if (!$result1) {
				echo 'Could not run query: ' . mysqli_error($link);
				exit;
			} else {
					$row = mysqli_fetch_assoc($result1); 
					if($row!=null){
						$msg ="Tên đăng nhập của bạn bị trùng";
						include_once 'admin_capNhatAdmin.php';
					}else{
						$sql = "UPDATE `admin_tbl` SET `tenAdmin`='".$ten."',`tenDangNhap`='".$user."',`matKhau`='".$pass."' WHERE `idAdmin`=".$id; 
						echo $sql;
						$result = mysqli_query($link,$sql); 
						//đổi password của admin 
						if ( !$result ) {
							echo "Không thểthực hiện được câu lệnh SQL:".mysqli_error($link); 
						
						}else{
							$msg ="Bạn đã cập nhật admin mã ".$id." thành công";
							include_once 'admin_danhSachAdmin.php';
						}
					}
			}	
							
			// allAdmin-end
			
		
		?>
		
		