<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

		<?php 
			include('checkSessionLogin.php');
			include('header-admin.php');
			
		?>
		<script>
		$j=jQuery.noConflict();
	$j(document)
	.ready(
		
		function() {
			
			$j("#themKhoa")
				.validate(
					{
						ignore : [],
						debug : false,
						rules:{
							tenKhoa: {
								required: true,
								
								
							},
							
							
						},
						messages : {
							tenKhoa:{
								required: "Vui lòng nhập vào tên khoa",
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
											
		<form id="themKhoa" role="form" action="Controller_themKhoa.php" method="POST">
		  <div class="form-group">
			<label for="name">Tên khoa:</label>
			<input type="text" class="form-control" id="khoa" name="tenKhoa">
		  </div>
	
		  <button type="submit" class="btn btn-primary" name="themKhoa">Thêm</button>
		  <button type="reset" class="btn btn-primary">Nhập lại</button>
		  
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