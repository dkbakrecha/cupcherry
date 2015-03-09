<div class="main">
    <!-- START : PAGE CONTENT -->
    <div class="section ">
        <div class="row">
            <div class="column small-12">
                <h1 class="amber">My Account</h1>	
                <div class="col-lg-8 col-lg-offset-2">
                    <?php echo $this->Form->create('User'); ?>
                    <fieldset>
                        <legend><?php echo __('Create New account'); ?></legend>
                        <div class="col-lg-6">
                            <?php echo $this->Form->input('fname', array('label' => false, 'placeholder' => 'Firstname')); ?>
                        </div>
                        <div class="col-lg-6">
                            <?php echo $this->Form->input('lname', array('label' => false, 'placeholder' => 'Surname')); ?>
                        </div>
                        <div class="col-lg-12">
                            <?php echo $this->Form->input('email', array('label' => false, 'placeholder' => 'Email address')); ?>
                        </div>    
                        <div class="col-lg-12">
                            <?php echo $this->Form->input('password', array('label' => false, 'placeholder' => 'Password')); ?>
                        </div>        
                        <div class="col-lg-12">
                            <?php echo $this->Form->input('cpassword', array('label' => false, 'placeholder' => 'Re-password', 'type' => 'password')); ?>
                        </div>
                        <div class="col-lg-12">
                            <?php echo $this->Form->submit('Create Account', array('class' => 'btn btn-default red_btn')); ?>
                        </div>
                        <div class="col-lg-12"><p>By clicking "Create Account", you agree to our <a href="">Terms of Use</a></p></div>
                    </fieldset>
                    <?php
                    echo $this->Form->end();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>