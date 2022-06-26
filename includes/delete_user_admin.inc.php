<?php
include_once("../includes/connection.php");
include_once("../includes/session_start_admin.inc.php");

$id = $_SESSION['idg']; //sesijas vertibu iegust no post_edit_user_admin
//$uid2 = $_SESSION["useruid2"];
//$recovery = rand(100, 10000); //"dzešot" profilu lietotājvārdam piešķirs random skaitli, liedzot pieeju

//dzēš ziņojumus, īssziņas, kontaktēšanās ziņas ar administratoru //ja vairs ne ->//  un maina vardu lai liegtu piekļuvi

//$result = mysqli_query($mysqli, "DELETE FROM view, messages, contact
//WHERE view.userid = $id OR messages.userid = $id OR contact.userid = $id");

$result1 = mysqli_query($mysqli, "DELETE FROM view WHERE userid = $id");
// ar target ari speju izdest cita lietotaja sutijumus -> dzestajam.
$result2 = mysqli_query($mysqli, "DELETE FROM messages WHERE userid = $id OR target = $id");
$result3 = mysqli_query($mysqli, "DELETE FROM contact WHERE userid = $id OR target = $id");

//kad ir izdzēsti visi ieraksti tad var izdzēst lietotāju
$result4 = mysqli_query($mysqli, "DELETE FROM users WHERE id = $id");

//šeit izmantoju "=" zīmi, jo nav iespējams reģistrēt ar simboliem. Lai samazinātu iespējamību sakrist
//ja negrib dzēst, bet liegt pieeju --> $result = mysqli_query($mysqli, "UPDATE users SET uid='$uid2=del$recovery' WHERE id=$id");

header("Location:../app/users_admin.php");
