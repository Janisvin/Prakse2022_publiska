<?php
include_once("../includes/connection.php");
$useruid = $_SESSION['useruid']; //Lietotāja vārds, no sessijas
$userid = $_SESSION['userid'];
$target = $_SESSION['target']; //kam suta
$sql = "SELECT user FROM messages WHERE userid=$target";
$res_data = mysqli_query($con, $sql);
$back = $_SESSION['viewuserinfo'];

if (isset($_POST['submit'])) {


    //funkcija kura pārveido simbolus drošā veidā un noņem liekās atstarpes
    function validate($str)
    {
        return trim(htmlspecialchars($str));
    }

    $message = validate($_POST['message']);

    $result = mysqli_query($mysqli, "INSERT INTO messages(userid,user,message,target) VALUES('$userid','$useruid','$message','$target')");
    header("Location:../app/message.php");
} ?>

<div class="card border-3 customcardbg my-3 mx-2" style="min-width: 20rem;">

    <?php while ($user_data = mysqli_fetch_array($res_data)) {
        $targetname = $user_data['user'];
    } ?>
    <div class="card-title">
        <h4 class="text-white text-center p-3 rounded" style="background-color: #495057; width: 100%;">Saziņa ar <?php echo $targetname ?></h4>
    </div>

    <div class="card-body m-2">
        <form action="" method="POST">

            <div class="row g-2">

                <div class="col">

                    <div class="form-floating">
                        <input type="text" class="form-control mb-2" id="message" name="message" required>
                        <label for="subject">Īssziņa :</label>
                    </div>
                </div>

            </div>
            <div class="row justify-content-end">

                <div class="col-auto ">

                    <a class="btn btn-danger" href="../app/view_user_info.php?id=<?php echo $back ?>" role="button">Atpakaļ</a>
                    <button class="btn btn-success" input type="submit" value="submit" name="submit">Apstiprināt</button>

                </div>
            </div>
        </form>
    </div>
</div>