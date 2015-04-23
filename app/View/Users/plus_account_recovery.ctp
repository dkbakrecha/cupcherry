<div class="row">
    <div class="col-md-12">
        <legend>Enter your email address</legend>
        <?php
        echo $this->Form->create('User', array('url' =>
            array('controller' => 'users', 'action' => 'account_recovery')));
        ?>
        <div class="form-group">
            <?php echo $this->Form->input('email', array('class' => 'form-control', 'label' => false, 'div' => false, 'placeholder' => 'Email address', 'required' => 'required')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->submit('Send', array('class' => 'btn btn-primary', 'div' => false,)); ?>
        </div>
        <?php
        echo $this->Form->end();
        ?>
    </div>
</div>