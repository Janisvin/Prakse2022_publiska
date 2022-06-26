<?php
include_once("../includes/connection.php");
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY timestamp DESC");
?>

<script src="../js/sort.js"></script>
<div class="table table-responsive">
    <table class="table table-bordered sortable table-hover" id="tabula">

        <thead class="thead-dark">
            <tr>
                <th width='4%'>
                    <h5>ID</a></h4>
                </th>
                <th width='20%'>
                    <h5>Lietotājs</h4>
                </th>
                <th width='14'>
                    <h5>Epasts</h4>
                </th>
                <th width='4%'>
                    <h5>Admin</h4>
                </th>
                <th width='20%'>
                    <h5>Laiks</h4>
                </th>
                <th colspan="3" width='10%'>
                    <h5 style="text-align:center">Iespējas</h5>
                </th>
            </tr>
        </thead>
        <?php
        while ($user_data = mysqli_fetch_array($result)) {                            //izvada datus no datubāzes uz tabulu
            echo "<tr>";
            echo "<td>" . wordwrap($user_data['id'], 15, "<br />\n", true) . "</td>";
            echo "<td>" . wordwrap($user_data['uid'], 20, "<br />\n", true) . "</td>";
            echo "<td>" . wordwrap($user_data['email'], 26, "<br />\n", true) . "</td>";
            echo "<td>" . wordwrap($user_data['admin'], 40, "<br />\n", true) . "</td>";
            echo "<td>" . wordwrap($user_data['timestamp'], 20, "<br />\n", true) . "</td>";
        ?>
            <td>
                <form method="post" action="../app/contact_admin.php">
                    <input hidden type="text" value="<?php echo $user_data['id'] ?>" name="reply">
                    <input class="btn btn-sm btn-primary" value="Sazināties" type="submit" name="submitreply">
                </form>
            </td>
            <td>
                <form method="post" action="../app/edit_user_admin.php">
                    <input hidden type="text" value="<?php echo $user_data['id'] ?>" name="edit">
                    <input class="btn btn-sm btn-success" value="Mainīt" type="submit" name="submitedit">
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