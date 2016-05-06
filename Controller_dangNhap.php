<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


		<?php 
			include('database.php');
								
			
			if(isset($_POST['dangNhap']))
			{
				$u=$p="";
				if($_POST['tenDangNhap'] == NULL)
				{
			  echo "Please enter your username<br />";
			 }
			 else
			 {
			  $u=$_POST['tenDangNhap'];
			 }
			 if($_POST['matKhau'] == NULL)
			 {
			  echo "Please enter your password<br />";
			 }
			 else
			 {
			  $p=$_POST['matKhau'];
			 }
			 if($u && $p)
			 {
				$link = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
				mysqli_select_db($link,"quanlygiaotrinh");
				$query="SELECT * FROM `admin_tbl` WHERE tenDangNhap='".$u."' and matKhau='".$p."'";
				$result1=mysqli_query($link,$query);
				if(mysqli_num_rows($result1) == 0)
				{
					$msg ="Tên đăng nhập hoặc mật khẩu chưa đúng";
					include_once 'admin_dangNhap.php';
				}
				else
				{
					$row=mysqli_fetch_array($result1);
					session_start();
					$_SESSION['userid'] = $row['tenDangNhap'];
					$_SESSION['name'] = $row['tenAdmin'];
					include_once 'admin_trangChu.php';
				}
			 }
			}

		
		
						
		
		?>
		
		