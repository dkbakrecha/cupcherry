<div class="section center_content for_reg_back">
    <div class="container">
        <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
                <div class="front_login">
                    <h3 class="amber">Join Us</h3>
                    <?php
                    echo $this->Form->create('User', array('url' => array(
                            'controller' => 'users', 'action' => 'registration'
                    )));
                    ?>
                    <div class="form-group">
                        <div class="row">
                                
                            <div class="col-md-6">
                                <?php echo $this->Form->input('fname', array('label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => 'First Name', 'required' => 'required')); ?> 
                            </div>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('lname', array('label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => 'Last Name', 'required' => 'required')); ?>
                            </div>


                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('username', array('label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => 'Username')); ?>

                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('email', array('label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => 'Email Address')); ?>

                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('password', array('label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => 'Password', 'type' => 'password')); ?>

                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('confirm_password', array('label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => 'Confirm password', 'type' => 'password')); ?>

                    </div>
                    <div class="form-group">

                        <div class="row">

                            <div class="col-md-2 ">
                                <label for="exampleInputPassword1">Gender</label></div>
                            <div class="col-md-10">  
                                <?php
                                $options = array('M' => 'Male', 'F' => 'Female');

                                echo $this->Form->input('gender', array(
                                    'label' => false,
                                    'div' => false,
                                    'class' => 'form-control',
                                    'placeholder' => 'Gender',
                                    'options' => $options));
                                ?>
                            </div>



                        </div> 
                    </div>

                    <div class="form-group">
                        <?php
                        echo $this->Form->submit('Join', array('class' => 'btn btn-primary '));
                        echo $this->Form->end();
                        ?>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>