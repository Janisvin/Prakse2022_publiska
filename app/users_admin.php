<?php
include "../includes/session_start_admin.inc.php";
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

    <title>Lietotāji</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
    <script src="../js/darkmode.js"></script>

    <!-- ja ir ielogojies-->
    <?php if (isset($_SESSION["userid"])) { ?>
        <!--ja ir admin-->
        <?php
        if ($_SESSION['admin'] == "1") { ?>

            <?php include "../includes/navbar_search.inc.php" ?>
            <?php include "../includes/footer.inc.php" ?>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col">
                        <?php include "../includes/table_users_admin.inc.php" ?>
                    </div>
                </div>
            </div>
    <?php
        }
    } ?>


</body>

</html>