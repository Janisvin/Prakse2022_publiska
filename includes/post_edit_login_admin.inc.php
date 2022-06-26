<?php
// Mainīgie

$useruid = $_SESSION["useruid"];
$pw1 = $pw2 = "";
$errorpw1 = $errorpw2 = $erroruid = "";
$msgpw1 = $msgpw2 = $msguid = "";
$id = $_SESSION["userid"];


//Maina paroli-----------------------------------------------------

if (isset($_POST['updatepw'])) {

    // Pārbauda jauno paroli
    if (empty(trim($_POST["pw1"]))) {
        $msgpw1 = "Ievadiet paroli.";
        $errorpw1 = "1";
    } elseif (strlen(trim($_POST["pw1"])) < 5) {
        $msgpw1 = "Parolei jāsatur 5 rakstzīmes.";
        $errorpw1 = "1";
    } else {
        //ok
        $pw1 = trim($_POST["pw1"]);
    }

    // Pārbauda 2 paroli
    if (empty(trim($_POST["pw2"]))) {
        $msgpw1 = "Apstipriniet paroli.";
        $errorpw2 = "1";
    } else {
        //ok
        $pw2 = trim($_POST["pw2"]);

        //nesakrīt
        if (empty($errorpw1) && ($pw1 != $pw2)) {
            $msgpw2 = "Paroles nesakrīt.";
            $errorpw2 = "1";
        }
    }

    // Pārbauda vai nav error, ja nav tad turpina
    if (empty($errorpw1) && empty($errorpw2)) {

        // paroli nodrošina, padarot to nelasāmu, tikai salīdzināmu.
        $pwd = password_hash($pw1, PASSWORD_DEFAULT);

        $result = mysqli_query($mysqli, "UPDATE users SET pwd='$pwd' WHERE id=$id");
        header("Location:../app/edit_login_admin.php?update=$id");
    }
}
?>

<div class="card mt-4 border-3">
    <div class="card-title">
        <h3 class="text-white text-center py-3" style="background-color: #495057;">Mainīt pierakstīšanās datus</h3>
    </div>

    <div class="card-body">
        <form action="" method="POST">

            <!--Jaunā parole-->
            <div class="row g-2">

                <div class="col-5">
                    <div class="form-floating">
                        <input type="password" id="pw1" placeholder=" " name="pw1" class="form-control mb-2 <?php echo (!empty($errorpw1)) ? 'is-invalid' : ''; ?>" value="<?php echo $pw1; ?>">
                        <label class="dark" for="pw1">Jaunā parole :</label>
                        <span class="invalid-feedback"><?php echo $msgpw1; ?></span>
                    </div>
                </div>

                <!--Atkārto paroli-->
                <div class="col">

                    <div class="form-floating">
                        <input type="password" id="pw2" placeholder=" " name="pw2" class="form-control mb-2 <?php echo (!empty($errorpw2)) ? 'is-invalid' : ''; ?>">
                        <label class="dark" for="pw2">Atkārtot :</label>
                        <span class="invalid-feedback"><?php echo $msgpw2; ?></span>
                    </div>
                </div>

                <div class="col-auto">
                    <button class="btn btn-success p-3" input type="submit" value="updatepw" name="updatepw">Mainīt</button>
                </div>

            </div>



            <!--Pogas-->
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <div class="d-inline justify-content-end">
                        <a class="btn btn-danger" href="../index.php" role="button">Atpakaļ</a>
                    </div>
                </div>
            </div>
    </div>

    </form>
</div>