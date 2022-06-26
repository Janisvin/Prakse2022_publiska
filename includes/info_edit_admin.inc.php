<div class="card my-3 border-3 mx-2 border-primary" style="max-width: 25rem;">

    <div class="card-title">

        <h3 class="text-center mt-3 mx-3 mb-0">Mainīt <?php echo $user_data['uid']; ?></h3>
    </div>

    <div class="card-body">
        <img src=" <?php echo '../img/' . $user_data['image'] ?>" class="rounded" style="margin-left: auto; margin-right: auto; margin-bottom: 10px; display: block; width: 160px; height: 160px;" alt="Nav profila bilde">

        <h5>Epasts:</h5>
        <p><?php echo $user_data["email"]; ?></p>

        <h5>Bio:</h5>
        <p class="text-break"><?php echo wordwrap($user_data["bio"], 45, "<br />\n", true); ?></p>

        <h5>Admin:</h5>
        <p class="text-break"><?php echo wordwrap($user_data["admin"], 45, "<br />\n", true); ?></p>
    </div>

</div>

<?php
