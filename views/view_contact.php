<form action='/crud/controllers/edit_contact.php' method='post'>
	Name: <input type="text" name="contact_name" value="<?php echo $contact->contact_name ?>"> <br />
	Last Name: <input type="text" name="contact_lname" value="<?php echo $contact->contact_lname ?>" > <br />
	Address: <input type="text" name="contact_address" value="<?php echo $contact->contact_address ?>"> <br />
	Phone:  <input type="text" name="contact_phone" value="<?php echo $contact->contact_phone ?>"> <br />
	Email:  <input type="text" name="contact_email" value="<?php echo $contact->contact_email ?>"> <br />
           <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" >
	<input type="submit" value="save" />
</form>