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
            'class' => 'form-horizontal',
           
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

                    echo $this->Form->input('tc_location', array(
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
                   
                    foreach ($types as $type) {
                        $type_options[$type['Type']['id']] = $type['Type']['title'];
                    };
                    echo $this->Form->input('teaching_standards', array(
                        'class' => 'form-control',
                         'empty' =>'Select',
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
                  
                    foreach ($categories as $cate) {
                        $categorie_options[$cate['Category']['id']] = $cate['Category']['title'];
                    }
                    echo $this->Form->input('teaching_subjects', array(
                        'class' => 'form-control',
                         'empty' =>'Select',
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
                   // $facility_option[0] = 'Select';
                    foreach ($facility as $fac) {
                        $facility_option[$fac['TeacherFacility']['id']] = $fac['TeacherFacility']['title'];
                    }
                    echo $this->Form->input('teaching_facilities', array(
                        'class' => 'form-control',
                        'empty' =>'Select',
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
                    echo $this->Form->submit('Save', array(
                        'class' => ' pull-right btn btn-primary', 
                        ));
                    ?>
                </div>
            </div>
        </div>


        <?php
        echo $this->Form->end();
        ?>   
    </div>
</div>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        // When the browser is ready...
        $(function() {
            // alert('Hello');
            // Setup form validation on the #register-form element
            $("#TeacherProfileTprofileForm").validate({
                // Specify the validation rules
                rules: {
                    TeacherProfileTeacherType: "required",
                    TeacherProfileTeachingStandards: "required",
                    TeacherProfileTeachingSubjects: "requiredv",
                    TeacherProfileTcLocation: "required",
                    TeacherProfileTeachingFacilities: "required",
                    TeacherProfilePhonePrivacy: "required",
                },
                // Specify the validation error messages
                messages: {
                    TeacherProfileTeacherType: "Please enter your first name",
                    TeacherProfilePhoneNumber: "Please fill this..",
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });

        }
        );



    });
</script>