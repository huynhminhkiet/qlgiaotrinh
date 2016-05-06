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
			
			$j("#themHocPhan")
				.validate(
					{
						ignore : [],
						debug : false,
						rules:{
							tenHocPhan: {
								required: true,
								
								
							},
							ky: {
								required: true,
								number: true,
							},
							
							
						},
						messages : {
							tenHocPhan:{
								required: "Vui lòng nhập vào tên học phần",
							},
							ky: {
								required: "Vui lòng nhập vào kỳ",
								number: "Vui lòng nhập kỳ là số",
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
											
		<form id="themHocPhan" role="form" action="Controller_themHocPhan.php" method="POST">
		  <div class="form-group">
			<label for="name">Tên học phần:</label>
			<input type="text" class="form-control" id="tenHocPhan" name="tenHocPhan">
		  </div>
		   <div class="form-group">
			<label for="name" style="display:block">Tên khoa:</label>
			


			<select name="khoa"  >
				
				<?php
								$query="SELECT * FROM `khoa_tbl` WHERE 1";
								$result=mysqli_query($link,$query);
								
								if (!$result) {
								echo 'Could not run query: ' . mysqli_error($link);
								exit;
								} else {
									while ( $row = mysqli_fetch_assoc($result) )
									{ 
										echo "<option value='".$row['idKhoa']."'>".$row['tenKhoa']."</option>";
									
									}
								}	 
								?>
			
			</select>
		  </div>
		   <div class="form-group">
			<label for="name">Kỳ:</label>
			<input type="text" class="form-control" id="ky" name="ky">
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

