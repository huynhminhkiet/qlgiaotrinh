<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

		<?php 
			include('header-admin.php');
		?>
		<script>
		$j=jQuery.noConflict();
	$j(document)
	.ready(
		
		function() {
			
			$j("#themGiaoTrinh")
				.validate(
					{
						ignore : [],
						debug : false,
						rules:{
							tenGT: {
								required: true,
								
								
							},
							tacGia: {
								required: true,
								
							},
							link: {
								required: true,
								
							},
							moTa: {
								required: true,
								
							},
							
						},
						messages : {
							ten:{
								required: "Vui lòng nhập vào họ và tên",
							},
							tacGia: {
								required: "Vui lòng nhập vào tác giả",
								
							},
							link: {
								required: "Vui lòng nhập vào link dowload",
								
							},
							moTa: {
								required: "Vui lòng nhập vào mô tả",
								
							},
						},
					});
		});
</script>
<style>
	.error {
		color:red;
	} 
</style>
		<section id="content_area">
			<div class="clearfix wrapper main_content_area">
				<div class="clearfix main_content floatleft">
					<div class="clearfix content">
											
		<form id="themGiaoTrinh" role="form" action="Controller_themGiaoTrinh.php" method="POST">
		  <div class="form-group">
			<label for="name">Tên giáo trình:</label>
			<input type="text" class="form-control" id="tenGiaoTrinh" name="tenGiaoTrinh">
		  </div>
		   <div class="form-group">
			<label for="name" style="display:block">Tên học phần:</label>
			


			<select name="hocPhan"  >
				
				<?php
								//session
								session_start();
								$username=$_SESSION["username"];
								//session
								$query="SELECT hp.idHocPhan ,hp.idKhoa,hp.tenHocPhan,hp.ky,k.tenKhoa FROM `hocphan_tbl` AS hp INNER JOIN khoa_tbl AS k ON hp.idKhoa=k.idKhoa ; ";
								$result=mysqli_query($link,$query);
								
								if (!$result) {
								echo 'Could not run query: ' . mysqli_error($link);
								exit;
								} else {
									while ( $row = mysqli_fetch_assoc($result) )
									{ 
										echo "<option value='".$row['idHocPhan']."'>".$row['tenHocPhan']."</option>";
									}
								}	
											
									 
				?>
			
			</select>
		  </div>
		   <div class="form-group">
			<label for="name">Tác giả:</label>
			<input type="text" class="form-control" id="tacGia" name="tacGia">
		  </div>
		  <?php
				  $now = getdate(); 
   
				  $currentDate = $now["year"] . "-" . $now["mon"] . "-" . $now["mday"]; 
    
			?>
		  <div class="form-group">
			<label for="name">Ngày tạo:</label>
			<input type="text" class="form-control" id="ngayTao" name="ngayTao" value="<?php echo $currentDate;  ?>" disabled />
		  </div>
		  <div class="form-group">
			<label for="name">Link:</label>
			<input type="text" class="form-control" id="link" name="link">
		  </div>
		  <div class="form-group">
			<label for="name">Admin:</label>
			<input type="text" class="form-control" id="admin" name="admin" value="<?php echo $username;?>" disabled />
		  </div>
		  <div class="form-group">
			<label for="name">Mô tả:</label>
			<textarea  class="form-control" id="moTa" name="moTa"></textarea>
		  </div>
	
		  <button type="submit" class="btn btn-primary">Thêm</button>
		  <button type="reset" class="btn btn-primary">Nhập lại</button>
		  <a href="admin_danhSachHocPhan.php"><button class="btn btn-primary">Trở lại</button></a>
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

