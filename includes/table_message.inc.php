<?php
include_once("../includes/connection.php"); //savienoju view un users tabulā lietotāja id.

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 5;
$offset = ($pageno - 1) * $no_of_records_per_page;


$userid = $_SESSION['userid']; //paņem no sessijas  
$target = $_SESSION['target'];

$total_pages_sql = "SELECT COUNT(*) FROM messages INNER JOIN users ON messages.userid = users.id WHERE (messages.userid='$userid' AND messages.target='$target') OR (messages.target='$userid' AND users.id='$target')";
$result = mysqli_query($con, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM messages INNER JOIN users ON messages.userid = users.id WHERE (messages.userid='$userid' AND messages.target='$target') OR (messages.target='$userid' AND users.id='$target') ORDER BY messages.timestampmessage DESC LIMIT $offset, $no_of_records_per_page";
$res_data = mysqli_query($con, $sql);

?>





<div class="card border-3 customcardbg mt-3 mb-0 mx-2 px-2 py-0">
    <?php
    while ($user_data = mysqli_fetch_array($res_data)) {
    ?>



        <div class="card-body border-bottom border-secondary">


            <form method="post" action="../includes/delete_message.inc.php">
                <div class="row justify-content-end">
                    <input hidden type="text" value="<?php echo $user_data['messageid'] ?>" name="delete">
                    <input class="btn btn-close mx-2 mt-0" value=" " type="submit" name="submitdelete">
                </div>
            </form>

            <?php
            if ($target == $user_data['userid'] && $userid == $user_data['userid']) { ?>
                <div class="mx-3 my-0">
                    <h5 class="text-center text-info py-0 my-0 text-break mx-5" title="Īsziņa">
                        <?php
                        echo wordwrap($user_data['message'], 40, "<br />\n", false);
                        ?>
                    </h5>
                </div>

            <?php
            } else if ($target == $user_data['userid']) {
            ?>
                <div class="mx-3 my-0">
                    <h5 class="text-success text-end py-0 mx-5 my-0 text-break" title="Īsziņa">
                        <?php
                        echo wordwrap($user_data['message'], 40, "<br />\n", false);
                        ?>
                    </h5>
                </div>
            <?php
            } else if ($userid == $user_data['userid']) {
            ?>

                <h5 class="text-left text-info py-0 my-0 text-break mx-5" title="Īsziņa">
                    <?php
                    echo wordwrap($user_data['message'], 40, "<br />\n", false);
                    ?>
                </h5>

            <?php
            }
            ?>

            <a href="<?php echo "../app/view_user_info.php?id=$user_data[id]" ?>" class="text-end text-secondary m-0 fst-italic" style="font-size: 0.7rem; display:flex; justify-content: end;" title="Lietotājs">
                <?php //uid no users table, ieguvu ar inner join
                echo wordwrap($user_data['uid'], 40, "<br />\n", true);
                ?>
            </a>

            <p class="text-end text-secondary m-0 fst-italic" style="font-size: 0.7rem;" title="Laiks">
                <?php
                echo wordwrap($user_data['timestampmessage'], 40, "<br />\n", true);
                ?>
            </p>
        </div>

    <?php
    }

    ?>
</div>