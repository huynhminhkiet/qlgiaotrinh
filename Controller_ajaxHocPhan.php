<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

	<?php 
		include('database.php');
		$idKhoa=intval($_GET['q']);
		
		$query="SELECT hp.idHocPhan ,hp.idKhoa,hp.tenHocPhan,hp.ky,k.tenKhoa FROM `hocphan_tbl` AS hp INNER JOIN khoa_tbl AS k ON hp.idKhoa=k.idKhoa WHERE hp.idKhoa=".$idKhoa;
		
		$result=mysqli_query($link,$query);
								
								if (!$result) {
								echo 'Could not run query: ' . mysqli_error($link);
								exit;
								} else {
									$str= "<label for='name' >Chọn học phần:</label><select name='hocPhan'>";
									$rs="";	
									while($row = mysqli_fetch_assoc($result)){ 
										$rs=$rs."<option value='".$row['idHocPhan']."'>".$row['tenHocPhan']."</option>";
									
									}
									
									if($rs!=""){
									echo $str.$rs."</select>";
									}else{
									echo "<p style='color:red'>Chưa có học phần thuộc khoa này</p>";
									}
								}
		
		
	mysqli_close($link);
	
	?>
</html>
