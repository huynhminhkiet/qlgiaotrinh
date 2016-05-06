<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

		<?php 
			include('header-admin.php');
			$id=$_GET['id'];
		    $query="SELECT * FROM `khoa_tbl` WHERE idKhoa=".$id;
		    $result=mysqli_query($link,$query);
								
			if (!$result) {
				echo 'Could not run query: ' . mysqli_error($link);
				exit;
			} else {
				while ( $row = mysqli_fetch_assoc($result) )
				{ 	
					$tenKhoa=$row['tenKhoa'];
								
				}
			}
			
		?>
		<script>
		$j=jQuery.noConflict();
	$j(document)
	.ready(
		
		function() {
			
			$j("#capNhatKhoa")
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
								required: "Vui lòng nhập vào tên khoa.",
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
											
		<form id="capNhatKhoa" role="form" action="Controller_capNhatKhoa.php" method="POST">
		  <div class="form-group">
			<label for="name">Tên khoa:</label>
			<input type="text" class="form-control" id="tenKhoa" name="tenKhoa" value="<?php echo $tenKhoa ;?>" />
			<input type="hidden" class="form-control" id="idKhoa" name="idKhoa" value="<?php echo $id ;?>" />
		  </div>
	
		  <button type="submit" class="btn btn-primary">Cập nhật</button>
		   
		  <a href="admin_danhSachKhoa.php"><button class="btn btn-primary">Trở lại</button></a>
		
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