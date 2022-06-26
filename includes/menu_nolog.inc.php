<div class="col-sm-4 mt-4 " style="width: 23rem;">
    <div class="card border-3">
        <div class="card-body">
            <h5 class="card-title">Apskatīt datubāzi</h5>
            <p class="card-text text-break">Šeit var apskatīt datubāzi, kur lietotājs nespēj neko mainīt, bet administrators spēj.</p>
            <?php include "includes/modal_nolog.inc.php" ?>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#nolog">
                Doties
            </button>
        </div>
    </div>
</div>

<div class="col-sm-4 mt-4 " style="width: 23rem;">
    <div class="card border-3">
        <div class="card-body">
            <h5 class="card-title">Reģistrēties</h5>
            <p class="card-text">Šeit var piereģistrēt lietotāju.</p></br></br>
            <a href="app/signup.php" class="btn btn-primary">Doties</a>
        </div>
    </div>
</div>
<div class="col-sm-4 mt-4 mb-5" style="width: 23rem;">
    <div class="card border-3">
        <div class="card-body">
            <h5 class="card-title">Autorizēties</h5>
            <p class="card-text">Šeit var autorizēties ar reģistrētu lietotāju.</p></br></br>
            <a href="app/login.php" class="btn btn-primary">Doties</a>
        </div>
    </div>
</div>