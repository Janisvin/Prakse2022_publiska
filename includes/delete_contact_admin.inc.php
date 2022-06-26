<?php

include_once("../includes/connection.php");

if (isset($_POST['submitdelete']))  //atjauno datus ar tālāk redzemās formas datiem
{
    $id = $_POST['delete'];

    $result = mysqli_query($mysqli, "DELETE FROM contact WHERE contactid = $id");
    header("Location:../app/contact_admin_table.php");
}
