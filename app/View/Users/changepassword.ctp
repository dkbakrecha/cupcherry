<?php ?>
<div class="row">
    <div class="col-md-12 for_heading">
        <span><h3>Change Password</h3></span>
    </div>
    <div class="col-md-12">
        <?php
        echo $this->Form->create('User');
        ?>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label>Old Password</label>
                </div>
                <div class="col-md-6">
                    <?php
                    echo $this->Form->input('change_password', 
                            array('class' => 'form-control', 
                                'div' => false, 'label' => false,
                                 'type'=>'password'
                                ));
                    ?>
                </div>
            </div>

        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label>New Password</label>
                </div>
                <div class="col-md-6">
                    <?php
                    echo $this->Form->input('password', array('class' => 'form-control', 'div' => false, 'label' => false,));
                    ?>
                </div>
            </div>

        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3 ">
                    <label>Confirm Password</label>
                </div>
                <div class="col-md-6">
                    <?php
                    echo $this->Form->input('confirm_password', array(
                        'class' => 'form-control ',
                        'div' => false,
                        'label' => false,
                        'type'=>'password'
                      
                    ));
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
                    echo $this->Form->submit('Change', array('class' => 'btn btn-primary pull-right'));
                    ?>
                </div>
            </div>

        </div>
        <?php
        echo $this->Form->end();
        ?>
    </div>
</div>

