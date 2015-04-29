

<!--<div class="profile_pic_panel">
    <div class="thumbnail" id="image-thumb">
<?php // echo $this->Html->image('no_image.jpg'); ?>
        <div class="change_image">
            <a  href="<?php // echo $this->Html->url(array('controller' => 'users', 'action' => 'upload_image'));  ?>">
                <div class="change_pic" id="show_pic_change">
                    Change    
                </div>

            </a>
        </div>
    </div>
</div>-->

<div class="panel  cus-panel panel-primary panel-custome ">
    <a class="dash_panel_heading" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'dashboard')); ?>">
        <div class="cus-panel-heading panel-heading">
            <i class="fa fa-dashboard" ></i>Dashboard
        </div>
    </a>

    <ul class="list-group">
        <a href="<?php echo $this->Html->url(array('controller' => 'groups', 'action' => 'index')); ?>">
            <li class="list-group-item"><i class="fa fa-envelope" ></i><span>Messages</span>
                <div class="dashboard-plusIcon pull-right">

                </div>
            </li>
        </a>

        <a href="<?php echo $this->Html->url(array('controller' => 'groups', 'action' => 'index')); ?>">
            <li class="list-group-item"><i class="fa fa-group" ></i><span>Groups</span>
                <div class="dashboard-plusIcon pull-right">

                </div>
            </li>
        </a>
        <a href="<?php echo $this->Html->url(array('controller' => 'events', 'action' => 'index')); ?>">
            <li class="list-group-item"><i class="fa fa-calendar" ></i><span>Calender</span>
                <div class="dashboard-plusIcon pull-right">

                </div>
            </li>
        </a>

        <ul id="grp-drop-list" class="list-group">
            <li id="manageGrp" class=" list-padding list-group-item">
                <span>
                    <a>
                        Managed by you
                    </a>
                    <i class="fa fa-plus pull-right"></i>
                </span>
                <ul id="manageGrpList" class="list-group">
                    <?php
                    foreach ($groupList as $grps) {
                        ?>
                        <li class="list-padding list-group-item">
                            <span>
                                <?php
                                echo $this->Html->link($grps['Group']['title'], array(
                                    'controller' => 'groups',
                                    'action' => 'view', $grps['Group']['id']
                                ));
                                ?>

                            </span>
                        </li>
                        <?php
                    }
                    ?>


                </ul>

            </li>
            <li id="joinedGrp" class="list-padding list-group-item">
                <span>
                    <a>
                        Joined Groups
                    </a>
                    <i class="fa fa-plus pull-right"></i>
                </span>
                <ul id="joinedGrpList" class="list-group">
                    <?php
                    foreach ($joinedGropus as $jGroups) {
                        ?>
                        <li class="list-padding list-group-item">
                            <span>
                                <?php
                                echo $this->Html->link($jGroups['Group']['title'], array(
                                    'controller' => 'groups',
                                    'action' => 'view', $jGroups['Group']['id']
                                ));
                                ?>

                            </span>
                        </li>
                        <?php
                    }
                    ?>


                </ul>

            </li>
            <li class="list-padding list-group-item">
                <span>
                    <a  data-toggle="modal"  data-target="#myModal">
                        Create Group
                    </a>
                </span>
            </li>
            <li class="list-padding list-group-item">
                <span>
                    <a href="<?php echo $this->Html->url(array('controller' => 'groups', 'action' => 'add')); ?>">
                        Search Group
                    </a>
                </span>
            </li>
        </ul>


        <a href="<?php echo $this->Html->url(array('controller' => 'keynotes', 'action' => 'index')); ?>">
            <li class="list-group-item"><i class="fa fa-newspaper-o" ></i><span>KeyNotes</span></li>
        </a>
        <?php
        //   if ($userType == 5) {
        ?>
        <!--            <a id="orgToggle">
                        <li class="list-group-item"><i class="fa fa-hospital-o" ></i><span>Organizations</span>
                            <div class="dashboard-plusIcon pull-right">
                                <i class="fa fa-plus"></i>    
                            </div>
                        </li>
                    </a>-->
        <!--
                    <ul id="org-drop-list" class="list-group">
                        <li id="OrgGrps" class="list-padding list-group-item">
                            <span>
                                <a>
        <?php //echo $org['Organization']['organization_name'] ?>
                                </a>
                                <i class="fa fa-plus pull-right"></i>
                            </span>
                            <ul id="org-grps-list" class="list-group">
        <?php
        //   foreach ($orgGrps as $orgGroups) {
        ?>
                                    <li class="list-padding list-group-item">
                                        <span>
        <?php
        //  echo $this->Html->link($orgGroups['Group']['title'], array(
        //    'controller' => 'groups',
        //  'action' => 'view', $orgGroups['Group']['group_unique_name']
        //  ));
        ?>
        
                                        </span>
                                    </li>
        <?php
        //  }
        ?>
        
        
                            </ul>
        
                        </li>
        
                    </ul>-->



        <?php
        //   }
        ?>


    </ul>
</div>

