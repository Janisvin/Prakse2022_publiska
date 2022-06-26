<!-- The Modal -->
<?php if (isset($_SESSION["useruid"])) {
?>
    <!--ja ir admin-->
    <?php
    if ($_SESSION['admin'] == "1") { ?>
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Iestatījumi</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="col">
                            <p>Šeit var mainīt savus datus</p>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <a class="btn btn-primary" href="app/edit_login_admin.php" role="button">Mainīt pierakstīšanās datus</a>
                        <a class="btn btn-success" href="app/edit_user.php" role="button">Atjaunot profilu</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else if ($_SESSION["admin"] == "0") {
    ?>
        <!--ja nav admin-->

        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Iestatījumi</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="col">
                            <p>Šeit var mainīt savus datus</p>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <a class="btn btn-primary" href="app/edit_login_user.php" role="button">Mainīt pierakstīšanās datus</a>
                        <a class="btn btn-success" href="app/edit_user.php" role="button">Atjaunot profilu</a>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}
?>