<?php
include_once("../includes/connection.php"); //savienoju view un users tabulā lietotāja id.



if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 3;
$offset = ($pageno - 1) * $no_of_records_per_page;



$total_pages_sql = "SELECT COUNT(*) FROM view";
$result = mysqli_query($con, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM view INNER JOIN users ON view.userid = users.id ORDER BY view.timestamp DESC LIMIT $offset, $no_of_records_per_page";
$res_data = mysqli_query($con, $sql);

?>


<?php
while ($user_data = mysqli_fetch_array($res_data)) {                            //izvada datus no datubāzes uz tabulu
?>
    <div class="card border-3 customcardbg mt-3 mb-0 mx-2 px-2 py-1" style="min-width: 20rem;">
        <div class="card-body">

            <div class="row">
                <div class="col">

                    <p hidden>
                        <?php
                        echo wordwrap($user_data['id'], 15, "<br />\n", true);
                        ?>
                    </p>

                    <h4 class="text-center pb-2 border-bottom border-secondary text-break border-bottom border-secondary" title="Tēma">
                        <?php
                        echo wordwrap($user_data['subject'], 40, "<br />\n", false);
                        ?>
                    </h4>


                    <p class="text-center p-2 text-break border-bottom border-secondary" title="Ziņojums">
                        <?php
                        echo wordwrap($user_data['content'], 65, "<br />\n", false);
                        ?>
                    </p>

                    <a href="<?php echo "../app/view_user_info.php?id=$user_data[id]" ?>" class="text-end text-secondary m-0 fst-italic" style="font-size: 0.7rem; display:flex; justify-content: end;" title="Lietotājs">
                        <?php //uid no users table, ieguvu ar inner join
                        echo wordwrap($user_data['uid'], 40, "<br />\n", true);
                        ?>
                    </a>

                    <p class="text-end text-secondary m-0 fst-italic" style="font-size: 0.7rem;" title="Laiks">

                        <?php
                        echo wordwrap($user_data['timestamp'], 40, "<br />\n", true);
                        ?>
                    </p>

                    <?php
                    //kad sesija sakritīs ar ziņojuma publicētāju, tad varēs /update /delete

                    //refaktorēju ar post, lai uzalabotu drošību

                    if ($_SESSION['id'] == $user_data['userid']) {
                    ?>

                        <div class="row justify-content-between">

                            <div class="col-auto">
                                <form method="post" action="../includes/delete_view.inc.php">
                                    <input hidden type="text" value="<?php echo $user_data['viewid'] ?>" name="viewid">
                                    <input class="btn btn-danger mx-0" value="Dzēst" type="submit" name="delete">
                                </form>
                            </div>

                            <div class="col-auto">
                                <form method="post" action="../app/edit_view.php">
                                    <input hidden type="text" value="<?php echo $user_data['viewid'] ?>" name="view">
                                    <input class="btn btn-primary mx-0" value="Mainīt" type="submit" name="edit">
                                </form>
                            </div>

                        </div>

                    <?php } else { ?>
                        <div class="row justify-content-start">
                            <div class="col-auto">
                                <form method="post" name="delete" action="../includes/delete_view.inc.php">
                                    <input hidden type="text" value="<?php echo $user_data['viewid'] ?>" name="viewid">
                                    <input class="btn btn-danger mx-0" value="Dzēst" type="submit" name="delete">
                                </form>
                            </div>
                            <div class="col-auto"> </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
<?php
}

?>