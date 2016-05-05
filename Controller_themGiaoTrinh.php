	<?php 
		$linkdb = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
		mysqli_select_db($linkdb ,"quanlygiaotrinh");
		$tenGT=$_POST['tenGiaoTrinh'];
		$idHP=$_POST['hocPhan'];
		$ngay=$_POST['ngayTao'];
		$moTa=$_POST['moTa'];
		$tacGia=$_POST['tacGia'];
		$link=$_POST['link'];
		echo $ngay;
		$query="INSERT INTO `giaotrinh_tbl`(`idHocPhan`, `idAdmin`, `ngayTao`, `tenGiaoTrinh`, `tacGia`, `moTa`, `link`) VALUES (".$idHP.",2,'".$ngay."','".$tenGT."','".$tacGia."','".$moTa."','".$link."')";
		echo $query;
		$result = mysqli_query($linkdb ,$query); 
		if ( !$result ) {
			echo "Không thểthực hiện được câu lệnh SQL:".mysqli_error($linkdb ); 
			
		}else{
			header('location:admin_danhSachGiaoTrinh.php');
		}
	
	?>

