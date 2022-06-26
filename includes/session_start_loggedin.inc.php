<?php
// Sāk sessiju
ob_start(); //vajadzigs, lai formas ietu header
session_start();

// Pārbauda, vai esi autorizējies
if ($_SESSION["loggedin"] != true) {
    session_unset();
    session_destroy();

    header("location: ../app/login.php?error=nēesi_autorizējies");
    exit;
}
