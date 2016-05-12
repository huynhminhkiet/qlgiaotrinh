<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

	<?php
		
		
		include('database.php');
		$idKhoa=$_POST['idKhoa'];
		
		
			$listIdHP=array();	
			$query="SELECT idHocPhan FROM `hocphan_tbl` WHERE idKhoa=".$idKhoa;
			
			$result=mysqli_query($link,$query);
								
			if (!$result) {
				echo 'Could not run query: ' . mysqli_error($link);
				exit;
			} else {
				while ( $row = mysqli_fetch_assoc($result) )
				{   
						$listIdHP[]=$row['idHocPhan'];
						echo $row['idHocPhan'];
				}										
			}
			
			$a= sizeOf($listIdHP);
			
			if($a>0){
				$sql="DELETE  FROM `giaotrinh_tbl` WHERE  ";
				for ($i = 0; $i <$a; $i++){
					if($i==0){
						$sql=$sql." idHocPhan=".$listIdHP[$i];
					}else{
						$sql=$sql." or idHocPhan=".$listIdHP[$i];
					}
				}
				
				$result = mysqli_query($link,$sql);
				if(!$result){
					echo "Không thểthực hiện được câu lệnh SQL1:".mysqli_error($link); 
					exit();
				}
			}
			$sql2 ="DELETE FROM `hocphan_tbl` WHERE idKhoa=".$idKhoa.";";
			
			$result = mysqli_query($link,$sql2);
			if(!$result){
				echo "Không thểthực hiện được câu lệnh SQL2:".mysqli_error($link); 
				exit();
			}
			$sql3="DELETE FROM `khoa_tbl` WHERE idKhoa=".$idKhoa;
			$result = mysqli_query($link,$sql3);
			if(!$result){
				echo "Không thểthực hiện được câu lệnh SQL3:".mysqli_error($link); 
				exit();
			}else{
				
				$msg="Bạn đã xóa khoa mã ".$idKhoa." và các giáo trình thuộc khoa trên thành công";
				include_once 'admin_danhSachKhoa.php';	
			}
			
			
			
	?>

