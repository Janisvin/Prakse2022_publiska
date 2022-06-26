<?php

include_once("../includes/connection.php");


if (isset($_POST['delete']))  //atjauno datus ar tālāk redzemās formas datiem
{
    $id = $_POST['viewid'];
}


$result = mysqli_query($mysqli, "DELETE FROM view WHERE viewid = $id");


header("Location:../app/view.php");
