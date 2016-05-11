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
							<a style="float: right;margin-bottom:10px"  href="admin_themKhoa.php"><button class="btn btn-primary">Thêm</button></a>
						</div>						
						<table id="mytable" class="display" cellspacing="0" width="100%">
						<thead>
						
							<tr>
								<th>ID</th>
								<th>Tên khoa</th>
								<th>Chức năng</th>
							   
							</tr>
						</thead>
					   
						<tbody id="tbl-body">
							
							<?php
									
								$query="SELECT * FROM `khoa_tbl` WHERE 1";
								$result=mysqli_query($link,$query);
								
								if (!$result) {
								echo 'Could not run query: ' . mysqli_error($link);
								exit;
								} else {
									while ( $row = mysqli_fetch_assoc($result) )
									{ echo "<tr><td>".$row['idKhoa']."</td>";
									echo "<td>".$row['tenKhoa']."</td>"; 
									 
								?>
									<td>
										<input type="hidden" id="hidden-ma" value="<?php echo $row['idKhoa']; ?>" />
										<button style='float: right;margin-bottom:10px' class='btn btn-danger' id="btn-xoa" data-toggle="modal" data-target="#myModal" >Xóa</button>
										<a style='float: right;margin-bottom:10px'  href='admin_capNhatKhoa .php?id=<?php echo $row['idKhoa'];  ?>' ><button class='btn btn-info'  >Sửa</button></a>
									</td>
								</tr>
								<?php
									}
								}
								//mysqli_close($link);
							?>
							
							
						</tbody>
					</table>
					<div id="myModal" class="modal fade" role="dialog">

						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<form id="form-xoa"
									action="Controller_xoaKhoa.php"
									method="post">
									<input id="modal-hidden-ma" type="hidden" value=""
										name="idKhoa" />
									<div class="modal-header">
										<a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
										<h3>Xóa</h3>
									</div>
									<div class="modal-body">
										<p>Bạn có chắc chắn muốn xóa thông tin này?</p>
									</div>
									<div class="modal-footer">
										<button type="submit" id="btnYes" class="btn btn-danger">Có</button>
										<button type="button" data-dismiss="modal" aria-hidden="true"
											class="btn btn-secondary">Không</button>
									</div>
								</form>
							</div>
						</div>
					</div>										
									
					
					
					
					
					
					
					
					
					
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