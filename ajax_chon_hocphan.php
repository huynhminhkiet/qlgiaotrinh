<?php 
	include('MysqlConnection.php');
		
		$ky = $_POST['ky'];
		$idKhoa = $_POST['idKhoa'];
		
		
		
		$sql = "SELECT idHocPhan, tenHocPhan FROM hocphan_tbl WHERE ky=".$ky." AND idKhoa=".$idKhoa;
		$resultSet = mysqli_query($link, $sql);
		
		echo "<option value='0'>--------- Chọn Học Phần ---------</option>";
		while ($row = mysqli_fetch_assoc($resultSet)) {
			echo 
				"<option value='".$row['idHocPhan']."'>".$row['tenHocPhan']."</option>";
		}
		exit;
	
?>