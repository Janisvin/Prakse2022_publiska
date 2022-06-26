<?php
$id = $_SESSION['idg'];

if (isset($_POST['submitedit'])) {

    //funkcija kura pārveido simbolus drošā veidā un noņem liekās atstarpes
    function validate($str)
    {
        return trim(htmlspecialchars($str));
    }
    $id = $_POST['edit']; //no post
    $_SESSION['idg'] = $id;
    $id = $_SESSION['idg'];
}


$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id = $id");
$user_data = mysqli_fetch_array($result);
$_SESSION['useruid2'] = $user_data['uid']
?>

<?php
$error = ''; // sākumā nav vērtības
$erroruid = ''; // sākumā nav vērtības

if (isset($_POST['update']))                                                        //atjauno datus ar tālāk redzemās formas datiem
{

    $id = $_SESSION['idg'];
    $admin = $_POST["admin"];

    //funkcija kura pārveido simbolus drošā veidā un noņem liekās atstarpes
    function validate($str)
    {
        return trim(htmlspecialchars($str));
    }
    //epasta pārbaude
    $email = validate($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "Epasts nav īsts.";
        $msg_class = "alert-danger";
        $error = "1";
    }

    // pārbauda vai mainīgajam $error ir kāda vērtība,
    //tas iegūst vērtību ja ir kļūda
    if (empty($error)) {
        //email un bio
        $result = mysqli_query($mysqli, "UPDATE users SET email='$email',admin='$admin' WHERE id=$id");
    }
    header("Location:../app/edit_user_admin.php");
}

if (isset($_POST['updateuid']))                                                        //atjauno datus ar tālāk redzemās formas datiem
{

    $id = $_SESSION['idg'];
    function validate($str)
    {
        return trim(htmlspecialchars($str));
    }
    //lietotājvārda pārbaude
    $uid = validate($_POST['uid']);
    if (!preg_match('/^[a-zA-Z0-9\s]+$/', $uid)) {
        $msg = "Lietoti aizliegtie simboli.";
        $msg_class = "alert-danger";
        $erroruid = "1";
    }

    //lietotājvārda pārbaude vai eksistē
    $select = mysqli_query($con, "SELECT * FROM users WHERE uid = '" . $_POST['uid'] . "'");
    if (mysqli_num_rows($select)) {
        $msg = "Lietotājvārds jau eksistē";
        $msg_class = "alert-danger";
        $erroruid = "1";
    }

    // pārbauda vai mainīgajam $error ir kāda vērtība,
    //tas iegūst vērtību ja ir kļūda
    if (empty($erroruid)) {
        //email un bio
        mysqli_close($con);
        $result = mysqli_query($mysqli, "UPDATE users SET uid='$uid' WHERE id=$id");
    }
    header("Location:../app/edit_user_admin.php");
}

?>



<div class="card my-3 border-3 mx-2" style="max-width: 25rem; min-width: 18rem;">

    <div class="card-title">
        <h3 class="text-white text-center py-3" style="background-color: #495057;">Mainīt datus id=<?php echo $_SESSION['idg'] ?></h3>
    </div>

    <div class="card-body">

        <?php if (!empty($msg)) : ?>

            <div class="alert alert-dismissible fade show  <?php echo $msg_class ?>" style="width: 100%;" role="alert"> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                <?php echo $msg; ?>

            </div>
        <?php endif; ?>
        <div class="row g-2">
            <div class="col">
                <form action="" method="POST">
                    <div class="form-floating">
                        <!--echo $user_data['uid'] ?> vairak info augšejos komentaros -->
                        <input type="text" class="form-control mb-2" id="uid" name="uid" value="<?php echo $user_data['uid'] ?>" required>
                        <label class="dark" for="uid">Lietotājvārds:</label>
                        <input type="hidden" class="form-control" name="id" value=<?php echo $_GET['update']; ?>>
                    </div>
            </div>

            <div class="col-auto">
                <button class="btn btn-success py-3 " input type="submit" value="updateuid" name="updateuid">OK</button>
            </div>

            </form>

        </div>
        <form action="" method="POST">

            <div class="row ">
                <div class="col">

                    <div class="form-floating">
                        <input type="text" class="form-control mb-2" id="email" name="email" value="<?php echo $user_data['email'] ?>" required>
                        <label class="dark" for="email">Epasts:</label>
                    </div>
                </div>

            </div>

            <div class="form-floating">

                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="admin" value="1" <?php if ($user_data['admin'] == 1) echo "checked" ?>>
                    <label class="form-check-label">Admin</label>
                </div>

            </div>

            <div class="row">

                <div class="col d-flex justify-content-start">
                    <input type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" value="Dzēst" data-bs-target="#delete">
                </div>
                <?php include "../includes/modal_delete_user_admin.inc.php" ?>
                <div class="col d-flex justify-content-end">
                    <a class="btn btn-danger mx-1" href="../app/users_admin.php" role="button">Atpakaļ</a>
                    <input type="submit" class="btn btn-sm btn-primary" value="Apstiprināt" name="update">
                </div>
            </div>

        </form>
    </div>
</div>