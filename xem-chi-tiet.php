<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

		<?php 
			include('header-user.php');
			include('MysqlConnection.php');
			
		?>
		
		<section id="content_area">
			<div class="clearfix wrapper main_content_area">
				<div class="clearfix main_content floatleft">
					<div class="clearfix content">
						<?php 
							$idGiaoTrinh = 0;
							if (isset($_GET['idGiaoTrinh']))
								$idGiaoTrinh = $_GET['idGiaoTrinh'];
						
							$sql = "SELECT giaotrinh_tbl.idGiaoTrinh, giaotrinh_tbl.tenGiaoTrinh, giaotrinh_tbl.tacGia, hocphan_tbl.tenHocPhan, khoa_tbl.tenKhoa, giaotrinh_tbl.moTa, giaotrinh_tbl.ngayTao, giaotrinh_tbl.link 
								FROM giaotrinh_tbl INNER JOIN hocphan_tbl ON giaotrinh_tbl.idHocPhan = hocphan_tbl.idHocPhan INNER JOIN khoa_tbl ON hocphan_tbl.idKhoa = khoa_tbl.idKhoa 
								WHERE giaotrinh_tbl.idGiaoTrinh = ".$idGiaoTrinh;
							$resultSet = mysqli_query($link, $sql);
							
							if ($row = mysqli_fetch_assoc($resultSet)) {
								echo "<h3><strong>Giáo trình: ".$row['tenGiaoTrinh']."</strong></h3>";
								echo "<p>Tác giả: ".$row['tacGia']."</p>";
								echo "<p>Học phần: ".$row['tenHocPhan']."</p>";
								echo "<p>Khoa: ".$row['tenKhoa']."</p>";
								echo "<p>Ngày tạo: ".$row['ngayTao']."</p>";
								
								echo "<br><p>Mô tả:</p>";
								echo "<p>".$row['moTa']."</p>";
								
								echo "<br><p>Tải về:</p>";
								echo "<a style='color: blue;' href='".$row['link']."'>".$row['link']."</a><br><br>";
							}
						?>
						
						
						
						
						
						
						
						
						
				
					
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
