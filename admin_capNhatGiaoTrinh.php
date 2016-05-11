<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

		<?php 
			include('checkSessionLogin.php');
			include('header-admin.php');
			
			$id=$_GET['id'];
		   
			$query="SELECT gt.idGiaoTrinh,gt.idHocPhan,gt.idAdmin,gt.ngayTao,gt.tenGiaoTrinh,gt.tacGia,gt.moTa,gt.link ,hp.tenHocPhan,ad.tenAdmin ,ad.tenDangNhap,hp.idKhoa FROM `giaotrinh_tbl` AS gt INNER JOIN hocphan_tbl AS hp ON gt.idHocPhan= hp.idHocPhan INNER JOIN admin_tbl AS ad ON gt.idAdmin= ad.idAdmin  WHERE idGiaoTrinh=".$id;
			$result=mysqli_query($link,$query);
								
			if (!$result) {
			echo 'Could not run query: ' . mysqli_error($link);
			exit;
			} else {
				while ( $row = mysqli_fetch_assoc($result) )
				{	$ten=$row['tenGiaoTrinh'];
					$idHocPhan=$row['idHocPhan'];
					$tenAdmin=$row['tenDangNhap'];
					$ngayTao=$row['ngayTao'];
					$tacGia=$row['tacGia'];
					$moTa=$row['moTa'];
					$linkD=$row['link'];
					$idKhoa=$row['idKhoa'];
				}
			}	
								
		?>
		<script>
		$j=jQuery.noConflict();
	$j(document)
	.ready(
		
		function() {
			
			$j("#capNhatGiaoTrinh")
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
<script>
	function showHocPhan(str) {
		if (str == "0") {
			document.getElementById("ajax-HocPhan").innerHTML = "";
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
					document.getElementById("ajax-HocPhan").innerHTML = xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET","Controller_ajaxHocPhan.php?q="+str,true);
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
											
		<form id="capNhatGiaoTrinh" role="form" action="Controller_capNhatGiaoTrinh.php" method="POST">
		  <div class="form-group">
			<label for="name">Tên giáo trình:</label>
			<input type="text" class="form-control"  name="tenGT" value="<?php echo $ten ;?>"  />
			<input type="hidden" class="form-control"  name="idGT" value="<?php echo $id ;?>"  />
		  </div>
		   <div class="form-group" style="display:inline">
			<label for="name" >Tên khoa:</label>
			


			<select name="khoa"  onchange="showHocPhan(this.value)">
				
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
		   <div class="form-group" style="display:inline" id="ajax-HocPhan">
			<label for="name" >Tên học phần:</label>
			


			<select name="hocPhan"  >
				
				<?php
							
					$query="SELECT hp.idHocPhan ,hp.idKhoa,hp.tenHocPhan,hp.ky,k.tenKhoa FROM `hocphan_tbl` AS hp INNER JOIN khoa_tbl AS k ON hp.idKhoa=k.idKhoa ; ";
					$result=mysqli_query($link,$query);
								
					if (!$result) {
						echo 'Could not run query: ' . mysqli_error($link);
						exit;
					} else {
						while ( $row = mysqli_fetch_assoc($result) )
						{ 
							if($row['idHocPhan']==$idHocPhan){
								echo "<option value='".$row['idHocPhan']."' selected>".$row['tenHocPhan']."</option>";
							}else{
								echo "<option value='".$row['idHocPhan']."' >".$row['tenHocPhan']."</option>";
							}
						}
					}	
											
									 
				?>
			
			</select>
		  </div>
		   <div class="form-group">
			<label for="name">Tác giả:</label>
			<input type="text" class="form-control" id="tacGia" name="tacGia" value="<?php echo $tacGia;  ?>" />
		  </div>
		
		  <div class="form-group">
			<label for="name">Ngày tạo:</label>
			<input type="text" class="form-control" id="ngayTao" name="ngayTao" value="<?php echo $ngayTao;  ?>" disabled />
		  </div>
		  <div class="form-group">
			<label for="name">Link:</label>
			<input type="text" class="form-control" id="link" name="link" value="<?php echo $linkD;  ?>" />
		  </div>
		  <div class="form-group">
			<label for="name">Admin:</label>
			<input type="text" class="form-control"  name="admin" value="<?php  echo $tenAdmin;?>" disabled />
			
		  </div>
		  <div class="form-group">
			<label for="name">Mô tả:</label>
			<textarea  class="form-control" id="moTa" name="moTa"> <?php echo $moTa;  ?></textarea>
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

