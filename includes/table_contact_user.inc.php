<?php
include_once("../includes/connection.php"); //savienoju view un users tabulā lietotāja id.


if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 3;
$offset = ($pageno - 1) * $no_of_records_per_page;


$userid = $_SESSION['userid']; //paņem no sessijas  
$total_pages_sql = "SELECT COUNT(*) FROM contact INNER JOIN users ON contact.userid = users.id WHERE contact.userid='$userid' OR (admin='1' AND target='$userid')";
$result = mysqli_query($con, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM contact INNER JOIN users ON contact.userid = users.id WHERE contact.userid='$userid' OR (admin='1' AND target='$userid') ORDER BY contact.timestampcontact DESC LIMIT $offset, $no_of_records_per_page";
$res_data = mysqli_query($con, $sql);

?>






<?php
while ($user_data = mysqli_fetch_array($res_data)) {                            //izvada datus no datubāzes uz tabulu
?>

    <div class="card border-3 customcardbg mt-3 mb-0 mx-2 px-2 py-1">
        <div class="card-body">
            <p hidden>
                <?php
                echo wordwrap($user_data['id'], 15, "<br />\n", true);
                ?>
            </p>

            <div class="row justify-content-end">
                <a class="btn btn-close mx-2" href=<?php echo "../includes/delete_contact_user.inc.php?delete=$user_data[contactid]" ?> name="delete"></a>
            </div>
            <h4 class="text-center pb-2 border-bottom border-secondary text-break border-bottom border-secondary m-0" title="Tēma">
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
                echo wordwrap($user_data['timestampcontact'], 40, "<br />\n", true);
                ?>
            </p>

            <p hidden>
                <?php
                //echo wordwrap($user_data['viewid'], 15, "<br />\n", true);
                ?>
            </p>





        </div>
    </div>
<?php
}

?>