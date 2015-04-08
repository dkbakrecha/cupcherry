<?php

//prd($this->request);

?>


<div class="account-container">

    <div class="content clearfix">



        <h2>Cup Cherry Plus Login</h2>		

        <div class="login-fields">

            <hr>
            <?php
            echo $this->Form->create('User');
            ?>

            <div class="field">
                <?php
                echo $this->Form->input('email', array(
                    'class' => 'login username-field',
                    'placeholder' => 'Username'
                ));
                ?>

            </div> 

            <div class="field">
                <?php
                echo $this->Form->input('password', array(
                    'class' => 'login password-field',
                    'placeholder' => 'Password',
                    'type' => 'password'
                ));
                ?>

            </div>




        </div> <!-- /login-fields -->

        <div class="login-actions">
            <span class="login-checkbox">
                <label class="choice ">
                    <a href="<?php echo $this->Html->url(array(
                        'controller'=>'users',
                        'action'=>'account_recovery'
                    ));?>">Forgot Password</a>
                </label>
            </span>
<!--            <span class="login-checkbox">
                <input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
                <label class="choice" for="Field">Keep me signed in</label>
            </span>-->
            <?php echo $this->Form->submit('Sign In',array('class'=>'button btn btn-primary btn-large'));?>
            

        </div> <!-- .actions -->

        <?php
        echo $this->Form->end();
        ?>


    </div> <!-- /content -->

</div> <!-- /account-container -->


<!--
<div class="login-extra">
    <a href="#">Reset Password</a>
</div>  /login-extra -->



