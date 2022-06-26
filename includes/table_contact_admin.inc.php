<?php
include_once("../includes/connection.php");
$result = mysqli_query($mysqli, "SELECT * FROM contact INNER JOIN users ON contact.userid = users.id  ORDER BY timestamp DESC");

?>

<script src="../js/sort.js"></script>
<div class="table table-responsive">
    <table class="table table-bordered sortable table-hover" id="tabula">

        <thead class="thead-dark">
            <tr>
                <th width='1%'>
                    <h5>ID</a></h4>
                </th>
                <th width='9%'>
                    <h5>Lietotājs</h4>
                </th>
                <th width='20%'>
                    <h5>Tēma</h4>
                </th>
                <th width='30%'>
                    <h5>Ziņojums</h4>
                </th>
                <th width='16%'>
                    <h5>Laiks</h4>
                </th>
                <th colspan="2" width='4%'>
                    <h5 style="text-align:center">Iespējas</h5>
                </th>
            </tr>
        </thead>

        <?php

        while ($user_data = mysqli_fetch_array($result)) {    //izvada datus no datubāzes uz tabulu
            echo "<td>" . wordwrap($user_data['contactid'], 12, "<br />\n", true) . "</td>";
            echo "<td>" . wordwrap($user_data['user'], 12, "<br />\n", true) . "</td>";
            echo "<td>" . wordwrap($user_data['subject'], 30, "<br />\n", true) . "</td>";
            echo "<td>" . wordwrap($user_data['content'], 46, "<br />\n", true) . "</td>";
            echo "<td>" . wordwrap($user_data['timestamp'], 25, "<br />\n", true) . "</td>"; ?>
            <td>
                <form method="post" action="../app/contact_admin.php">
                    <input hidden type="text" value="<?php echo $user_data['userid'] ?>" name="reply">
                    <input class="btn btn-sm btn-primary" value="Atbildēt" type="submit" name="submitreply">
                </form>
            </td>

            <td>
                <form method="post" action="../includes/delete_contact_admin.inc.php">
                    <input hidden type="text" value="<?php echo $user_data['contactid'] ?>" name="delete">
                    <input class="btn btn-sm btn-danger" value="Dzēst" type="submit" name="submitdelete">
                </form>
            </td>
            </tr>
        <?php
        }
        ?>


    </table>
</div>
<script>
    function myFunction() { //meklēšana
        var input = document.getElementById("myInput");
        var filter = input.value.toUpperCase();
        var table = document.getElementById("tabula");
        var trs = table.tBodies[0].getElementsByTagName("tr");
        for (var i = 0; i < trs.length; i++) {
            var tds = trs[i].getElementsByTagName("td");
            trs[i].style.display = "none";
            for (var i2 = 0; i2 < tds.length; i2++) {
                if (tds[i2].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    trs[i].style.display = "";
                    continue;
                }
            }
        }
    }
</script>