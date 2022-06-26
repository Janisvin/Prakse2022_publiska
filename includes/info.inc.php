<?php
if (isset($_SESSION["useruid"])) {
?>
  <!-- Ja ir ielogojies -->
  <div class="card my-3 mx-2 border-3" style="max-width: 25rem;">

    <div class="card-title">

      <h3 class="text-center mt-3 mx-3 mb-0">Sveiki! <?php echo $_SESSION["useruid"]; ?></h3>
    </div>
    <div class="card-body">
      <img src="<?php echo '../img/' . $_SESSION['image'] ?>" class="rounded" style="margin-left: auto; margin-right: auto; margin-bottom: 10px; display: block; width: 160px; height: 160px;" alt="Nav profila bilde">
      <h5>Epasts:</h5>
      <p><?php echo $_SESSION["email"]; ?></p>

      <h5>Bio:</h5>
      <p class="text-break"><?php echo wordwrap($_SESSION["bio"], 45, "<br />\n", true); ?></p>
    </div>

  </div>

<?php
} else {
?>
  <!-- Ja nav ielogojies  -->

  <div class="card mt-4 border-3" style="width: 18rem;">

    <div class="card-title">
      <h3 class="text-center mt-3">Neesi reģistrējies</h3>
    </div>

    <div class="card-body">
      <img src="../img/no_img.png" class="rounded" style="margin-left: auto; margin-right: auto; margin-bottom: 10px; display: block; max-width: 160px; max-height: 160px;">

      <h5>Epasts:</h5>
      <p>Neesi reģistrējies</p>

      <h5>Bio:</h5>
      <p>Neesi reģistrējies</p>
    </div>
  </div>


<?php
}
?>