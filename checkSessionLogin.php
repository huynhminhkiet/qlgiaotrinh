<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

		 
	<?php	
		ob_start();
		session_start();
		
		if(!isset($_SESSION['userid'])){
			header("Location:admin_dangNhap.php" );
		}
		
		
	?>

