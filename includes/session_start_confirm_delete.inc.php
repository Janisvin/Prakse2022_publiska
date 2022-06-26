<?php
// Sāk sessiju
ob_start(); //vajadzigs, lai formas ietu header
session_start();

// ja lietotājs ir ielogojies tad izlogos, ja nav bijis iepriekšēji ielogojies, tad error

if ($_SESSION["loggedin"] == true) {
    session_unset();
    session_destroy();
} else {
    header("location: ../app/login.php?error=nēesi_autorizējies");
}
