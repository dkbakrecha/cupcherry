<?php ?>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
            
             <a href="<?php
            echo $this->Html->url(array(
                'controller' => 'users',
                'action' => 'uprofile',1));
            ?>">
                <i class="fa fa-user fa-4x"></i> 
                Student
            </a>

        </div>
        <div class="col-md-6">
            <a href="<?php
            echo $this->Html->url(array(
                'controller' => 'users',
                'action' => 'tprofile',2));
            ?>">
                <i class="fa fa-apple fa-4x"></i> 
                Teacher
            </a>

            
        </div>


    </div>




</div>