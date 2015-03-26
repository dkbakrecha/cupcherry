<?php
$fdata = $this->Session->read('Message');
if(isset($fdata['flash']) && !empty($fdata['flash'])) {
    
$mc = 'alert-success';
if ($this->Session->read('Message.flash.params.id') == 'success') {
    $mc = 'alert-success';
} elseif ($this->Session->read('Message.flash.params.id') == 'danger') {
    $mc = 'alert-danger';
} elseif ($this->Session->read('Message.flash.params.id') == 'info') {
    $mc = 'alert-info';
} elseif ($this->Session->read('Message.flash.params.id') == 'warning') {
    $mc = 'alert-warning';
}
?>

<section>
    <div class="container">
        <div class="alert <?php echo $mc; ?> alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->Session->flash(); ?>
        </div>
    </div>
</section>

<script>
    $(document).ready( function() {
        $('.alert').delay(3000).fadeOut('slow');
      });
</script>

<?php } ?>