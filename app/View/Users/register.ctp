<!-- app/View/Users/register.ctp -->
<?php ?>
<!-- content-wrap -->
<div id="content-wrap">

    <!-- content -->
    <div id="content" class="clearfix">
          <!-- main -->
        <div id="main">
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Register User'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('role', array(
            'options' => array('member' => 'Member'),
            'type'=>'hidden'
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

   <!-- /main -->
        </div>
          
   <!-- content -->
	</div>

<!-- /content-out -->
</div>