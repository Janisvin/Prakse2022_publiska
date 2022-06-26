<?php
if (isset($_POST['update'])) //atjauno datus ar tālāk redzemās formas datiem
{
    //mainīgie
    $error1 = ''; // sākumā nav vērtības
    $error2 = '';
    $id = $_POST['id'];
    $imageName = time() . '-' . $_FILES["image"]["name"]; //time lietoju, jo vēlos atļaut vienādus failus



    //funkcija kura pārveido simbolus drošā veidā un noņem liekās atstarpes
    function validate($str)
    {
        return trim(htmlspecialchars($str));
    }
    //pārbauda vai bio ir atļautās rakstzīmes, noņem liekās atstarpes
    $bio = validate($_POST['bio']);

    $email = validate($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "Epasts nav īsts.";
        $msg_class = "alert-danger";
        $error1 = "1";
    }

    // pārbauda vai mainīgajam $error ir kāda vērtība,
    //tas iegūst vērtību ja ir kļūda
    if (empty($error1)) {
        //email un bio
        $result = mysqli_query($mysqli, "UPDATE users SET email='$email',bio='$bio' WHERE id=$id");

        //Atjauno sessiju, lai nav vajadzības vēlreiz autorizēties
        $_SESSION["email"] = $email;
        $_SESSION["bio"] = $bio;
        $msg = "Veiksmīgi saglabāts!";
        $msg_class = "alert-success";
        header("Refresh: 1");
    }



    $target_file = '../img/' . basename($imageName);

    // Pārbaude
    // salīdzina bildes izmēru, nevar būt lielāks kā
    if ($_FILES['image']['size'] > 3145728) {
        $msg = "Bilde ir par lielu! Atļauts līdz 3MB.";
        $msg_class = "alert-danger";
        $error2 = "1";
    }
    // Ja nevēlas lai varētu būt vienāda nosaukuma bildes, tad $imagename noņem time() . '-' .
    // if (file_exists($target_file)) {
    // header("Location:?error=bilde_jau_eksitē");
    // exit;
    // }

    // ja bildei nav problēmas
    if (empty($error2)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $sql = "UPDATE users SET image='$imageName' WHERE id=$id";

            //atjauno sessiju, lai nav jaielogojās pa jaunam, lai mainītos
            $_SESSION["image"] = $imageName;


            if (mysqli_query($con, $sql)) {
                $msg = "Bilde veiksmīgi saglabāta!";
                $msg_class = "alert-success";
                header("Refresh: 1");
            }
        }
    }
?>
<?php
}

?>

<div class="card my-3 mx-2 border-3">
    <div class="card-title">
        <h3 class="text-white text-center py-3" style="background-color: #495057;">Atjaunot profilu</h3>
    </div>

    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <?php if (!empty($msg)) : ?>

                <div class="alert alert-dismissible fade show  <?php echo $msg_class ?>" style="width: 100%;" role="alert"> <a href="edit_user.php" type="button" class="btn-close"></a>

                    <?php echo $msg; ?>

                </div>
            <?php endif; ?>

            <div class="row g-2">
                <!-- epasts -->
                <div class="col-auto">
                    <div class="form-floating">
                        <input type="text" class="form-control mb-2" id="email" name="email" value="<?php echo $_SESSION["email"]; ?>" required>
                        <label class="dark" for="uid">Epasts:</label>
                    </div>
                </div>
                <!-- bilde -->
                <div class="col-auto">
                    <input type="file" class="form-control" id="image" name="image" placeholder="<?php echo $_SESSION["image"]; ?>" value="<?php echo $_SESSION["image"]; ?>">
                    <label for="image" class="form-label">
                        <p class="m-0">Mainīt profila bildi</p>
                    </label>
                </div>
            </div>

            <!-- bio -->
            <div class="row g-2">
                <div class="col">
                    <div class="form-floating">
                        <textarea type="text" style="height: 150px" class="form-control mb-2" id="bio" name="bio"><?php echo $_SESSION["bio"]; ?></textarea>
                        <label class="dark" for="bio">Bio:</label>
                    </div>
                </div>
            </div>




            <input type="hidden" class="form-control" name="id" value=<?php echo $_SESSION['userid']; ?>>


            <div class="d-flex justify-content-end">
                <div class="row">
                    <div class="col">
                        <a class="btn btn-danger" href="../index.php" role="button">Atpakaļ</a>
                        <button class="btn btn-success" input type="submit" value="update" name="update">Apstiprināt</button>

                    </div>
                </div>
            </div>

        </form>
    </div>
</div>