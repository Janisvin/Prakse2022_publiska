<?php if (isset($_POST['submit'])) {
    $useruid = $_SESSION['useruid']; //Lietotāja vārds, no sessijas
    $userid = $_SESSION['userid'];
    //Viss ir kārtībā tad ievieto datubāzē

    //funkcija kura pārveido simbolus drošā veidā un noņem liekās atstarpes
    function validate($str)
    {
        return trim(htmlspecialchars($str));
    }

    $subject = validate($_POST['subject']);
    $content = validate($_POST['content']);

    $result = mysqli_query($mysqli, "INSERT INTO contact(userid,user,subject,content) VALUES('$userid','$useruid','$subject','$content')");
    header("Location:../app/contact.php");
} ?>
<div class="card border-3 customcardbg my-3 mx-2" style="min-width: 20rem;">

    <div class="card-title">
        <h4 class="text-white text-center p-3 rounded" style="background-color: #495057; width: 100%;">Kontaktēties ar Administratoru</h4>
    </div>

    <div class="card-body m-2">
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
            </div>
            <div class="row justify-content-end">

                <div class="col-auto ">

                    <a class="btn btn-danger" href="../index.php" role="button">Atpakaļ</a>
                    <button class="btn btn-success" input type="submit" value="submit" name="submit">Apstiprināt</button>

                </div>
            </div>
    </div>
</div>