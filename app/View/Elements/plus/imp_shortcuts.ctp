<?php ?>
<div class="row">
    <div class="col-md-12">
        <div class="widget">
<!--            <div class="widget-header"> <i class="icon-bookmark"></i>
                <h3>Important Shortcuts</h3>
            </div>-->
            <!-- /widget-header -->
            <div class="widget-content">
                <div class="shortcuts">
                    <a href="<?php echo $this->Html->url(array('plus'=>true,'controller'=>'users','action'=>'addmember'));?>" class="shortcut">
                        <i class="shortcut-icon icon-list-alt"></i>
                        <span class="shortcut-label">Members</span>
                    </a>
                    <a href="<?php echo $this->Html->url(array(
                        'plus'=>true,
                        'controller'=>'groups',
                        'action'=>'index'
                    ));?>" class="shortcut">
                        <i class="shortcut-icon icon-bookmark"></i>
                        <span class="shortcut-label">Groups</span>
                    </a>
                    <a href="<?php 
                        echo $this->Html->url(array('plus'=>true,'controller'=>'students','action'=>'index'));
                    ?>" class="shortcut">
                        <i class="shortcut-icon icon-signal"></i>
                        <span class="shortcut-label">Students</span> 
                    </a>
                    <a href="javascript:;" class="shortcut">
                        <i class="shortcut-icon icon-comment"></i>
                        <span class="shortcut-label">Exams</span> 
                    </a>
                    <a href="javascript:;" class="shortcut">
                        <i class="shortcut-icon icon-user"></i>
                        <span class="shortcut-label">Sms alert</span>
                    </a>
                    <a href="javascript:;" class="shortcut">
                        <i class="shortcut-icon icon-file"></i>
                        <span class="shortcut-label">Calender</span> 
                    </a>
                    <a href="javascript:;" class="shortcut">
                        <i class="shortcut-icon icon-picture"></i>
                        <span class="shortcut-label">Settings</span> 
                    </a>
                    <a href="<?php echo $this->Html->url(array('plus'=>true,'controller'=>'studetns','action'=>'reports'));?>" class="shortcut"> 
                        <i class="shortcut-icon icon-tag"></i>
                        <span class="shortcut-label">Reports</span>
                    </a>
                </div>
                <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
        </div>
        <!-- /widget -->    
    </div>

</div>
