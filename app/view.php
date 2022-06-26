<?php include "../includes/session_start_loggedin.inc.php" ?>

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

  <title>Ziņojumi</title>
</head>

<body>
  <!-- ja ir administrators -->
  <?php include "../includes/navbar_inc.inc.php"
  ?>
  <?php if ($_SESSION['admin'] == "1") { ?>

    <div class="container-lg">
      <div class="row justify-content-center">
        <p class="m-3 mb-0  display-6 text-center">Ziņojumi</p>
      </div>
      <div class="row justify-content-center">

        <div class="col bg-light rounded m-2 mb-1">
          <?php include "../includes/post_view.inc.php" ?>
        </div>

        <div class="col bg-light rounded m-2 mb-1">
          <?php include "../includes/table.inc_admin.php" ?>
          <?php include "../includes/pagination_bot.inc.php" ?>
        </div>

        <div class="col bg-light rounded m-2 mb-1">
          <?php include "../includes/info.inc.php" ?>
        </div>

      </div>
    </div>
    <!-- ja nav administraors-->
  <?php } else if ($_SESSION["admin"] == "0") { ?>

    <div class="container-lg">
      <div class="row justify-content-center">
        <p class="m-3 mb-0  display-6 text-center">Ziņojumi</p>
      </div>
      <div class="row justify-content-center">

        <div class="col bg-light rounded m-2 mb-1">
          <?php include "../includes/post_view.inc.php" ?>
        </div>

        <div class="col bg-light rounded m-2 mb-1">
          <?php include "../includes/table.inc.php" ?>
          <?php include "../includes/pagination_bot.inc.php" ?>
        </div>

        <div class="col bg-light rounded m-2 mb-1">
          <?php include "../includes/info.inc.php" ?>
        </div>

      </div>
    </div>

    <!-- ja nav ielogojies -->
  <?php } else {


  ?>
    <div class="container-lg">
      <div class="row justify-content-center">
        <div class="col-3 ">
          <?php include "../includes/info.inc.php" ?>
        </div>
      </div>
    </div>

  <?php

  }

  ?>

  <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
  <script src="../js/darkmode.js"></script>
  <?php include "../includes/footer.inc.php"; ?>
</body>

</html>