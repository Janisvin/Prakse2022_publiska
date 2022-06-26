<?php
if (isset($_SESSION["useruid"])) {
?>
    <?php
    if ($_SESSION['admin'] == "1") { ?>
        <!--ja ir admin-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">

                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <li>
                    <a class="navbar-brand" href="">Jāņa lapa</a>
                </li>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 90px;">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Mājaslapa</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../app/view.php">Ziņojumi</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../app/contact_admin_table.php">Kontakti</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../app/users_admin.php">Lietotāji</a>
                        </li>
                    </ul>
                </div>

                <div class="d-flex justify-content-end">
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">


                        <form class="nav-item">
                            <input type="search" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Meklēt sarakstā">
                        </form>


                        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                            <ul class="navbar-nav mx-2">

                                <li class="nav-item">
                                    <a href="../app/edit_user.php"><img src="<?php echo '../img/' . $_SESSION['image'] ?>" alt="" width="40" height="40" class="rounded-circle"></a>
                                </li>

                                <li class="nav-item dropdown ">
                                    <?php include "../includes/modal_log_edit.inc.php" ?>
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION["useruid"]; ?>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                        <li><a class="dropdown-item" href="../app/edit_login_user.php">Autorizācijas dati</a></li>
                                        <li><a class="dropdown-item" href="../app/edit_user.php">Atjaunot profilu</a></li>
                                        <li><a class="dropdown-item" href="../app/login_confirm_delete.php">Dzēst profilu</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="../includes/logout.inc.php">Izrakstīties</a></li>
                                    </ul>

                                </li>

                            </ul>
                        </div>

                    </div>
                </div>
        </nav>
    <?php
    } else if ($_SESSION["admin"] == "0") {
    ?>
        <!--ja nav admin-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">

                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <li>
                    <a class="navbar-brand" href="">Jāņa lapa</a>
                </li>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 90px;">
                        <li class=" nav-item">
                            <a class="nav-link" href="../index.php">Mājaslapa</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../app/view.php">Ziņojumi</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../app/users.php">Lietotāji</a>
                        </li>


                    </ul>
                </div>

                <div class="d-flex justify-content-end">
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <form class="nav-item">
                            <input type="search" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Meklēt sarakstā">
                        </form>

                        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                            <ul class="navbar-nav mx-2">

                                <li class="nav-item">
                                    <a href="../app/edit_user.php"><img src="<?php echo '../img/' . $_SESSION['image'] ?>" alt="" width="40" height="40" class="rounded-circle"></a>
                                </li>

                                <li class="nav-item dropdown ">
                                    <?php include "../includes/modal_log_edit.inc.php" ?>
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION["useruid"]; ?>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                        <li><a class="dropdown-item" href="../app/edit_login_user.php">Autorizācijas dati</a></li>
                                        <li><a class="dropdown-item" href="../app/edit_user.php">Atjaunot profilu</a></li>
                                        <li><a class="dropdown-item" href="../app/login_confirm_delete.php">Dzēst profilu</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="../includes/logout.inc.php">Izrakstīties</a></li>
                                    </ul>

                                </li>

                            </ul>
                        </div>
                    </div>

                </div>


            </div>

        </nav>
    <?php
        //
        //<a class="nav-link" data-bs-toggle="modal" data-bs-target="#nolog" href="#">Datubāze</a>
        //<?php include "includes/modal_nolog.inc.php"
    }
} else {
    ?>
    <!--ja nav ielogojies-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <li>
                <a class="navbar-brand" href="">Jāņa lapa</a>
            </li>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 90px;">
                    <li class=" nav-item">
                        <a class="nav-link" href="../index.php">Mājaslapa</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../app/view.php">Ziņojumi</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../app/users.php">Lietotāji</a>
                    </li>
                </ul>
            </div>

            <div class="d-flex justify-content-end">
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../app/login.php">Autorizēties</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../app/signup.php">Reģistrēties</a>
                        </li>


                    </ul>
                </div>
            </div>

        </div>
    </nav> <?php
        }
            ?>