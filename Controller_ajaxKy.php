<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

	<?php 
		include('database.php');
		
		$bd="<option value=''>==Chọn kỳ==</option>";
		for($i=1;$i<=10;$i++){
			$bd=$bd."<option value='".$i."' >".$i."</option>";
						
		}
		$hd="<label for='name'>Kỳ:</label><select name='ky' onchange='showHocPhan(this.value)'>";
		echo $hd.$bd."</select>";
	?>
</html>
