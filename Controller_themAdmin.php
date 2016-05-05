	<?php 
		$link = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
		mysqli_select_db($link,"quanlygiaotrinh");
		$tenKhoa=$_POST['ten'];
		$tenDangNhap=$_POST['tenDangNhap'];
		$matKhau=$_POST['matKhau'];
		//allAdmin
			
			$query="SELECT * FROM `admin_tbl` WHERE tenDangNhap='".$tenDangNhap."'";
			$result1=mysqli_query($link,$query);
									
			if (!$result1) {
				echo 'Could not run query: ' . mysqli_error($link);
				exit;
			} else {
		// allAdmin-end
		
		$query="INSERT INTO `admin_tbl`(`tenAdmin`, `tenDangNhap`, `matKhau`) VALUES ('".$tenKhoa."','".$tenDangNhap."','".$matKhau."')";
		$result = mysqli_query($link,$query); 
		if ( !$result ) {
			echo "Không thểthực hiện được câu lệnh SQL:".mysqli_error($link); 
			
		}else{
			header('location:admin_danhSachAdmin.php');
		}
	}
	?>

