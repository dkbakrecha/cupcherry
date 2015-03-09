<?php
$flashErr = $this->Session->flash();
if (isset($flashErr) && !empty($flashErr)) {
    ?>
    <div class="alert alert-danger" role="alert"><?php echo $flashErr; ?></div>
    <?php
}
?>