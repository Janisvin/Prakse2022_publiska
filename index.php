<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/custom.css">
  <script src="js/bootstrap.bundle.js"></script>
  <title>Mājaslapa</title>
</head>

<body>



  <!-- ir admin > nav admin > ja nav ielogojies -->
  <?php if (isset($_SESSION["userid"])) { ?>
    <!--ja ir admin-->
    <?php
    if ($_SESSION['admin'] == "1") { ?>
      <?php include "includes/navbar_index.inc.php" ?>

      <div class="container">
        <div class="row justify-content-center">

          <?php include "includes/menu_admin.inc.php" ?>


        </div>
      </div>




      <!--ja nav admin-->
    <?php } else if ($_SESSION["admin"] == "0") { ?>

      </div>
      <?php include "includes/navbar_index.inc.php" ?>

      <div class="container">
        <div class="row justify-content-center">

          <?php include "includes/menu_log.inc.php" ?>


        </div>
      </div>


    <?php }
  } else { ?>
    <!--ja nav ielogojies-->
    <?php include "includes/navbar_index.inc.php" ?>

    <div class="container-lg">
      <div class="row justify-content-center">

        <?php include "includes/menu_nolog.inc.php";
        //Pievieno sessijas admin vērtību uz 3, lai admin būtu kāda vērtība,
        //kura nepieciešama view.php, lai nerādītu error.
        //$_SESSION['admin'] = 3;

        ?>


      </div>
    </div>


  <?php } ?>

  <?php include "includes/footer_index.inc.php" ?>

  <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
  <script src="js/darkmode.js"></script>

</body>

</html>