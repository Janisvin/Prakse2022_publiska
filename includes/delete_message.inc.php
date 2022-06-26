<?php
include_once("../includes/connection.php");
if (isset($_POST['submitdelete']))  //atjauno datus ar tālāk redzemās formas datiem
{
    $id = $_POST['delete'];
    $result = mysqli_query($mysqli, "DELETE FROM messages WHERE messageid = $id");
    header("Location:../app/message.php");
}
