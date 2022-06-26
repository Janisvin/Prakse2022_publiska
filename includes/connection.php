
<?php
$con = mysqli_connect("127.0.0.1:3306", "u180685278_OVnDt", "UjkasdfbnvCphpmyadmin12323", "u180685278_urcxZ");
if (!$con) {
    die(" Connection Error ");
}
?>
<?php

$databaseHost = '127.0.0.1:3306';
$databaseName = 'u180685278_urcxZ';
$databaseUsername = 'u180685278_OVnDt';
$databasePassword = 'UjkasdfbnvCphpmyadmin12323';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

?>



<?php
//$con = mysqli_connect("localhost", "root", "", "jv_prakse2022");
//if (!$con) {
//die(" Connection Error ");
//}
?>
<?php
//$databaseHost = 'localhost';
//$databaseName = 'jv_prakse2022';
//$databaseUsername = 'root';
//$databasePassword = '';
//
//$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
?>