<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

		<?php 
			include('header-user.php');
			include('MysqlConnection.php');
			
			$idKhoa = 0;
			$tenKhoa = "";
			if (isset($_GET['idKhoa'])) {
				$idKhoa = $_GET['idKhoa'];
				$sql = "SELECT idKhoa, tenKhoa FROM khoa_tbl WHERE idKhoa=".$idKhoa;
			} else {
				$sql = "SELECT idKhoa, tenKhoa FROM khoa_tbl ORDER BY tenKhoa ASC";
			}
			$resultSet = mysqli_query($link, $sql);
			
			if ($row = mysqli_fetch_assoc($resultSet)) {
				$tenKhoa = $row['tenKhoa'];
				$idKhoa = $row['idKhoa'];
			}
		?>
		
		<section id="content_area">
			<div class="clearfix wrapper main_content_area">
				<div class="clearfix main_content floatleft">
					<div class="clearfix content">
						<h3><strong>Giáo trình <?php echo $tenKhoa?></strong></h3>
						<label>
							<select name="ky" id="select_ky" onchange="fetch_select(this.value);">
								<option value="0"> ---- Chọn kỳ ----</option>
								<option value="1">Kỳ 1</option>
								<option value="2">Kỳ 2</option>
								<option value="3">Kỳ 3</option>
								<option value="4">Kỳ 4</option>
								<option value="5">Kỳ 5</option>
								<option value="6">Kỳ 6</option>
								<option value="7">Kỳ 7</option>
								<option value="8">Kỳ 8</option>
								<option value="9">Kỳ 9</option>
								<option value="10">Kỳ 10</option>
							</select>
						</label>
						
						<label>
							<select name="hocPhan" id="select_hocphan">
								<option value="0">--------- Chọn Học Phần ---------</option>
								
							</select>
						</label>
						
						<button class="btnExample" onclick="search()" value="Submit"/>Tìm kiếm</button>
					
						
						<br><br><br>
						<?php
							// phan trang
							$page = 0;
							if (isset($_GET['page']))
								$page = $_GET['page'];
							
							$recordsPerPage = 2;
							$noOfRecords = 0;
							
							$sqlCount = "SELECT COUNT(*) as total FROM giaotrinh_tbl INNER JOIN hocphan_tbl ON giaotrinh_tbl.idHocPhan = hocphan_tbl.idHocPhan INNER JOIN khoa_tbl ON hocphan_tbl.idKhoa = khoa_tbl.idKhoa WHERE khoa_tbl.idKhoa =".$idKhoa;
							$resultSet = mysqli_query($link, $sqlCount);
							$row = mysqli_fetch_assoc($resultSet);
							$noOfRecords = $row['total'];
							echo $noOfRecords;
							
							$sql = "SELECT giaotrinh_tbl.tenGiaoTrinh, giaotrinh_tbl.tacGia, khoa_tbl.tenKhoa, hocphan_tbl.tenHocPhan FROM giaotrinh_tbl INNER JOIN hocphan_tbl ON giaotrinh_tbl.idHocPhan = hocphan_tbl.idHocPhan INNER JOIN khoa_tbl ON hocphan_tbl.idKhoa = khoa_tbl.idKhoa WHERE khoa_tbl.idKhoa =".$idKhoa.
								" LIMIT ".$page*$recordsPerPage.", ".$recordsPerPage;
							
							if (isset($_GET['hp'])) {
								$sqlCount = "SELECT COUNT(*) as total FROM giaotrinh_tbl INNER JOIN hocphan_tbl ON giaotrinh_tbl.idHocPhan = hocphan_tbl.idHocPhan INNER JOIN khoa_tbl ON hocphan_tbl.idKhoa = khoa_tbl.idKhoa 
									WHERE khoa_tbl.idKhoa =".$_GET['idKhoa']." AND hocphan_tbl.idHocPhan =".$_GET['hp'];
								$resultSet = mysqli_query($link, $sqlCount);
								$row = mysqli_fetch_assoc($resultSet);
								$noOfRecords = $row['total'];
								echo $noOfRecords;	
								
								$sql = "SELECT giaotrinh_tbl.tenGiaoTrinh, giaotrinh_tbl.tacGia, khoa_tbl.tenKhoa, hocphan_tbl.tenHocPhan FROM giaotrinh_tbl INNER JOIN hocphan_tbl ON giaotrinh_tbl.idHocPhan = hocphan_tbl.idHocPhan INNER JOIN khoa_tbl ON hocphan_tbl.idKhoa = khoa_tbl.idKhoa 
									WHERE khoa_tbl.idKhoa =".$_GET['idKhoa']." AND hocphan_tbl.idHocPhan =".$_GET['hp'];
								
							} 
						
							$resultSet = mysqli_query($link, $sql);
							
							while ($row = mysqli_fetch_assoc($resultSet)) {
								echo 
									'<div class="clearfix single_content">
										<div class="clearfix post_detail">
											<h2><strong><a href="">'.$row['tenGiaoTrinh'].'</a></strong></h2>
											<p>Tác giả: '.$row['tacGia'].'</p>
											<p>Khoa: '.$row['tenKhoa'].'</p>
											<p>Học phần: '.$row['tenHocPhan'].'</p>
											<a href="">Chi tiết</a>
										</div>
									</div>';
							}
							
							$noOfPages = $noOfRecords/$recordsPerPage;
							
							$linkPart = "&idKhoa=".$idKhoa;
							if (isset($_GET['hp'])) {
								$linkPart += "?hp=".$_GET['hp'];
							}
							
							echo "<div class='pagination'>";
							for ( $page = 0; $page < $noOfPages; $page ++ ) {
								
								echo "<a href='index.php?page=".($page + $linkPart)."'>{$page}</a>";
							}
						?>
						
					
					<!-- <div class="pagination">
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
					</div> -->
					
				</div>
			</div>
			
			<?php 
				include('right-user.php');
			?>
			
		</section>
	
		<?php 
			include('footer.php');
		?>
		
<script>
	function fetch_select(val) {
		var idKhoa = <?php echo $idKhoa?>;
		$.ajax({
			type: 'post',
			url: 'ajax_chon_hocphan.php',
			data: {
				idKhoa:idKhoa,
				ky:val
			},
			success: function (response) {
				document.getElementById("select_hocphan").innerHTML=response; 
			}
		});
	}

	function search() {
		var idKhoa = <?php echo $idKhoa?>;
		var hocPhan = select_hocphan.options[select_hocphan.selectedIndex].value;
		if (hocPhan != 0)
			window.location = "index.php?idKhoa=" + idKhoa + "&hp=" + hocPhan;
		else
			window.location = "index.php?idKhoa=" + idKhoa;
	}
</script>
</html>
