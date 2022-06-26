<?php include "../includes/session_start_loggedin.inc.php" ?>
<?php
include_once("../includes/connection.php");

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
    <title>Kontaktēties</title>
</head>

<body>
    <?php include "../includes/navbar_inc.inc.php" ?>

    <div class="container-sm">
        <div class="row justify-content-center">

            <div class="col bg-light rounded m-2 mb-1">
                <?php include "../includes/post_contact.inc.php" ?>
            </div>


            <div class="col bg-light rounded m-2 mb-1">
                <?php include "../includes/table_contact_user.inc.php" ?>
                <?php include "../includes/pagination_bot.inc.php" ?>
            </div>

        </div>



        <?php include "../includes/footer.inc.php" ?>
        <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
        <script src="../js/darkmode.js"></script>

</body>



</html>