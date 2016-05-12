<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

		<?php
			include('checkSessionLogin.php');
			include('header-admin.php');
			$id=$_GET['id'];
		   $query="SELECT hp.idHocPhan ,hp.idKhoa,hp.tenHocPhan,hp.ky,k.tenKhoa FROM `hocphan_tbl` AS hp INNER JOIN khoa_tbl AS k ON hp.idKhoa=k.idKhoa WHERE  hp.idHocPhan=".$id;
			$result=mysqli_query($link,$query);
									
			if (!$result) {
				echo 'Could not run query: ' . mysqli_error($link);
				exit;
			} else {
				while ( $row = mysqli_fetch_assoc($result) )
					{ 
						$idHP=$row['idHocPhan'];
						$tenHP=$row['tenHocPhan'];
						$idKhoa=$row['idKhoa'];
						$ky=$row['ky'];
					}
			}		
								
		?>
		<script>
		$j=jQuery.noConflict();
	$j(document)
	.ready(
		
		function() {
			
			$j("#capNhatHocPhan")
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
											
		<form id="capNhatHocPhan" role="form" action="Controller_capNhatHocPhan.php" method="POST">
		  <div class="form-group">
			<label for="name">Tên học phần:</label>
			<input type="text" class="form-control"  name="tenHocPhan" value="<?php echo $tenHP ;?>"  />
			<input type="hidden" class="form-control"  name="idHocPhan" value="<?php echo $id ;?>"  />
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
										if($idKhoa==$row['idKhoa']){
											echo "<option value='".$row['idKhoa']."' selected>".$row['tenKhoa']."</option>";
											
										}else{
											echo "<option value='".$row['idKhoa']."'>".$row['tenKhoa']."</option>";
										}
									}
								}	 
								?>
			
			</select>
		  </div>
		   
		   <div class="form-group">
			<label for="name" style="display:block">Kỳ:</label>
			<select name="ky">
				<?php 
					for($i=1;$i<=10;$i++){
						if($i==$ky){
							echo"<option value='".$i."' selected>".$i."</option>";
						}else{
							echo"<option value='".$i."' >".$i."</option>";
						}
					}
				?>
			</select>	
				
				
		  </div>
	
		  <button type="submit" class="btn btn-primary" name="capNhatHocPhan">Cập nhật</button>
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

