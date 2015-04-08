<?php 
//prd($this->request);
?>

<style>
    #personal_btn{
        display: none;
    }   
    #organ_btn{
        display: none;
    }

</style>

<div class="row">
    <div class="col-md-12">
        <div class="widget-header">
            <i class="icon-user"></i>
            <h3>Profile</h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <div class="col-md-3">
                <div >
                    <h3 class="profile_h3">Photo</h3>
                    <i class="fa fa-pencil-square-o fa-2x pull-right"></i>
                </div>

                <hr>


                <div class=" col-md-12">
                    <a href="#" class="thumbnail">
                        <?php
                        echo $this->Html->image('no_image.jpg');
                        ?>
                    </a>
                </div>



            </div>
            <div class="col-md-8">




                <div>
                    <h3 class="profile_h3">Organization</h3>

                    <i id="edit1" class="fa fa-pencil-square-o fa-2x pull-right"></i>

                </div>
                <hr>
                <div id="organization_info">
                    <?php
                    echo $this->Form->create('OrganizationProfile', array(
                        'class' => 'form-horizontal', 'url' => array('plus'=>true,
                            'controller' => 'users', 'action' => 'profile'
                        )
                    ));
                    ?>
                    <div class="form-group">
                        <div class="col-md-9">

                            <label class="control-label">Name</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('organization_name', array(
                                    'class' => 'form-control',
                                    'div' => false,
                                    'label' => false,
                                    'required' => 'required',
                                  
                                    ));
                                ?>

                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-md-9">

                            <label class="control-label">Address</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('organization_address', array(
                                    'class' => 'form-control',
                                    'div' => false, 'label' => false, 'required' => 'required'));
                                ?>

                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-md-9">

                            <label class="control-label">City</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('city', array(
                                    'class' => 'form-control',
                                    'div' => false, 'label' => false, 'required' => 'required'));
                                ?>

                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-md-9">

                            <label class="control-label">State</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('state', array(
                                    'class' => 'form-control',
                                    'div' => false, 'label' => false, 'required' => 'required'));
                                ?>

                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-9">

                            <label class="control-label">Zip Code</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('zip', array(
                                    'class' => 'form-control',
                                    'div' => false, 'label' => false,));
                                ?>

                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-md-9">

                            <label class="control-label">Phone</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('organization_phone', array(
                                    'class' => 'form-control',
                                    'div' => false, 'label' => false,));
                                ?>

                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-md-9">

                            <label class="control-label">Mobile</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('organization_mobile', array(
                                    'class' => 'form-control',
                                    'div' => false, 'label' => false,));
                                ?>

                            </div>
                        </div>

                    </div>
                    <div class="form-actions" id="organ_btn">
                        <?php echo $this->Form->submit('Save', array('class' => 'btn btn-primary', 'div' => false)); ?>
                        <div id="organ_cancel" class="btn btn-default">Cancel</div>
                        <?php echo $this->Form->end(); ?>

                    </div> <!-- /form-actions -->


                </div>



                <hr>

                <div >
                    <h3 class="profile_h3">Personal</h3>
                    <i id="edit2" class="fa fa-pencil-square-o fa-2x pull-right"></i>
                </div>

                <hr>

                <div id="personal_form">
                    <?php
                    echo $this->Form->create('UserProfile', array(
                        'class' => 'form-horizontal',
                        'url' => array('plus' => true, 'controller' => 'users', 'action' => 'profile')
                    ));
                    ?>
                    <div class="form-group">
                        <div class="col-md-9">

                            <label class="control-label">First Name</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('fname', array(
                                    'class' => 'form-control',
                                    'div' => false, 'label' => false,
                                    'required' => 'required',
                                    'readonly' => 'readonly',
                                    ));
                                ?>

                            </div>
                        </div>

                    </div>
                    <div class="form-group">			
                        <div class="col-md-9">
                            <label class="control-label" >Last Name</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('lname', array(
                                    'class' => 'form-control',
                                    'div' => false, 'label' => false,
                                    'readonly' => 'readonly',
                                    ));
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">			
                        <div class="col-md-9">
                            <label class="control-label">Date of Birth</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('dob', array(
                                    'class' => 'form-control',
                                    'div' => false, 'label' => false,
                                    'separator' => '',
                                    'disabled' => 'disabled',
                                    ));
                                ?>
                               
                            </div>

                        </div>

                    </div>


                    <div class="form-group">			
                        <div class="col-md-9">
                            <label class="control-label" >Secondary Email</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('secondary_email', array(
                                    'class' => 'form-control',
                                    'label' => false,
                                    'div' => false,
                                    'readonly' => 'readonly',
                                    ));
                                ?>

                                <p>In case of account recovery</p>
                            </div>
                        </div>

                    </div> 
                    <div class="form-group">			
                        <div class="col-md-9">
                            <label class="control-label" for="username">Mobile</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('user_mobile', array(
                                    'class' => 'form-control',
                                    'label' => false,
                                    'div' => false,
                                    'readonly' => 'readonly',
                                    ));
                                ?>


                            </div>
                        </div>

                    </div> 
                    <div class="form-group">			
                        <div class="col-md-9">
                            <label class="control-label" for="username">Something about you</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('about', array(
                                    'class' => 'form-control',
                                    'label' => false,
                                    'div' => false,
                                    'cols' => 3,
                                    'rows' => 5,
                                    'readonly' => 'readonly',
                                    ));
                                ?>


                            </div>
                        </div>

                    </div> 
                    <div class="form-actions" id="personal_btn">
                        <?php echo $this->Form->submit('Save', array('class' => 'btn btn-primary', 'div' => false)); ?>
                        <div id="personal_cancel" class="btn btn-default">Cancel</div>

                        <?php
                        echo $this->Form->end();
                        ?>
                    </div> <!-- /form-actions -->
                </div>



            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        // edit profile dob
        $('#OrganizationProfilePlusProfileForm input').attr('readonly','readonly');
        $('#UserProfileDobMonth').wrap("<div class='col-md-5'></div>");
        $('#UserProfileDobDay').wrap("<div class='col-md-3'></div>");
        $('#UserProfileDobYear').wrap("<div class='col-md-4'></div>");
        // end


        $('#edit1').click(function() {
            // alert('hello');
            $('#OrganizationProfilePlusProfileForm input').attr('readonly', false);
            $('#OrganizationProfilePlusProfileForm textarea').attr('readonly', false);
            $('#organ_btn').css('display', 'block');
            $('#edit1').css('display', 'none');
        })

        $('#organ_cancel').click(function() {
            // alert('hello');
            $('#OrganizationProfilePlusProfileForm input').attr('readonly', 'readonly');
            $('#OrganizationProfilePlusProfileForm textarea').attr('readonly', 'readonly');
            $('#organ_btn').css('display', 'none');
            $('#edit1').css('display', 'block');
        })





        $('#edit2').click(function() {
            // alert('hello');
            $('#UserProfilePlusProfileForm input').attr('readonly', false);
            $('#UserProfilePlusProfileForm textarea').attr('readonly', false);
            $('#personal_btn').css('display', 'block');
            $('#edit2').css('display', 'none');
            $('#UserProfileDobMonth').prop("disabled", false);
            $('#UserProfileDobDay').prop("disabled", false);
            $('#UserProfileDobYear').prop("disabled", false);
        })

        $('#personal_cancel').click(function() {
            // alert('hello');
            $('#UserProfilePlusProfileForm input').attr('readonly', 'readonly');
            $('#UserProfilePlusProfileForm textarea').attr('readonly', 'readonly');
            $('#personal_btn').css('display', 'none');
            $('#edit2').css('display', 'block');
        })



    })
</script>