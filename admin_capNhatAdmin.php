<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

		<?php 
			include('header-admin.php');
			$id=$_GET['id'];
		    $query="SELECT * FROM `admin_tbl` WHERE idAdmin=".$id;
		    $result=mysqli_query($link,$query);
								
			if (!$result) {
				echo 'Could not run query: ' . mysqli_error($link);
				exit;
			} else {
				while ( $row = mysqli_fetch_assoc($result) )
				{ 	
					$ten=$row['tenAdmin'];
					$user=$row['tenDangNhap'];
					$pass=$row['matKhau'];
								
				}
			}
			
			
		?>
		<script>
		$j=jQuery.noConflict();
	$j(document)
	.ready(
		
		function() {
			
			$j("#capNhat-Admin")
				.validate(
					{
						ignore : [],
						debug : false,
						rules:{
							ten: {
								required: true,
								number:true,
								maxlength: 12,
								minlength: 9,
							},
							
						},
						messages : {
							ten:{
								required: "Vui lòng nhập vào so dien thoai",
								number:"Vui lòng nhập vào là số ",
								maxlength:"Số CMND không được vượt quá 12 ký tự",
								maxlength:"Số CMND không được ít hơn ký tự",
							},
							
						},
					});
		});
</script>
		<section id="content_area">
			<div class="clearfix wrapper main_content_area">
				<div class="clearfix main_content floatleft">
					<div class="clearfix content">
											
		<form role="form" name="capNhatAdmin" id="capNhat-Admin" action="Controller_capNhatAdmin.php" method="POST">
		  <div class="form-group">
			<label for="name">Họ và tên:</label>
			<input type="text" class="form-control" id="ten" name="ten" value="<?php echo $ten ;?>"/>
			<input type="hidden" class="form-control" id="idAdmin" name="idAdmin" value="<?php echo $id;?>"/>
		  </div>
		  <div class="form-group">
			<label>Tên đăng nhập:</label>
			<input type="text" class="form-control" id="tendangnhap" name="tenDangNhap" value="<?php echo $user ;?>"/>
		  </div>
		  <div class="form-group">
			<label>Mật khẩu:</label>
			<input type="password" class="form-control" id="matKhau" name="matKhau" value="<?php echo $pass ;?>"/>
		  </div>
	
		  <button type="submit" class="btn btn-primary" onClick="checkUsername()" >Cập nhật</button>
		  <button type="reset" class="btn btn-primary">Nhập lại</button>
		  <a href="admin_danhSachAdmin.php"><button class="btn btn-primary">Trở lại</button></a>
		</form>
											
					
					
					
					
					
					
					
					
					
					
					</div>
	
					
				</div>
				
				<?php 
				include('right-admin.php');
				?>
				
			</div>
		</section>
		
		
		<?php 
			include('footer.php');
		?>
</html>

<!-- 				<div class="pagination">
						Dùng phân trang thì dùng cái này
						
						<nav>
							<ul>
								<li><a href=""> << </a></li>
								<li><a href="">1</a></li>
								<li><a href="">2</a></li>
								<li><a href="">3</a></li>
								<li><a href="">4</a></li>
								<li><a href=""> >> </a></li>
							</ul>
						</nav>
					</div>
					
-->