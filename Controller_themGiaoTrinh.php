<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
		
	<?php 
		
		include("checkSessionLogin.php");
		include('database.php');
		if(!isset($_POST['themGiaoTrinh'])){
			header("Location: Controller_danhSachGiaoTrinh.php");
			exit;
		}
		$tenGT=$_POST['tenGiaoTrinh'];
		$idHP=$_POST['hocPhan'];
		$ngay=$_POST['ngayTao'];
		$moTa=$_POST['moTa'];
		
		$tacGia=$_POST['tacGia'];
		$linkd=$_POST['link'];
	
		$query="INSERT INTO `giaotrinh_tbl`(`idHocPhan`, `idAdmin`, `ngayTao`, `tenGiaoTrinh`, `tacGia`, `moTa`, `link`) VALUES (".$idHP.",".$_SESSION['id'].",'".$ngay."','".$tenGT."','".$tacGia."','".$moTa."','".$linkd."')";
		
		$result = mysqli_query($link ,$query); 
		if ( !$result ) {
			echo "Không thểthực hiện được câu lệnh SQL:".mysqli_error($link ); 
			
		}else{
			$msg ="Bạn đã thêm giáo trình thành công";
			include_once 'admin_danhSachGiaoTrinh.php';
		}
	
	?>

