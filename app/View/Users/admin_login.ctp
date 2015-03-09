<div class="login">

    <div class="login-screen">

        <?php
        $flashErr = $this->Session->flash();
        if (isset($flashErr) && !empty($flashErr)) {
            ?>
            <div class="alert alert-danger" role="alert"><?php echo $flashErr; ?></div>
            <?php
        }
        ?>
        <div class="app-title">
            <h2>Admin Login</h2>
        </div>
        <hr>

        <div class="login-form">
            <?php echo $this->Form->create('User'); ?>
            <div class="control-group">
                <?php
                echo $this->Form->input('email', array(
                    'label' => false,
                    'class' => 'login-field',
                    'placeholder' => 'Email Id',
                    'div' => false,
                    'id' => 'login-name'));
                ?>
<!--                <input type="text" class="login-field" value="" placeholder="username" id="login-name">-->
                <label class="login-field-icon fui-user" for="login-name"></label>
            </div>

            <div class="control-group">
<?php
echo $this->Form->input('password', array(
    'label' => false,
    'class' => 'login-field',
    'placeholder' => 'password',
    'div' => false,
    'id' => 'login-pass'));
?>
<!--                <input type = "password" class = "login-field" value = "" placeholder = "password" id = "login-pass">-->
                <label class = "login-field-icon fui-lock" for = "login-pass"></label>
            </div>

<?php echo $this->Form->submit("Login", array('class' => 'btn btn-success btn-large ')); ?>
<?php //echo $this->Form->end();   ?>
            <!--            <a class = "btn btn-primary btn-large btn-block" href = "#">login</a>-->
            <a class = "login-link" href = "#">Lost your password?</a>
        </div>
    </div>
</div>