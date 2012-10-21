<!DOCTYPE html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>Add User</title>
	</head>
	<body>
		<h1>Add User</h1>
			<hr>
		<p>Please add all required information.</p>

<form action='add_user.php' method='post'>
	Username Name:<font color=red>*</font> <input type="text" name="user_name" /><br />
	Full Name: <font color=red>*</font> <input type="text" name="full_name" /><br />
	Password: <font color=red>*</font> <input type="password" name="password" /><br />
	<input type='submit' value='submit' />
</form>

<p>(*)required</p>

</body>

