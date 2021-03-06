<?php
//prd($currentUserInfo);
?>
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


                    <?php
                    if (isset($currentUserInfo) && !empty($currentUserInfo['User'])) {
                        ?>
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'dashboard')); ?>"><i class="fa fa-bank"></i> &nbsp; Dashboard</a></li>
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'key_notes', 'action' => 'index')); ?>"><i class="fa fa-newspaper-o"></i> &nbsp; KeyNotes</a></li>
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'events', 'action' => 'index')); ?>"><i class="fa fa-calendar-o"></i> &nbsp; Calendar</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown loginrighttopmenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <div class="loginpic">
                                        <?php echo $this->Html->image('../files/profile_image/' . $currentUserInfo['User']['UserProfile']['image_name'], array('alt' => 'CC')); ?>
                                    </div>
                                    <?php echo $currentUserInfo['User']['UserProfile']['fname'] . " " . $currentUserInfo['User']['UserProfile']['lname']; ?>  
                                    <span class="caret"></span>
                                </a>
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
                    } else {
                        ?>
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'about')); ?>">About Us</a></li>
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'howitworks')); ?>">How it Works</a></li>
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'faqs', 'action' => 'index')); ?>">FAQ's</a></li>
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'contact')); ?>">Contact Us</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login')); ?>">Login</a></li>
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'registration')); ?>">Signup</a></li>
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