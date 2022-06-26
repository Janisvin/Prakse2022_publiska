<?php if (isset($_SESSION["userid"])) { ?>
    <!--ja ir admin-->
    <?php
    if ($_SESSION['admin'] == "1") { ?>
        <div class="mt-5"></div>
        <div class="fixed-bottom sticky-bottom">
            <footer class="bg-dark text-center">

                <div class="text-center p-0 text-light">
                    Mājaslapa izveidota 2022g.
                    <a class="text-light" href="app/contact_admin.php">Kontaktēties</a>

                </div>

            </footer>
        </div>

        <!--ja nav admin-->
    <?php } else if ($_SESSION["admin"] == "0") { ?>
        <div class="mt-5"></div>
        <div class="fixed-bottom sticky-bottom ">

            <footer class="bg-dark text-center">

                <div class="text-center p-0 text-light">
                    Mājaslapa izveidota 2022g.
                    <a class="text-light" href="app/contact.php">Kontaktēties</a>
                </div>

            </footer>
        </div>
    <?php }
} else { ?>
    <!--ja nav ielogojies-->

    <div class="mt-5"></div>
    <div class="fixed-bottom sticky-bottom">

        <footer class="bg-dark text-center">

            <div class="text-center p-0 text-light">
                Mājaslapa izveidota 2022g.
                <a href="#" class="text-light" data-bs-toggle="modal" data-bs-target="#contact">Kontaktēties</a>
            </div>
    </div>
    <!-- The Modal -->
    <div class="modal fade" id="contact">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Nav pieeja</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="col">
                        <p>Lai kontaktētos, jābūt reģistrētam!</p>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <a class="btn btn-success" href="app/login.php" role="button">Autorizēties</a>
                    <a class="btn btn-primary" href="app/signup.php" role="button">Reģistrēties</a>
                </div>
                </footer>
            <?php } ?>