<?php
	$sql = "SELECT idKhoa, tenKhoa FROM khoa_tbl ORDER BY tenKhoa ASC";
	$resultSet = mysqli_query($link, $sql);
?>
<div class="clearfix sidebar_container floatright">			
	<div class="clearfix sidebar">
		<div class="clearfix single_sidebar category_items">
			<h2>Danh mục</h2>
			<ul>
			<?php
				while ($row = mysqli_fetch_assoc($resultSet)) {
					$countSql = "SELECT COUNT(*) as total FROM giaotrinh_tbl INNER JOIN hocphan_tbl ON giaotrinh_tbl.idHocPhan = hocphan_tbl.idHocPhan 
						WHERE hocphan_tbl.idKhoa =".$row['idKhoa'];
					$countResult = mysqli_fetch_assoc(mysqli_query($link, $countSql));
					echo '<li class="cat-item"><a href="index.php?idKhoa='.$row['idKhoa'].'">'.$row['tenKhoa'].'</a>('.$countResult['total'].')</li>';
				}			
			?>
			</ul>
		</div>
	</div>
</div>		
