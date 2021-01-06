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

$arr_up = [
	'ten' 		=> 	'an_sdsfd45fd',
	'email' 	=> 	'hathanhan@gmail.com',
	'password' 	=> 	'123',
	'repass'	=>	'123'

];
$arr_in = [
	'ten' 		=> 	'an',
	'password' 	=> 	'123'

];

print_r( Val($arr_up));
//check in
function In_val($arr=''){
	echo 'in';
	//nam
}

//check up
function Up_val($arr=''){
	// khai bao mangg tra ve
	$result = [];

	if (count($arr) ==4) {
		if ($arr['ten'] !='' && $arr['email']!='' && $arr['password'] !='' && $arr['repass'] !='') {
			// echo 'ok';
			// check ten dang nhap
			$result['ten'] = preg_match('/^[A-z_0-9](\w|\.|_){5,32}/is',$arr['ten']) !=false ?  $arr['ten'] : 'ten chua dung'; 
			$result['email'] = preg_match('/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}/is',$arr['email']) !=false ? $arr['email'] : 'email khong dung';
			

			// tim regex pass hoanf thanh - long
			if ($arr['password'] != $arr['repass']) {
				$result['errs'] = '2 pass phai giong nhau';
			}else{
				$result['password'] = $arr['password'];
				$result['repass'] = $arr['repass'];
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