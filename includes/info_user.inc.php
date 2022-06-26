<?php

$id = $_GET['id'];
$_SESSION['viewuserinfo'] = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = $id";
$res_data = mysqli_query($con, $sql);

while ($user_data = mysqli_fetch_array($res_data)) {

?>


    <div class="card mt-4 border-3" style="width: 18rem;">

        <div class="card-title">

            <h3 class="text-center mt-3 mx-3 mb-0">Lietotājs <?php echo $user_data["uid"]; ?></h3>
        </div>
        <?php $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/img"; ?>
        <div class="card-body">
            <img src="<?php echo '../img/' . $user_data['image'] ?>" class="rounded" style="margin-left: auto; margin-right: auto; margin-bottom: 10px; display: block; width: 160px; height: 160px;" alt="Nav profila bilde">

            <h5>Bio:</h5>
            <p class="text-break"><?php echo wordwrap($user_data["bio"], 45, "<br />\n", true); ?></p>




            <?php
            if (isset($_SESSION["useruid"])) {
            ?>
                <?php
                if ($_SESSION['admin'] == "1") { ?>
                    <div class="row justify-content-between">

                        <div class="col-auto">
                            <a class="btn btn-danger" href="../app/users_admin.php" role="button">Atpakaļ</a>
                        </div>

                        <div class="col-auto">
                            <form method="post" action="../app/message.php">
                                <input hidden type="text" value="<?php echo $id ?>" name="target">
                                <input class="btn btn-primary" value="Sazināties" type="submit" name="submittarget">
                            </form>
                        </div>
                    </div>

                <?php } ?>

                <?php
                if ($_SESSION['admin'] == "0") { ?>
                    <div class="row justify-content-between">

                        <div class="col-auto">
                            <a class="btn btn-danger" href="../app/users.php" role="button">Atpakaļ</a>
                        </div>

                        <div class="col-auto">
                            <form method="post" action="../app/message.php">
                                <input hidden type="text" value="<?php echo $id ?>" name="target">
                                <input class="btn btn-primary" value="Sazināties" type="submit" name="submittarget">
                            </form>
                        </div>

                    <?php } ?>
                <?php } ?>

                    </div>
        </div>

    <?php
}
    ?>