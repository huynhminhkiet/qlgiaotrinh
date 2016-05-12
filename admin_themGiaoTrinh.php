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
			
			$j("#themGiaoTrinh")
				.validate(
					{
						ignore : [],
						debug : false,
						rules:{
							tenGiaoTrinh: {
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
							khoa: {
								required: true,
								
							},
							
						},
						messages : {
							tenGiaoTrinh:{
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
							khoa: {
								required: "Vui lòng chọn khoa",
								
							},
						},
					});
		});
</script>
<script>
	function showHocPhan(str) {
		
		if (str == "") {
			
			document.getElementById("ajax-HocPhan").innerHTML = "";
			return;
		} else {
			
			var idKhoa=document.getElementById("idKhoa").value;	
			
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("ajax-HocPhan").innerHTML = xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET","Controller_ajaxHocPhan.php?value="+str+"&&idKhoa="+idKhoa+"&&num=0",true);
			xmlhttp.send();
		}
	}
	function showKy(str) {
		if (str == "") {
			document.getElementById("ajax-Ky").innerHTML = "";
			return;
		} else { 
			
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("ajax-Ky").innerHTML = xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET","Controller_ajaxKy.php",true);
			xmlhttp.send();
		}
	}
	
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
		  
		   <div class="form-group" style="display:inline">
				<label for="name">Khoa:</label>
			


			<select name="khoa" id="idKhoa"  onchange="showKy(this.value)">
				
				<option value="">======Chọn khoa======</option>
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
		  <div class="form-group" style="display:inline" id="ajax-Ky">
			
			
			


			
			
			
		  </div>
		   <div class="form-group" style="display:inline" id="ajax-HocPhan" >
			
			
			


			
			
			
		  </div>
		  
		   <div class="form-group">
			<label for="name">Tác giả:</label>
			<input type="text" class="form-control" id="tacGia" name="tacGia">
		  </div>
		  <?php
				  $now = getdate(); 
   
				  $currentDate = $now["year"]."-".$now["mon"]."-".$now["mday"]; 
    
			?>
		  <div class="form-group">
			<label >Ngày tạo:</label>
			
			<input type="text" class="form-control" id="ngayTao" name="ngayTao" value="<?php echo $currentDate;  ?>" readonly />
		  </div>
		  <div class="form-group">
			<label >Link:</label>
			<input type="text" class="form-control" id="link" name="link">
		  </div>
		  <div class="form-group">
			<label >Admin:</label>
			<input type="text" class="form-control" id="admin" name="admin" value="<?php echo $_SESSION['userid'];?>" readonly />
		  </div>
		  <div class="form-group">
			<label >Mô tả:</label>
			<textarea  class="form-control" id="moTa" name="moTa"></textarea>
		  </div>
	
		  <button type="submit" class="btn btn-primary" name="themGiaoTrinh">Thêm</button>
		  
		 
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

