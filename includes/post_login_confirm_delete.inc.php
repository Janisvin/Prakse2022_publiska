<?php
// Mainīgie
$pw1 = "";
$errorpw1 = $errorpw2 = $erroruid = $erroruid2 = "";
$msgpw1 = $msgpw2 = $msguid = "";

// ja ir uzpiesta poga
if ($_SERVER["REQUEST_METHOD"] == "POST")   //atjauno datus ar tālāk redzemās formas datiem
{

    function validate($str)
    {
        return trim(htmlspecialchars($str));
    }

    //lietotājvārda pārbaude
    $uid = validate($_POST['uid']);
    $pw1 = trim($_POST["pw1"]);


    // Pārbauda vai nav error, ja nav tad turpina
    if (empty($errorpw1) && empty($erroruid)) {
        // pārbauda paroli
        //$pwd = password_hash($pw1, PASSWORD_DEFAULT);

        $sql = "SELECT id, uid, pwd, email, bio, image, admin, timestamp FROM users WHERE uid = ?";

        if ($stmt = mysqli_prepare($con, $sql)) {
            // Pievieno mainīgo pie ?
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // mainīgais priekš stmt
            $param_username = $uid;

            // izspilda stmt
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                // Pārbauda vai lietotājs eksistē, ja eksistē, tad pārbauda paroli
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // apvieno mainīgos
                    mysqli_stmt_bind_result($stmt, $id, $uid, $hashed_password, $email, $bio, $image, $admin, $timestamp);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($pw1, $hashed_password)) {
                            // ja parole sakrīt tad sāk sessiju
                            session_start();

                            // pievieno sessijas mainīgos
                            $_SESSION["loggedin"] = true;
                            $_SESSION["userid"] = $_SESSION["id"] = $id;
                            $_SESSION["useruid"] = $_SESSION["username"] = $uid;
                            $_SESSION["email"] = $_SESSION["email"] = $email;
                            $_SESSION["bio"] = $_SESSION["bio"] = $bio;
                            $_SESSION["image"] = $_SESSION["image"] = $image;
                            $_SESSION["admin"] = $_SESSION["admin"] = $admin;
                            $_SESSION["timestamp"] = $_SESSION["timestamp"] = $timestamp;
                            header("location: ../includes/delete_user.inc.php");
                        } else {
                            // ja nesakrīt parole error
                            $login_err = "Nesakrīt lietoājs ar paroli.";
                        }
                    }
                } else {
                    // ja neeksistē lietotājs
                    $login_err = "Lietotājs neeksistē.";
                }
            } else {
                echo "Nezināma problēma!";
            }


            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($con);
}
?>
<div class="card mt-4 border-3">

    <div style="background-color: #495057;" class="card-title">
        <h3 class="text-white text-center py-3">Dzēst profilu</h3>
    </div>


    <div class="card-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <?php
            if (!empty($login_err)) {
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }
            ?>
            <div class="row g-2">
                <div class="col">

                    <div class="form-floating">
                        <input type="text" id="uid" name="uid" class="form-control mb-2 <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>">
                        <label class="dark" for="uid">Lietotājvārds:</label>
                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    </div>
                </div>


                <div class="col">

                    <div class="form-floating">
                        <input type="password" id="pw1" name="pw1" class="form-control mb-2 <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                        <label for=" pw1">Parole:</label>
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                </div>
            </div>


            <div class="d-flex justify-content-end">
                <div class="row">
                    <div class="col">

                        <a class="btn btn-primary" href="../index.php" role="button">Pārtraukt</a>
                        <?php include "../includes/modal_delete_confirm.inc.php" ?>
                        <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete_confirm">Dzēst profilu</a>


                    </div>
                </div>
            </div>
        </form>
    </div>
</div>