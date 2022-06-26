<?php
// Mainīgie


$pw1 = $pw2 = "";
$errorpw1 = $errorpw2 = $erroruid = $erroruid2 = "";
$msgpw1 = $msgpw2 = $msguid = "";

//reģistrējoties, pagaidu bilde.
$image = "no_img.png";

// ja ir uzpiesta poga
if (isset($_POST['login']))   //atjauno datus ar tālāk redzemās formas datiem
{



    function validate($str)
    {
        return trim(htmlspecialchars($str));
    }

    //lietotājvārda pārbaude
    $uid = validate($_POST['uid']);
    if (!preg_match('/^[a-zA-Z0-9\s]+$/', $uid)) {
        $msguid = "Lietoti aizliegtie simboli.";
        $erroruid = "1";
    }

    //lietotājvārda pārbaude vai eksistē
    $select = mysqli_query($con, "SELECT * FROM users WHERE uid = '" . $_POST['uid'] . "'");
    if (mysqli_num_rows($select)) {
        $msguid = "Lietotājvārds jau eksistē";
        $erroruid2 = "1";
    }



    // Pārbauda paroli------------------------------------------------------
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

    // Pārbauda vai ir 2 parole
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
    if (empty($errorpw1) && empty($errorpw2) && empty($erroruid) && empty($erroruid2)) {
        // paroli nodrošina, padarot to nelasāmu, tikai salīdzināmu.
        $pwd = password_hash($pw1, PASSWORD_DEFAULT);

        $result = mysqli_query($mysqli, "INSERT INTO users(uid,pwd,image) VALUES ('$uid', '$pwd','$image')");

        if ($_SESSION['admin'] == 1) {  //Ja admins taisa lietāju, tad nav vajadzības vest uz login
            header("Location:../index.php");
            exit;
        }

        header("Location:../app/login.php");
    }
}
?>
<div class="card mt-4 border-3">
    <div class="card-title">
        <h3 class="text-white text-center py-3" style="background-color: #495057;">Reģistrēšanās</h3>
    </div>

    <div class="card-body">
        <form action="" method="POST">

            <!--Jaunais lietotājvārds-->

            <div class="row g-2">
                <div class="col">
                    <div class="form-floating">
                        <input type="text" id="uid" name="uid" placeholder=" " class="form-control mb-2 <?php echo (!empty($msguid)) ? 'is-invalid' : ''; ?>" value="" required>
                        <label for="username">Lietotājvārds :</label>
                        <span class="invalid-feedback"><?php echo $msguid; ?></span>
                    </div>
                </div>
            </div>

            <!--Jaunā parole-->
            <div class="row g-2">

                <div class="col">
                    <div class="form-floating">
                        <input type="password" id="pw1" placeholder=" " name="pw1" class="form-control mb-2 <?php echo (!empty($errorpw1)) ? 'is-invalid' : ''; ?>" value="" required>
                        <label class="dark" for="pw1">Jaunā parole :</label>
                        <span class="invalid-feedback"><?php echo $msgpw1; ?></span>
                    </div>
                </div>

                <!--Atkārto paroli-->
                <div class="col">

                    <div class="form-floating">
                        <input type="password" id="pw2" placeholder=" " name="pw2" class="form-control mb-2 <?php echo (!empty($errorpw2)) ? 'is-invalid' : ''; ?>" required>
                        <label class="dark" for="pw2">Atkārtot :</label>
                        <span class="invalid-feedback"><?php echo $msgpw2; ?></span>
                    </div>
                </div>



            </div>


            <p>Esi reģistrējies? <a href="../app/login.php">Autorizējies</a>.</p>
            <!--Pogas-->
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <div class="d-inline justify-content-end">
                        <a class="btn btn-danger" href="../index.php" role="button">Atpakaļ</a>
                        <button class="btn btn-success" input type="submit" value="login" name="login">Autorizēties</button>
                    </div>
                </div>
            </div>
    </div>

    </form>
</div>