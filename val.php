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