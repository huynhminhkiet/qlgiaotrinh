<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

		<?php 
			include('header-admin.php');
		?>
		
		<section id="content_area">
			<div class="clearfix wrapper main_content_area">
				<div class="clearfix main_content floatleft">
					<div class="clearfix content">
						<?php
							if(isset($msg)){
								echo "<p style='color:red'>".$msg."</p>";
							}
						?>
						<div >
							<a style="float: right;margin-bottom:10px"  href="admin_themHocPhan.php"><button class="btn btn-primary">Thêm</button></a>
						</div>						
						<table id="mytable" class="display" cellspacing="0" width="100%">
						<thead>
						
							<tr>
								<th>ID</th>
								<th>Tên học phần</th>
								<th>Tên khoa</th>
								<th>Học kỳ</th>
								<th>Chức năng</th>
								
							   
							</tr>
						</thead>
					   
						<tbody>
							
							<?php
							
								$query="SELECT hp.idHocPhan ,hp.idKhoa,hp.tenHocPhan,hp.ky,k.tenKhoa FROM `hocphan_tbl` AS hp INNER JOIN khoa_tbl AS k ON hp.idKhoa=k.idKhoa ; ";
								$result=mysqli_query($link,$query);
								
								if (!$result) {
								echo 'Could not run query: ' . mysqli_error($link);
								exit;
								} else {
									while ( $row = mysqli_fetch_assoc($result) )
									{ echo "<tr><td>".$row['idHocPhan']."</td>";
									echo "<td>".$row['tenHocPhan']."</td>";
									echo "<td>".$row['tenKhoa']."</td>";
									echo "<td>".$row['ky']."</td>";
											
									 
								?>
									<td>
										<a style='float: right;margin-bottom:10px'  href='Controller_xoaHocPhan.php?id=<?php echo $row['idHocPhan'];  ?>'><button class='btn btn-danger'>Xóa</button></a>
										<a style='float: right;margin-bottom:10px'  href='admin_capNhatHocPhan.php?id=<?php echo $row['idHocPhan'];  ?>'><button class='btn btn-info'>Sửa</button></a>
									</td>
								</tr>
								<?php
									}
								}
								//mysqli_close($link);
							?>
							
							
						</tbody>
					</table>
															
									
					
					
					
					
					
					
					
					
					
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

<!-- 				
-->