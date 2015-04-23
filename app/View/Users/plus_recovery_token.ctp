<div class="row">
    <div class="col-md-12">
        <legend>Reset Your Password</legend>
        <?php
        echo $this->Form->create('User', array('url' =>
            array('controller' => 'users', 'action' => 'recovery_token',$setKey)));
        ?>
        <div class="form-group">
            <?php echo $this->Form->input('password', array(
                'class' => 'form-control', 
                'label' => false, 
                'div' => false, 
                'placeholder' => 'Password', 
                'required' => 'required')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('confirm_password', array(
                'class' => 'form-control', 
                'label' => false, 
                'div' => false, 
                'type'=>'password',
                'placeholder' => ' Confirm Password', 
                'required' => 'required')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->submit('Send', array('class' => 'btn btn-primary', 'div' => false,)); ?>
        </div>
        <?php
        echo $this->Form->end();
        ?>
    </div>
</div>