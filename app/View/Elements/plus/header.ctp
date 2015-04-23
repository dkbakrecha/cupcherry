<?php
$user = Configure::read('currentUserInfo.Plus');
//prd($user);
?>


<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container"> 
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar">

                </span>
                <a href="#"></a> 
                <span class="icon-bar">

                </span>
                <span class="icon-bar">

                </span>
            </a>
            <a class="brand" href="<?php echo $this->Html->url(array('plus' => true, 'controller' => 'users', 'action' => 'dashboard')); ?>">
                Cup Cherry 
            </a>  <p class="brand">- Welcome <?php echo $user['OrgProfile']['org_name'] . '/User ID-' .$user['id']?></p>
            <div class="nav-collapse">
                <ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="icon-cog"></i> Account <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->Html->url(array('plus' => true, 'controller' => 'users', 'action' => 'profile')); ?>">Profile</a></li>
                            <li><a href="<?php echo $this->Html->url(array('plus' => true, 'controller' => 'users', 'action' => 'changepassword')); ?>">Password</a></li>
                            <li><a href="<?php echo $this->Html->url(array('plus' => true, 'controller' => 'users', 'action' => 'settings')); ?>">Settings</a></li>
                            <li><a href="<?php echo $this->Html->url(array('plus' => true, 'controller' => 'pages', 'action' => 'help')); ?>">Help</a></li>
                            <li><a href="<?php
                                echo $this->Html->url(array('plus' => true,
                                    'controller' => 'users',
                                    'action' => 'logout'
                                ));
                                ?>">Logout</a></li>
                        </ul>
                    </li>

                </ul>
                <!--                <form class="navbar-search pull-right">
                                    <input type="text" class="search-query" placeholder="Search">
                                </form>-->
            </div>
            <!--/.nav-collapse --> 
        </div>
        <!-- /container --> 
    </div>
    <!-- /navbar-inner --> 
</div>

<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li class="active"><a href="<?php echo $this->Html->url(array('plus' => true, 'controller' => 'users', 'action' => 'dashboard')); ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                <li><a href="reports.html"><i class="icon-list-alt"></i><span>Reports</span> </a> </li>
                <li><a href="guidely.html"><i class="icon-facetime-video"></i><span>App Tour</span> </a></li>
                <li><a href="charts.html"><i class="icon-bar-chart"></i><span>Charts</span> </a> </li>
                <li><a href="shortcodes.html"><i class="icon-code"></i><span>Shortcodes</span> </a> </li>
                <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Drops</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php
                            echo $this->Html->url(array(
                                'plus' => true,
                                'controller' => 'pages',
                                'action' => 'types'
                            ));
                            ?>">Types</a></li>
                        <li><a href="<?php
                            echo $this->Html->url(array(
                                'plus' => true,
                                'controller' => 'pages',
                                'action' => 'categories'
                            ));
                            ?>">Categories</a></li>
                        <li><a href="icons.html">Icons</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="pricing.html">Pricing Plans</a></li>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="signup.html">Signup</a></li>
                        <li><a href="error.html">404</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /container --> 
    </div>
    <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->