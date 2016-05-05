<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

		<?php 
			include('header-admin.php');
			
			$id=$_GET['id'];
		   
			$query="SELECT gt.idGiaoTrinh,gt.idHocPhan,gt.idAdmin,gt.ngayTao,gt.tenGiaoTrinh,gt.tacGia,gt.moTa,gt.link ,hp.tenHocPhan,ad.tenAdmin ,ad.tenDangNhap FROM `giaotrinh_tbl` AS gt INNER JOIN hocphan_tbl AS hp ON gt.idHocPhan= hp.idHocPhan INNER JOIN admin_tbl AS ad ON gt.idAdmin= ad.idAdmin  WHERE idGiaoTrinh=".$id;
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
				}
			}	
								
		?>
		
		<section id="content_area">
			<div class="clearfix wrapper main_content_area">
				<div class="clearfix main_content floatleft">
					<div class="clearfix content">
											
		<form role="form" action="Controller_capNhatGiaoTrinh.php" method="POST">
		  <div class="form-group">
			<label for="name">Tên giáo trình:</label>
			<input type="text" class="form-control"  name="tenGT" value="<?php echo $ten ;?>"  />
			<input type="hidden" class="form-control"  name="idGT" value="<?php echo $id ;?>"  />
		  </div>
		    <div class="form-group">
			<label for="name" style="display:block">Tên học phần:</label>
			


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
			<input type="text" class="form-control" id="admin" name="admin" value="<?php echo $tenAdmin;?>" disabled />
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

