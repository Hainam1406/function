<<<<<<< HEAD
<?php  

function Up($data=''){
	//kiem tra xem file co ton tai khong
	if (file_exists('val.php')) {

		require 'val.php';
		if (Val($data)) {
			$res = Val($data);
			// print_r($data);

			$conn = mysqli_connect('localhost', 'root', '', 'function') or die ('Lỗi kết nối');

			$username 	= mysqli_real_escape_string($conn, $res['up_name']);
			$email 		= mysqli_escape_string($conn, $res['up_email']);
			$pass 		= $res['up_pass'] ? md5($res['up_pass']) : '';
			$repass 		= $res['up_repass'] ? md5($res['up_repass']) : '';

			$sql = "SELECT * FROM member WHERE username = '$username' OR email = '$email'";

			$up_result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($up_result) > 0){
				echo '<script language="javascript">alert("Thông tin đăng ký bị sai"); window.location="http://localhost/function/index.php";</script>';
				die();
			}else{
				$sql = "INSERT INTO `member`(`username`, `email`, `password`) VALUES ('$username','$email','$pass')";
				if (mysqli_query($conn, $sql)) {
					echo '<script language="javascript">alert("Đăng ký thành công"); window.location="http://localhost/function/index.php";</script>';
				}else{
					echo '<script language="javascript">alert("có lỗi"); window.location="http://localhost/function/index.php";</script>';
				}
			}

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
=======
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
>>>>>>> 39c6c2db5ea8a00c16dfba08ee91b18ffc12fc6e
