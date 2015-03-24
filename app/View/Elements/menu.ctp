<div class="header-menu">
<div class="container">
    <div class="row">
        <nav class="navbar navbar-default myMenuClass">
            
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'about')); ?>">About Us</a></li>
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'howitworks')); ?>">How it Works</a></li>
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'faqs', 'action' => 'index')); ?>">FAQ's</a></li>
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'contact_us')); ?>">Contact Us</a></li>
                    </ul>
                    
                    <?php
                    if (isset($currentUserInfo) && !empty($currentUserInfo)) {
                        ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $currentUserInfo['fname'] . " " .$currentUserInfo['lname']; ?>  <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit_profile')); ?>">
                                            <i class="fa fa-user"></i><span>Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'changepassword')); ?>">
                                            <i class="fa fa-key"></i><span>Change Password</span>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')); ?>">
                                            <i class="fa fa-sign-out"></i><span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <?php
                    }else{
                    ?>
                    
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login')); ?>">Login</a></li>
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'registration')); ?>">Register</a></li>
                        </ul>
                    
                    <?php
                    }
                    ?>

                </div><!-- /.navbar-collapse -->
            
        </nav>

    </div>
</div>
</div>
<hr class="hr-noMargin">