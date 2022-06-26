<?php

include_once("../includes/connection.php");

//ņem no '../includes/delete_contact_user_admin.inc.php?delete=$user_data[id]&reply=$userid'
$id = $_GET['delete']; //?delete=$user_data[id]

$result = mysqli_query($mysqli, "DELETE FROM contact WHERE contactid=$id");

//lai atvertu contact_admin ar to pašu lietotāju
header("Location:../app/contact_admin.php");
