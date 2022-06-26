<?php
include_once "../includes/connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom.css">
    <script src="../js/bootstrap.bundle.js"></script>
    <title>Autorizēšanās</title>
</head>

<body>

    <?php include "../includes/navbar_inc.inc.php" ?>

    <div class="container">
        <div class="row">
            <div class="col">

            </div>

            <div class="col-auto">
                <?php include "../includes/post_login.inc.php" ?>
            </div>

            <div class="col">

            </div>

        </div>

        <?php include "../includes/footer.inc.php" ?>
        <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
        <script src="../js/darkmode.js"></script>
</body>

</html>