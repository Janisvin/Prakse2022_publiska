<?php

include_once("../includes/connection.php");


$id = $_GET['delete'];


$result = mysqli_query($mysqli, "DELETE FROM contact WHERE contactid=$id");


header("Location:../app/contact.php");
