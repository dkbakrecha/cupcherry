<?php
//prd($types);
?>
<div class="row">
    <div class="col-md-12 for_heading">
        <h3 class="">Complete your profile</h3>

    </div>

    <div class="col-md-9">

        <?php
        echo $this->Form->create('TeacherProfile', array(
            'class' => 'form-horizontal'
        ));
        ?>
        <div class="form-group">
            <div class="col-md-12">

                <div class="col-md-4">
                    <label class="">You are?</label>
                </div>
                <div class="col-md-7">
                    <?php
                    $options = array('0' => 'Individual Tutor ', '1' => 'Institute');
                    echo $this->Form->input('teacher_type', array(
                        'class' => 'form-control',
                        'empty' => 'Select',
                        'options' => $options,
                        'label' => false,
                        'div' => false,
                        'required' => 'required',
                    ))
                    ?> 

                </div>
                <span class="required-sign">*</span>
            </div>


        </div>



        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-4">
                    <label class="">Country</label>
                </div>
                <div class="col-md-7">
                    <?php
                    $country_options = array('1' => 'india', '2' => 'china', '3' => 'pakistan');

                    echo $this->Form->input('tc_country', array('class' => 'form-control',
                        'empty' => 'Select',
                        'options' => $country_options,
                        'label' => false,
                        'div' => false,
                        'required' => 'required',
                    ))
                    ?>
                </div>

                <span class="required-sign">*</span>
            </div>

        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-4">
                    <label class="">Location</label>
                </div>
                <div class="col-md-7">
                    <?php
                    $location_options = array('1' => 'sardarpura', '2' => 'Jalori Gate', '3' => 'CHB');

                    echo $this->Form->input('tc_country', array(
                        'class' => 'form-control',
                        'empty' => 'Select',
                        'options' => $location_options,
                        'label' => false,
                        'div' => false,
                        'required' => 'required',
                    ))
                    ?>
                </div>
                <span class="required-sign">*</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-4">
                    <label class="">Phone</label>
                </div>
                <div class="col-md-7">
                    <?php
                    echo $this->Form->input('phone_number', array(
                        'class' => 'form-control',
                        'required' => 'required',
                        'type' => 'text', 'label' => false,
                        'div' => false
                    ))
                    ?>
                </div>
                <span class="required-sign">*</span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-4">
                    <label class="">Number Privacy</label>
                </div>
                <div class="col-md-7">
                    <?php
                    $privacy_options = array('0' => 'Private', '1' => 'Public');
                    echo $this->Form->input('phone_privacy', array(
                        'class' => 'form-control',
                        'options' => $privacy_options,
                        'label' => false,
                        'div' => false,
                        'required' => 'required',
                    ));
                    ?>
                </div>
                <span class="required-sign">*</span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-4">
                    <label class="">Write about you..</label>
                </div>
                <div class="col-md-7">
                    <?php
                    echo $this->Form->input('about_you', array(
                        'class' => 'form-control',
                        'placeholder' => 'Write something',
                        'label' => false,
                        'div' => false
                    ));
                    ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-4">
                    <label class="">Teaching Standard</label>
                </div>
                <div class="col-md-7">
                    <?php
                    $type_options[0] = 'Select';
                    foreach ($types as $type) {
                        $type_options[$type['Type']['id']] = $type['Type']['title'];
                    };
                    echo $this->Form->input('teaching_standards', array(
                        'class' => 'form-control',
                        'default' => $type_options[0],
                        'options' => $type_options,
                        'label' => false,
                        'div' => false,
                        'required' => 'required',
                    ));
                    ?>
                </div>
                <span class="required-sign">*</span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-4">
                    <label class="">Subjects you teach..</label>
                </div>
                <div class="col-md-7">
                    <?php
                    $categorie_options[0] = 'Select';
                    foreach ($categories as $cate) {
                        $categorie_options[$cate['Category']['id']] = $cate['Category']['title'];
                    }
                    echo $this->Form->input('teaching_subjects', array(
                        'class' => 'form-control',
                        'options' => $categorie_options,
                        'label' => false,
                        'div' => false,
                        'required' => 'required',
                    ));
                    ?>
                </div>
                <span class="required-sign">*</span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-4">
                    <label class="">Teaching facilities..</label>
                </div>
                <div class="col-md-7">
                    <?php
                    $facility_option[0] = 'Select';
                    foreach ($facility as $fac) {
                        $facility_option[$fac['TeacherFacility']['id']] = $fac['TeacherFacility']['title'];
                    }
                    echo $this->Form->input('teaching_facilities', array(
                        'class' => 'form-control',
                        'options' => $facility_option,
                        'label' => false,
                        'div' => false,
                        'required' => 'required',
                    ));
                    ?>
                </div>
                
                <span class="required-sign">*</span>
               
            </div>

        </div>


        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-4">
                   
                </div>
                <div class="col-md-7">
<?php
                    echo $this->Form->submit('Save', array('class' => ' pull-right btn btn-primary'));
                    ?>
                </div>
            </div>
        </div>


        <?php
        echo $this->Form->end();
        ?>   
    </div>
</div>
<script>
    $(document).ready(function() {
        // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#TeacherProfileTprofileForm").validate({
    
        // Specify the validation rules
        rules: {
            TeacherProfileTeacherType: "required",
            lastname: "required",
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            },
            agree: "required"
        },
        
        // Specify the validation error messages
        messages: {
            firstname: "Please enter your first name",
            lastname: "Please enter your last name",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: "Please enter a valid email address",
            agree: "Please accept our policy"
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  


    });
</script>