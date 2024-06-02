<?php
ob_start();
?>
    <div class="alert alert-danger" role="alert">
        <?= $error ?>
    </div>


<?php
$title="Erreur";
$content=ob_get_clean();
include 'template.php';
