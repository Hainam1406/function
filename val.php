<?php  

/*2. file val.php
dau vao la 1 mang

cau truc cua mang gom
1 [
	'ten'=>data,
	'email'=>data,
	'password'=>data,
	'repass'=>data
]
*/
/*


thuat toan
khi dang nhap thi no se truyen vao 2 tham so
khi dang ky no se truyena vao 4 tham so
	count de switch vao function
 */

//call
function Val($arr=''){
	switch (count($arr)) {
		case 4:
			return Up_val($arr);
			break;
		case 2:
			return In_val($arr);
			break;
		default:
			echo 'err';
			break;
	}

}

// $arr_up = [
// 	'ten' 		=> 	'an_sdsfd45fd',
// 	'email' 	=> 	'hathanhan@gmail.com',
// 	'password' 	=> 	'123',
// 	'repass'	=>	'123'

// ];
// $arr_in = [
// 	'ten'		=> 	'Nguyen Hai Nam',
// 	'password' 	=> 	'dffafaw11'

// ];

// print_r( Val($arr_in));
// check in
function In_val($arr=''){
	// khai bao mang tra ve
	$result = [];
	if(count($arr) == 2) {
		if($arr['in_name_email'] !='' && $arr['in_pass'] !=''){
			$result['in_name_email'] = preg_match('/^[A-z_0-9](\w|\.|_){5,32}/is',$arr['in_name_email']) !=false ?  $arr['in_name_email'] : 'Tên hoặc email chưa chính xác';
			// $result['email'] = preg_match('/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}/is',$arr['email']) !=false ? $arr['email'] : 'email khong dung';
			$result['in_pass'] = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/is',$arr['in_pass']) != false ? $arr['in_pass'] : 'Mật khẩu k đúng định dạng';

		}else{
			$result['errs'] = 'Thông tin đăng nhập chưa đầy đủ';
		}
		return $result;
	}else{
		return false;
	}
}

//check up
function Up_val($arr=''){
	// khai bao mangg tra ve
	$result = [];

	if (count($arr) ==4) {
		if ($arr['up_name'] !='' && $arr['up_email']!='' && $arr['up_pass'] !='' && $arr['up_repass'] !='') {
			echo '<pre>';
			// die;


			// print_r($arr);
			// check ten dang nhap
			$result['up_name'] = preg_match('/^[A-z_0-9](\w|\.|_){5,32}/is',$arr['up_name']) !=false ?  $arr['up_name'] : 'ten chua dung'; 

			$result['up_email'] =/* preg_match('/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}/is',$arr['up_email']) !=false ?*/ $arr['up_email'] /*: 'email khong dung'*/;
			// die;
			// print_r($result);

			// tim regex pass hoanf thanh - long
			if ($arr['up_pass'] != $arr['up_repass']) {
				$result['errs'] = '2 pass phai giong nhau';
			}else{
				$result['up_pass'] = $arr['up_pass'];
				$result['up_repass'] = $arr['up_repass'];
			}

			
		}else{
			$result['errs'] = ' ban phai nhap day du cac truong';
		}

		return $result;
	}else{
		return false;
	}
}
?>