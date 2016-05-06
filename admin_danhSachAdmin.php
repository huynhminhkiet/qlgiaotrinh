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
							if(isset($msg)!=null){
								echo "<p style='color:red'>".$msg."</p>";
							}
						?>
						<div >
							<a style="float: right;margin-bottom:10px"  href="admin_themAdmin.php"><button class="btn btn-primary">Thêm</button></a>
						</div>						
						<table id="mytable" class="display" cellspacing="0" width="100%">
						<thead>
						
							<tr>
								<th>ID</th>
								<th>Tên</th>
								<th>Tên đăng nhập</th>
								<th>Chức năng</th>
								
							   
							</tr>
						</thead>
					   
						<tbody>
							
							<?php
								$query="SELECT * FROM `admin_tbl` WHERE 1";
								$result=mysqli_query($link,$query);
								
								if (!$result) {
								echo 'Could not run query: ' . mysqli_error($link);
								exit;
								} else {
									while ( $row = mysqli_fetch_assoc($result) )
									{ echo "<tr><td>".$row['idAdmin']."</td>";
									echo "<td>".$row['tenAdmin']."</td>";
									echo "<td>".$row['tenDangNhap']."</td>";
											
									 
								?>
									<td>
										<a style='float: right;margin-bottom:10px'  href='Controller_xoaAdmin.php?id=<?php echo $row['idAdmin'];  ?>'><button class='btn btn-danger'>Xóa</button></a>
										<a style='float: right;margin-bottom:10px'  href='admin_capNhatAdmin.php?id=<?php echo $row['idAdmin'];  ?>'><button class='btn btn-info'>Sửa</button></a>
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