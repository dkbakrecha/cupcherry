<?php ?>
<div class="row">
    <div class="col-md-12 for_heading">
        <span><h3>Profile</h3></span>
    </div>
    <div class="col-md-12">
        <?php
        echo $this->Form->create('UserProfile', array('clasee' =>'form-horizontal','url' => array(
                'controller' => 'users', 'action' => 'edit_profile'
        )));
        ?>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label>First Name</label>
                </div>
                <div class="col-md-6">
                    <?php
                    echo $this->Form->input('fname', array('class' => 'form-control', 'div' => false, 'label' => false,));
                    ?>
                </div>
            </div>

        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label>Last Name</label>
                </div>
                <div class="col-md-6">
                    <?php
                    echo $this->Form->input('lname', array('class' => 'form-control', 'div' => false, 'label' => false,));
                    ?>
                </div>
            </div>

        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3 ">
                    <label>Date of Birth</label>
                </div>
                <div class="col-md-6 LRpadding">
                    <?php
                    echo $this->Form->input('dob', array(
                        'class' => 'form-control ',
                        'div' => false,
                        'label' => false,
                        'separator' => '',
                            // pending year picker
//                       'dateFormat' => 'DMY',
//                    'minYear' => date('Y') - 70,
//                    'maxYear' => date('Y') - 18
                    ));
                    ?>
                </div>
            </div>

        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label>Secondary Email</label>
                </div>
                <div class="col-md-6">
                    <?php
                    echo $this->Form->input('secondary_email', array('class' => 'form-control', 'div' => false, 'label' => false,));
                    ?>
                </div>
            </div>

        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label>Something About You</label>
                </div>
                <div class="col-md-6">
                    <?php
                    echo $this->Form->input('about', array('class' => 'form-control', 'div' => false, 'label' => false,));
                    ?>
                </div>
            </div>

        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6">
                    <?php
                    echo $this->Form->submit('Update', array('class' => ' pull-right btn btn-primary'));
                    ?>
                </div>
            </div>

        </div>
        <?php
        echo $this->Form->end();
        ?>
    </div>
</div>

