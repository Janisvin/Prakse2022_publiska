<?php
include_once("../includes/connection.php");
if (isset($_POST['postview'])) {

    function validate($str)
    {
        return trim(htmlspecialchars($str));
    }

    $subject = validate($_POST['subject']);
    $content = validate($_POST['content']);
    $userid = $_POST['userid'];
    //Lietotāja id, no sessijas

    //Viss ir kārtībā tad ievieto datubāzē
    $result = mysqli_query($mysqli, "INSERT INTO view(userid,subject,content) VALUES('$userid','$subject','$content')");
    header("Location:../app/view.php");
} ?>

<div class="card border-3 customcardbg my-3 mx-2" style="min-width: 20rem;">

    <div class="card-title">
        <h3 class="text-center mt-3">Izveidot ziņojumu</h3>
    </div>

    <div class="card-body">
        <form action="" method="POST">

            <div class="row g-2">

                <div class="col">

                    <div class="form-floating">
                        <input type="text" class="form-control mb-2" id="subject" name="subject" required>
                        <label for="subject">Tēma :</label>
                    </div>
                </div>


            </div>
            <div class="row g-2">
                <div class="col">

                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" id="content" name="content" style="height: 100px;"> </textarea>
                            <label for="content">Ziņojums :</label>
                        </div>
                    </div>
                </div>
                <input type="hidden" class="form-control" name="userid" value=<?php echo $_SESSION['userid'] ?>>
            </div>
            <div class="row justify-content-end">
                <div class="col-auto">
                    <button class="btn btn-success" input type="submit" value="submit" name="postview">Apstiprināt</button>
                </div>
            </div>
        </form>
    </div>
</div>