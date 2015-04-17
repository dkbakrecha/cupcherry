<?php ?>


<div class="account-container register">

    <div class="content clearfix">



        <h3>Signup For Free Account</h3>			
        <hr>
        <div class="login-fields">

            <?php
            echo $this->Form->create('User');
            ?>
            <div class="field">
                <?php
                echo $this->Form->input('org_name', array(
                    'class' => 'login',
                    'placeholder' => 'Organization Name',
                    'required' => 'required'));
                ?>
            </div>
            <div class="field">
                <?php
                echo $this->Form->input('fname', array(
                    'class' => 'login',
                    'placeholder' => 'First Name',
                    'required' => 'required'));
                ?>
            </div>
            <div class="field">
                <?php
                echo $this->Form->input('lname', array(
                    'class' => 'login',
                    'placeholder' => 'Last Name',
                    'required' => 'required'));
                ?>
            </div>
            <div class="field">
                <?php
                echo $this->Form->input('email', array(
                    'class' => 'login',
                    'placeholder' => 'Email',
                    'required' => 'required'));
                ?>
            </div>
            <div class="field">

                <?php
                echo $this->Form->input('contact', array(
                    'class' => 'login',
                    'placeholder' => 'Contact Number',
                    'required' => 'required'));
                ?>
            </div>








        </div> <!-- /login-fields -->

        <div class="login-actions">
            <span class="login-checkbox">
<!--                <label class="choice"> We Will contact you soon.</label>-->
            </span>

<!--                <span class="login-checkbox">
                    <input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
                    <label class="choice" for="Field">Agree with the Terms & Conditions.</label>
                </span>-->

            <?php
            echo $this->Form->submit('Register', array(
                'class' => 'button btn btn-primary btn-large'
            ));
            ?>   

        </div> <!-- .actions -->

        <?php
        echo $this->Form->end();
        ?>

    </div> <!-- /content -->

</div> <!-- /account-container -->