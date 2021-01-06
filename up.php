<?php 

function Up($data=''){
	//kiem tra xem file co ton tai khong
	if (file_exists('val.php')) {
		require 'val.php';
		if (Val($data)) {
			$res = Val($data);
			// print_r($data);
		}else{
			// return 
			echo $res['errs'];
		}


		// print_r($res);
		echo 'ten la : '.$res['up_name'];
		echo "\nEmail la : ".$res['up_email'];
		echo "\nMat khau la : ".$res['up_pass'];
	}else{
		return false;
	}
}

Up($_POST);



 ?>