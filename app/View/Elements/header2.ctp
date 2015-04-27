<?php
$user = Configure::read('currentUserInfo.User');
//prd($user);
?>
<!-- Start Site Header -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="logo">
                    <a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'index')); ?>">
                        <?php echo $this->Html->image('logo.png', array('alt' => 'CupCherry')); ?>
                    </a> 
                </div>
            </div>
            <div class="col-md-8 col-sm-6 col-xs-12">

                <?php
                if (!isset($user) && empty($user)) {
                    ?>
                    <div class="top-links">
                        <ul>
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login')); ?>">Login</a></li>
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'registration')); ?>">Register</a></li>
                        </ul>
                    </div>
                    <?php
                } 
            ?>
            </div>
        </div>
</header>
<!-- End Site Header --> 
