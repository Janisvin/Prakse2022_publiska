<!-- The Modal -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Dzēst profilu</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="col">
                    <p>Dzēst lietotāju ar id <?php echo $user_data['id']; ?>?</p>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <form method="post" action="../includes/delete_user_admin.inc.php">
                    <a class="btn btn-danger" href="../includes/delete_user_admin.inc.php" type="submit" name="submitdelete">Dzēst</a>
                </form>

            </div>
        </div>
    </div>
</div>