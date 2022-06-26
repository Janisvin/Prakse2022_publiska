<?php
include_once("../includes/connection.php");
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY timestamp DESC");
?>

<script src="../js/sort.js"></script>
<div class="table table-responsive">
    <table class="table table-bordered sortable table-hover" id="tabula">

        <thead class="thead-dark">
            <tr>
                <th width=''>
                    <h5>Lietotājs</h4>
                </th>
                <th width=''>
                    <h5>Kad reģistrējies</h4>
                </th>
                <th width='1%'>
                    <h5 style="text-align:center">Saziņa</h5>
                </th>
            </tr>
        </thead>
        <?php
        while ($user_data = mysqli_fetch_array($result)) {                            //izvada datus no datubāzes uz tabulu
            echo "<tr>";
            echo "<td hidden>" . wordwrap($user_data['id'], 15, "<br />\n", true) . "</td>";
            echo "<td>" . wordwrap($user_data['uid'], 20, "<br />\n", true) . "</td>";
            echo "<td>" . wordwrap($user_data['timestamp'], 20, "<br />\n", true) . "</td>";
        ?>
            <td>
                <a class="btn btn-sm btn-primary" href=" ../app/view_user_info.php?id=<?php echo $user_data['id'] ?>">Sazināties</a>
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