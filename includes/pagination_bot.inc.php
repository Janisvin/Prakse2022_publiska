<div class="row">
    <ul class="pagination m-1 justify-content-center">
        <!-- Pēdējā lapa -->
        <li><a class="page-link" href="?pageno=1">&laquo&laquo</a></li>

        <!-- dod iespēju iet lapu atpakaļ -->
        <li class="<?php if ($pageno <= 1) {
                        echo 'disabled';
                    } ?>">
            <a class="page-link" href="<?php if ($pageno <= 1) {
                                            echo '#';
                                        } else {
                                            echo "?pageno=" . ($pageno - 1);
                                        } ?>">&laquo</a>
        </li>

        <!-- rāda pašreizējo lapu -->
        <li>
            <a class="page-link" href="#"> <?php echo $pageno ?></a>
        </li>


        <!-- dod iespēju iet lapu uz priekšu -->
        <li class="<?php if ($pageno >= $total_pages) {
                        echo 'disabled';
                    } ?>">
            <a class="page-link" href="<?php if ($pageno >= $total_pages) {
                                            echo '#';
                                        } else {
                                            echo "?pageno=" . ($pageno + 1);
                                        } ?>">&raquo;</a>
        </li>

        <!-- Pēdējā lapa -->
        <li><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">&raquo;&raquo;</a></li>
    </ul>
</div>