<?php
// Sāk sessiju
ob_start(); //vajadzigs, lai formas ietu header
session_start();

// Pārbauda, vai esi administrators, ja neesi, tad izlogos un aizvedīs uz index.php ar error
if ($_SESSION['admin'] != 1) {
    session_unset();
    session_destroy();

    header("location: ../index.php?error=nēesi_administrators");
    exit;
}
