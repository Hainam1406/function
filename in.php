<?php

function In($data=''){
	//kiem tra xem file co ton tai khong
	if (file_exists('val.php')) {
		require 'val.php';
		if (Val($data)) {
			$res = Val($data);
			// print_r($data);

			$conn = mysqli_connect('localhost', 'root', '', 'function') or die ('Lỗi kết nối');

			$username 	= mysqli_real_escape_string($conn, $res['in_name_email']);

			$pass 		= $res['in_pass'] ? md5($res['in_pass']) : '';

			$sql = "SELECT * FROM member WHERE username = '$username'";
			$in_result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($in_result) > 0){
				echo '<script language="javascript">alert("Thông tin đăng nhâp bị sai"); window.location="http://localhost/function/index.php";</script>';
				die();
			}else{
				$sql = "INSERT INTO `member`(`username`, `password`) VALUES ('$username','$pass')";
				if (mysqli_query($conn, $sql)) {
					echo '<script language="javascript">alert("Đăng nhập thành công"); window.location="http://localhost/function/index.php";</script>';
				}else{
					echo '<script language="javascript">alert("có lỗi"); window.location="http://localhost/function/index.php";</script>';
				}
			}


		}else{
			// return
			echo $res['errs'];
		}


		// print_r($res);
		echo "ten hoac email : ".$res['in_name_email'];
		echo "<pre>";
		echo "\nMat khau la : ".$res['in_pass'];
	}else{
		return false;
	}
}

In($_POST);
?>