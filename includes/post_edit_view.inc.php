<?php
if (isset($_POST['edit'])) //atjauno datus ar tālāk redzemās formas datiem
{
    $viewid = $_POST['view'];
    $_SESSION['editview'] = $viewid;
    $viewidsaved = $_SESSION['editview'];
}

$sql = "SELECT * FROM view WHERE viewid = $viewidsaved";
$res_data = mysqli_query($con, $sql);

if (isset($_POST['update'])) //atjauno datus ar tālāk redzemās formas datiem
{
    $viewidsaved = $_SESSION['editview'];
    function validate($str)
    {
        return trim(htmlspecialchars($str));
    }
    //pārbauda vai subject ir atļautās rakstzīmes, noņem liekās atstarpes

    $subject = validate($_POST['subject']);
    $content = validate($_POST['content']);

    $result = mysqli_query($mysqli, "UPDATE view SET subject='$subject',content='$content' WHERE viewid=$viewidsaved");
    header("Location:../app/view.php");
}
?>

<div class="card my-3 mx-2 border-3" style="min-width: 25rem;">

    <div class="card-title">
        <h3 class="text-white text-center py-3" style="background-color: #495057;">Mainīt ziņojumu</h3>
    </div>

    <div class="card-body">

        <?php
        while ($user_data = mysqli_fetch_array($res_data)) {                            //izvada datus no datubāzes uz tabulu
        ?>
            <form action="" method="POST">

                <!-- tēma -->
                <div class="row g-2">
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control mb-2" id="subject" name="subject" value="<?php echo $user_data["subject"]; ?>">
                            <label class="dark" for="subject">Tēma:</label>
                        </div>
                    </div>
                </div>



                <!-- Ziņojums -->
                <div class="row g-2">
                    <div class="col">
                        <div class="form-floating">
                            <textarea type="text" style="height: 179px" class="form-control mb-2" id="content" name="content"><?php echo $user_data["content"]; ?></textarea>
                            <label class="dark" for="content">Ziņojums:</label>
                        </div>
                    </div>
                </div>



                <input type="hidden" class="form-control" name="id" value=<?php echo $_SESSION['userid']; ?>>
                <div class="d-flex justify-content-end">
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-danger" href="../app/view.php" role="button">Atpakaļ</a>
                            <input class="btn btn-success" type="submit" value="Mainīt" name="update">

                        </div>
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
</div>