<?php include "../includes/session_start_loggedin.inc.php";
include_once("../includes/connection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom.css">
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/sort.js"></script>

    <title>Lietotājs</title>
</head>

<body>
    <!-- ja ir administrators -->
    <?php include "../includes/navbar_inc.inc.php"
    ?>

    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-auto">
                <?php include "../includes/info_user.inc.php" ?>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
    <script src="../js/darkmode.js"></script>
    <?php include "../includes/footer.inc.php"; ?>
</body>

</html>