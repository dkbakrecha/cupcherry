<?php ?>
<div class="mainbar">

    <div class="container">

        <button type="button" class="btn mainbar-toggle" data-toggle="collapse" data-target=".mainbar-collapse">
            <i class="fa fa-bars"></i>
        </button>

        <div class="mainbar-collapse collapse">

            <ul class="nav navbar-nav mainbar-nav">

                <li class="active">
                    <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'admin_index', 'admin' => true)) ?>">
                        <i class="fa fa-dashboard"></i>
                        Dashboard
                    </a>
                </li>

                <li class="dropdown">
                    <a href="#about" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                        <i class="fa fa-bars"></i>
                        Meta Content
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">   
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'types', 'action' => 'admin_index', 'admin' => true)) ?>"><i class="fa fa-bars nav-icon"></i> Types (Standard)</a></li>
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'categories', 'action' => 'admin_index', 'admin' => true)) ?>"><i class="fa fa-bars nav-icon"></i> Categories</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#about" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                        <i class="fa fa-desktop"></i>
                        CupCherry Services
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">   
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'keynotes', 'action' => 'admin_index', 'admin' => true)) ?>"><i class="fa fa-user nav-icon"></i> KeyNotes</a></li>
                        <li><a href=""><i class="fa fa-bars nav-icon"></i> Resources</a></li>
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'events', 'action' => 'admin_index', 'admin' => true)) ?>"><i class="fa fa-asterisk nav-icon"></i> Events Calendar</a></li>
                        <li><a href=""><i class="fa fa-tasks nav-icon"></i> Groups</a></li>
                        <li><a href=""><i class="fa fa-font nav-icon"></i> Private Courses</a></li>
                        <li><a href=""><i class="fa fa-list-alt nav-icon"></i> Advertisment</a></li>

                        <!--                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">
                                <i class="fa fa-asterisk nav-icon"></i> 
                                &nbsp;&nbsp;Charts &amp; Graphs
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="http://preview.jumpstartthemes.com/target-admin/ui-chart-flot.html">
                                        <i class="fa fa-bar-chart-o"></i> 
                                        &nbsp;&nbsp;jQuery Flot
                                    </a>
                                </li>

                                <li>
                                    <a href="http://preview.jumpstartthemes.com/target-admin/ui-chart-morris.html">
                                        <i class="fa fa-bar-chart-o"></i> 
                                        &nbsp;&nbsp;Morris.js
                                    </a>
                                </li> 
                            </ul>
                        </li>-->

                    </ul>
                </li>



                <!--                
                <li class="dropdown ">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                        <i class="fa fa-align-left"></i> 
                        Data Elements
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Form Elements</li>

                        <li>
                            <a href="http://preview.jumpstartthemes.com/target-admin/ui-form-regular.html">
                                <i class="fa fa-location-arrow nav-icon"></i> 
                                Regular Elements
                            </a>
                        </li>

                        <li>
                            <a href="http://preview.jumpstartthemes.com/target-admin/ui-form-extended.html">
                                <i class="fa fa-bolt nav-icon"></i> 
                                Extended Plugins
                            </a>
                        </li>

                        <li>
                            <a href="http://preview.jumpstartthemes.com/target-admin/ui-form-validation.html">
                                <i class="fa fa-check nav-icon"></i> 
                                Form Validation
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li class="dropdown-header">Data Tables</li>

                        <li>
                            <a href="http://preview.jumpstartthemes.com/target-admin/ui-table-basic.html">
                                <i class="fa fa-table"></i> 
                                &nbsp;&nbsp;Basic Tables
                            </a>
                        </li>

                        <li>
                            <a href="http://preview.jumpstartthemes.com/target-admin/ui-table-advanced.html">
                                <i class="fa fa-table"></i> 
                                &nbsp;&nbsp;Advanced Tables
                            </a>
                        </li>

                        <li>
                            <a href="http://preview.jumpstartthemes.com/target-admin/ui-table-responsive.html">
                                <i class="fa fa-table"></i> 
                                &nbsp;&nbsp;Responsive Tables
                            </a>
                        </li>
                    </ul>
                </li>-->

                <li class="dropdown ">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                        <i class="fa fa-files-o"></i>
                        Site Content
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <!--<li class="dropdown-header">Site Content</li>-->
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'cms_pages', 'action' => 'admin_index', 'admin' => true)) ?>"><i class="fa fa-files-o nav-icon"></i> CMS Pages</a></li>
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'email_contents', 'action' => 'admin_index', 'admin' => true)) ?>"><i class="fa fa-file-text nav-icon"></i> Email Content</a></li>
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'faqs', 'action' => 'admin_list', 'admin' => true)) ?>"><i class="fa fa-file-powerpoint-o nav-icon"></i> FAQ'S Section</a></li>
                        <!--                        <li class="divider"></li>
                        <li class="dropdown-header">Client Content</li>
                        <li><a href=""><i class="fa fa-money nav-icon"></i> Invoice</a></li>
                        <li><a href=""><i class="fa fa-dollar nav-icon"></i> Pricing Plans</a></li>
                        <li><a href=""><i class="fa fa-question nav-icon"></i> Support Page</a></li>
                        <li><a href=""><i class="fa fa-picture-o nav-icon"></i> Gallery</a></li>
                        <li><a href=""><i class="fa fa-cogs nav-icon"></i> Settings</a></li>-->

                    </ul>
                </li>  

                <li class="dropdown">
                    <a href="#about" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                        <i class="fa fa-users"></i>
                        User Management
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">   
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'list')); ?>"><i class="fa fa-user nav-icon"></i>Users</a></li>
                        <li><a href="#"><i class="fa fa-bars nav-icon"></i>  CMS Pages</a></li>
                        <!--<li><a href="<?php // echo $this->Html->url(array('controller' => 'faqs', 'action' => 'admin_index'))       ?>"><i class="fa fa-asterisk nav-icon"></i> FAQ Options</a></li>-->
                        <li>
                            <a href="#"><i class="fa fa-tasks nav-icon">

                                </i>  </a>

                        </li>
                        <li><a href="#"><i class="fa fa-font nav-icon"></i> - </a></li>
                        <li><a href="#"><i class="fa fa-list-alt nav-icon"></i> - </a></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="<?php echo $this->Html->url(array('controller' => 'faqs', 'action' => 'admin_index')) ?>">
                                <i class="fa fa-asterisk nav-icon"></i> 
                                Resources
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'resources', 'action' => 'admin_add')) ?>">
                                        <i class="fa fa-bar-chart-o"></i> 
                                        Add Resources
                                    </a>
                                </li> 
                                <li>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'resources', 'action' => 'admin_view')) ?>">
                                        <i class="fa fa-bar-chart-o"></i> 
                                        View  Resources
                                    </a>
                                </li>

                                <!--                                <li>
                                                                    <a href="http://preview.jumpstartthemes.com/target-admin/ui-chart-morris.html">
                                                                        <i class="fa fa-bar-chart-o"></i> 
                                                                        &nbsp;&nbsp;Morris.js
                                                                    </a>
                                                                </li> -->
                            </ul>
                        </li>

                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="<?php echo $this->Html->url(array('controller' => 'faqs', 'action' => 'admin_index')) ?>">
                                <i class="fa fa-asterisk nav-icon"></i> 
                                List of Groups
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'groups', 'action' => 'admin_add')) ?>">
                                        <i class="fa fa-bar-chart-o"></i> 
                                        Add Group
                                    </a>
                                </li> 
                                <li>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'groups', 'action' => 'admin_view')) ?>">
                                        <i class="fa fa-bar-chart-o"></i> 
                                        View  Group
                                    </a>
                                </li>

                                <!--                                <li>
                                                                    <a href="http://preview.jumpstartthemes.com/target-admin/ui-chart-morris.html">
                                                                        <i class="fa fa-bar-chart-o"></i> 
                                                                        &nbsp;&nbsp;Morris.js
                                                                    </a>
                                                                </li> -->
                            </ul>
                        </li>

                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="<?php echo $this->Html->url(array('controller' => 'faqs', 'action' => 'admin_index')) ?>">
                                <i class="fa fa-asterisk nav-icon"></i> 
                                FAQ
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'faqs', 'action' => 'admin_index')) ?>">
                                        <i class="fa fa-bar-chart-o"></i> 
                                        Add Faq
                                    </a>
                                </li> 
                                <li>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'faqs', 'action' => 'admin_list')) ?>">
                                        <i class="fa fa-bar-chart-o"></i> 
                                        View  Faq
                                    </a>
                                </li>

                                <!--                                <li>
                                                                    <a href="http://preview.jumpstartthemes.com/target-admin/ui-chart-morris.html">
                                                                        <i class="fa fa-bar-chart-o"></i> 
                                                                        &nbsp;&nbsp;Morris.js
                                                                    </a>
                                                                </li> -->
                            </ul>
                        </li>

                    </ul>
                </li>

                <!--
                <li class="dropdown ">
                    <a href="#contact" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                        <i class="fa fa-external-link"></i>
                        Extra Pages
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="http://preview.jumpstartthemes.com/target-admin/page-notifications.html">
                                <i class="fa fa-bell"></i> 
                                &nbsp;&nbsp;Notifications
                            </a>
                        </li>     

                        <li>
                            <a href="http://preview.jumpstartthemes.com/target-admin/ui-icons.html">
                                <i class="fa fa-smile-o"></i> 
                                &nbsp;&nbsp;Font Icons
                            </a>
                        </li> 

                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">
                                <i class="fa fa-ban"></i> 
                                &nbsp;&nbsp;Error Pages
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="http://preview.jumpstartthemes.com/target-admin/page-404.html">
                                        <i class="fa fa-ban"></i> 
                                        &nbsp;&nbsp;404 Error
                                    </a>
                                </li>

                                <li>
                                    <a href="http://preview.jumpstartthemes.com/target-admin/page-500.html">
                                        <i class="fa fa-ban"></i> 
                                        &nbsp;&nbsp;500 Error
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown-submenu">

                            <a tabindex="-1" href="#">
                                <i class="fa fa-lock"></i> 
                                &nbsp;&nbsp;Login Pages
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="http://preview.jumpstartthemes.com/target-admin/account-login.html">
                                        <i class="fa fa-unlock"></i> 
                                        &nbsp;&nbsp;Login
                                    </a>
                                </li>

                                <li>
                                    <a href="http://preview.jumpstartthemes.com/target-admin/account-login-social.html">
                                        <i class="fa fa-unlock"></i> 
                                        &nbsp;&nbsp;Login Social
                                    </a>
                                </li>

                                <li>
                                    <a href="http://preview.jumpstartthemes.com/target-admin/account-signup.html">
                                        <i class="fa fa-star"></i> 
                                        &nbsp;&nbsp;Signup
                                    </a>
                                </li>

                                <li>
                                    <a href="http://preview.jumpstartthemes.com/target-admin/account-forgot.html">
                                        <i class="fa fa-envelope"></i> 
                                        &nbsp;&nbsp;Forgot Password
                                    </a>
                                </li>
                            </ul>
                        </li> 

                        <li class="divider"></li>

                        <li>
                            <a href="http://preview.jumpstartthemes.com/target-admin/page-blank.html">
                                <i class="fa fa-square-o"></i> 
                                &nbsp;&nbsp;Blank Page
                            </a>
                        </li> 

                    </ul>
                </li>-->

            </ul>

        </div> <!-- /.navbar-collapse -->   

    </div> <!-- /.container --> 

</div> <!-- /.mainbar -->

