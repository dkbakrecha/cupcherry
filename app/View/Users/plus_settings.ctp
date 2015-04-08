<?php
echo $this->Html->css('plus/vertical-tabs/bootstrap.vertical-tabs');
?>

<div class="row">
    <div class="col-md-12">
        <div class="widget-header">
            <i class="icon-cogs"></i>
            <h3>Settings</h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <div  class="col-md-12 ">
                <h3>Settings Panel</h3>
                <hr/>
                <div class="col-xs-3"> <!-- required for floating -->
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tabs-left">
                        <li class="active">
                            <a href="#profile" data-toggle="tab">Profile</a>
                        </li>
                        <li>
                            <a href="#password" data-toggle="tab">Password</a>
                        </li>

                    </ul>
                </div>

                <div class="col-md-9">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                            <?php
                            echo $this->Form->create('User', array(
                                'class' => 'form-horizontal'
                            ));
                            ?>

                            <fieldset>
                                <div class="form-group">
                                    <div class="col-md-9">

                                        <label class="control-label" for="firstname">First Name</label>
                                        <div class="controls">
                                            <?php
                                            echo $this->Form->input('fname', array(
                                                'class' => 'form-control',
                                                'div' => false, 'label' => false, 'required' => 'required'));
                                            ?>

                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">			
                                    <div class="col-md-9">
                                        <label class="control-label" for="firstname">Last Name</label>
                                        <div class="controls">
                                            <?php
                                            echo $this->Form->input('lname', array(
                                                'class' => 'form-control',
                                                'div' => false, 'label' => false));
                                            ?>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">			
                                    <div class="col-md-9">
                                        <label class="control-label" for="username">Email</label>
                                        <div class="controls">
                                            <?php
                                            echo $this->Form->input('email', array(
                                                'class' => 'form-control',
                                                'placeholder' => 'Provide valid email id',
                                                'label' => false,
                                                'div' => false));
                                            ?>


                                        </div>
                                    </div>

                                </div> 




                                <br />


                                <div class="form-actions">
                                    <?php echo $this->Form->submit('Save', array('class' => 'btn btn-primary', 'div' => false)); ?>


                                </div> <!-- /form-actions -->
                            </fieldset>
                            <?php
                            echo $this->Form->end();
                            ?>


                        </div>
                        <div class="tab-pane" id="password">
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

                                            <label class="control-label" for="firstname">Current Password</label>
                                            <div class="controls">
                                                <?php
                                                echo $this->Form->input('old_password', array(
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
                                            <label class="control-label" for="firstname">New Password</label>
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
                                            <label class="control-label" for="username">Confirm Password</label>
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

                <div class="clearfix"></div>

            </div>
        </div>
    </div>
</div>