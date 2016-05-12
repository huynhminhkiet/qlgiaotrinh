<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<?php
		ob_start();
		session_start();
		?>

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
				include('database.php');
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
					
					
					$_SESSION['userid'] = $row['tenDangNhap'];
					$_SESSION['name'] = $row['tenAdmin'];
					$_SESSION['id'] = $row['idAdmin'];
					echo $_SESSION['userid'];
					echo $_SESSION['name'];
					
					header("Location: admin_trangChu.php");
				}
			 }
			}

		
		
						
		
		?>
		
		