<!DOCTYPE html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>Add Contact</title>
	</head>
	<body>
		<h1>Add Contact</h1>
			<hr>
		<p>Please add all required information.</p>

<form action='../controllers/add_contact.php' method='post'>
	First Name:<font color=red>*</font> <input type="text" name="contact_name" /><br />
	Last Name: <font color=red>*</font> <input type="text" name="contact_lname" /><br />
	Address: <font color=red>*</font> <input type="text" name="contact_address" /><br />
	Phone: <font color=red>*</font> <input type="text" name="contact_phone" /><br />
	Email: <font color=red>*</font> <input type="text" name="contact_email" /><br />
	<input type='submit' value='submit' />
</form>

<p>(*)required</p>

</body>