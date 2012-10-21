<h1>Login to View Your Contacts</h1>
<p>Please provide your username and password.</p>
<?php if( isset( $_GET['added_user'] ) ) { ?>
<div><p> Successfully added a user, you may now login </p></div>
<?php } ?>
<form action="?" method="POST">
	<label for="username">Username:</label>
		<input type="text" name="username" id="username" maxlength="20" size="20" /><br />
	<label for="password">Password:</label>
		<input type="password" name="password" id="password" maxlength="20" size="20" /><br />
	<input type="submit">
</form>
<hr>
<p><strong>If you are not a register user, please click "Add User".</strong></p>
<a href="add_user.php"><em>Add User</em></a>

<p></p>
<hr>

