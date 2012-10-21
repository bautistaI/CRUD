<?php

	echo "<table border= '1' cellpadding = '10'>";
	//CREATES TABLE HEADERS
	echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Address</th><th>Phone</th><th>Email</th><th>Edit</th><th>Delete</th></tr>";
	
	foreach( $contacts as $k => $row )
	{
		
			echo "<tr>";
			echo "<td>" . $row->contact_id    . "</td>";
			echo "<td>" . $row->contact_name  . "</td>";
			echo "<td>" . $row->contact_lname . "</td>";
			echo "<td>" . $row->contact_address . "</td>";
			echo "<td>" . $row->contact_phone . "</td>";
			echo "<td>" . $row->contact_email . "</td>";
			echo "<td><a href='edit_contact.php?id=" . $row->contact_id  . "'>Update</a></td>";
			echo "<td><a href='delete_contact.php?id="  . $row->contact_id  . "'>Delete</a></td>";
			echo "</tr>";
	}
	
	echo "</table>";
	

?>

<br />
<hr />

<p>To add a new Contact, please click "Add Contact".</p>
<a href="../views/add_contact_form.php"><em>Add Contact</em></a>

<br />
<hr />

<p><a href="logout.php">Logout!</a></p>





