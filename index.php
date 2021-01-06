<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>dang nhap dang ky</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<!-- dang nhap -->
	<p>dang nhap</p>
	<form action="in.php" method="post" style="border: 1px solid #eee; padding: 100px; background: #888;">
		<input type="text" name="in_name_email"><br>
		<input type="password" name="in_pass"><br>
		<input type="submit">
	</form>
	<br>
	<!-- dang ky -->
	<p>dang ky</p>
	<form action="up.php" method="post" style="border: 1px solid #eee; padding: 100px;background: #666">
		<input type="text" name="up_name"><br>
		<input type="text" name="up_email"><br>
		<input type="password" name="up_pass"><br>
		<input type="password" name="up_repass"><br>
		<input type="submit">
	</form>
</body>