<?php
//
//  prd($joinedGropus);
?>

<div class="profile_pic_panel">
    <div class="thumbnail" id="image-thumb">
        <?php echo $this->Html->image('no_image.jpg'); ?>
        <div class="change_image">
            <a  href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'upload_image')); ?>">
                <div class="change_pic" id="show_pic_change">
                    Change    
                </div>

            </a>
        </div>
    </div>


</div>
<div class="panel panel-primary panel-custome ">
    <a class="dash_panel_heading" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'dashboard')); ?>">
        <div class="panel-heading">
            <i class="fa fa-dashboard fa-2x" ></i>Dashboard
        </div>
    </a>

    <ul class="list-group">

        <a id="groupListToggle">
            <li class="list-group-item"><i class="fa fa-group fa-2x" ></i><span>Groups</span>
                <div class="dashboard-plusIcon pull-right">
                    <i class="fa fa-plus"></i>    
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
            <li id="joinedGrp" class="list-padding list-group-item"><span>
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


        <a href="#">
            <li class="list-group-item"><i class="fa fa-book fa-2x" ></i><span>KeyNotes</span></li>
        </a>
        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit_profile')); ?>">
            <li class="list-group-item"><i class="fa fa-user fa-2x" ></i><span>Edit Profile</span></li>
        </a>
        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'changepassword')); ?>">
            <li class="list-group-item"><i class="fa fa-key fa-2x" ></i><span>Change Password</span></li>
        </a>
        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')); ?>">
            <li class="list-group-item"><i class="fa fa-sign-out fa-2x" ></i><span>Logout</span></li>
        </a>

    </ul>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header for_heading">
                <button type="button" class="close" 
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Create Group
                </h4>
            </div>
            <div class="modal-body">


                <?php
                echo $this->Form->create('Group', array(
                    'type' => 'file',
                    'url' => array('controller' => 'groups', 'action' => 'add')));
                ?>



                <div class="form-group">

                    <?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Group Title', 'required' => 'required', 'label' => false)); ?>
                </div>

                <div class="form-group">

                    <?php echo $this->Form->input('description', array('class' => 'form-control', 'placeholder' => 'Group Description', 'type' => 'textarea', 'label' => false)); ?>
                </div>
                <div class="form-group">

                    <?php echo $this->Form->input('image', array('class' => 'form-control', 'type' => 'file', 'label' => false, 'div' => false)); ?>
                </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" 
                        data-dismiss="modal">Close
                </button>


                <?php echo $this->Form->submit('Create', array('div' => false, 'class' => 'btn btn-primary ')); ?>
                <?php echo $this->Form->end(); ?>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>