<?php ?>

<div class="row">
    <div class="col-md-12">
        <div class="widget-header">
            <i class="icon-key"></i>
            <h3>Change Password</h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <div class="col-md-12">



                <?php
                echo $this->Form->create('User', array(
                    'class' => 'form-horizontal', 'url' => array(
                        'plus' => true, 'controller' => 'users', 'action' => 'changepassword'
                    )
                ));
                ?>

                <fieldset>
                    <div class="form-group">
                        <div class="col-md-9">

                            <label class="control-label">Current Password</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('change_password', array(
                                    'class' => 'form-control',
                                    'div' => false, 'label' => false,
                                    'required' => 'required',
                                    'type' => 'password'));
                                ?>

                            </div>
                        </div>

                    </div>
                    <div class="form-group">			
                        <div class="col-md-9">
                            <label class="control-label" >New Password</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('password', array(
                                    'class' => 'form-control',
                                    'div' => false, 'label' => false,
                                    'required' => 'required',
                                    'type' => 'password'));
                                ?>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">			
                        <div class="col-md-9">
                            <label class="control-label">Confirm Password</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('confirm_password', array(
                                    'class' => 'form-control',
                                    'required' => 'required',
                                    'label' => false,
                                    'div' => false,
                                    'type' => 'password'));
                                ?>


                            </div>
                        </div>

                    </div> 




                    <br />


                    <div class="form-actions">
                        <?php echo $this->Form->submit('Update', array('class' => 'btn btn-primary', 'div' => false)); ?>


                    </div> <!-- /form-actions -->
                </fieldset>
                <?php
                echo $this->Form->end();
                ?>

            </div>

        </div>
    </div>
</div>