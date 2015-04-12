<?php
//prd($standards);
?>

<div class="row">
    <div class="col-md-12">
        <div class="widget-header">
            <i class="icon-group"></i>
            <h3>Students</h3>
            <a href="<?php
            echo $this->Html->url(array(
                'plus' => true, 'controller' => 'students', 'action' => 'index'
            ));
            ?>" class="btn btn-primary pull-right">Back</a>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <?php
            echo $this->Form->create('StudentProfile', array(
                'class' => 'form-horizontal', 'url' => array(
                    'plus' => true, 'controller' => 'students', 'action' => 'add'
                )
            ));
            ?>
            <div class="col-md-12 ">
                <div class="col-md-6 left-border">
                    <h3>Student Details</h3>
                    <hr>

                    <div class="form-group">			
                        <div class="col-md-12">
                            <label class="control-label" for="firstname">Select Standard</label>
                            <div class="controls">
                                <?php
                                $options = array();
                                foreach ($standards as $standard) {
                                    $options[$standard['Standard']['id']] = $standard['Standard']['title'];
                                }
                                echo $this->Form->input('standard_id', array(
                                    'class' => 'form-control',
                                    'div' => false,
                                    'label' => false,
                                    'empty' => 'Select',
                                    'required' => 'required',
                                    'options' => $options));
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">			
                        <div class="col-md-12">
                            <label class="control-label" >First Name</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('fname', array(
                                    'label' => false,
                                    'div' => false,
                                    'class' => 'form-control',
                                    'required' => 'required'
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">			
                        <div class="col-md-12">
                            <label class="control-label" >Last Name</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('lname', array(
    'label' => false,
    'div' => false,
    'class' => 'form-control',
    'required' => 'required'
));
?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">			
                        <div class="col-md-12">
                            <label class="control-label" >Gender</label>
                            <div class="controls">
                                <?php
                                $options = array('M' => 'Male', 'F' => 'Female');
                                echo $this->Form->input('gender', array(
                                    'label' => false,
                                    'div' => false,
                                    'empty' => 'Select',
                                    'options' => $options,
                                    'required' => 'required',
                                    'class' => 'form-control',
                                    'required' => 'required'
                                ));
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">			
                        <div class="col-md-12">
                            <label class="control-label" >Date Of Birth</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('dob', array(
                                    'label' => false,
                                    'div' => false,
                                    'class' => 'form-control',
                                    'separator' => '',
                                    'required' => 'required'
                               ));
                                ?>
                            </div>
                        </div>
                    </div>
                    <h3>Contact Details</h3>
                    <hr>
                    <div class="form-group">			
                        <div class="col-md-12">
                            <label class="control-label" >Contact Number</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('contact_number', array(
                                    'label' => false,
                                    'div' => false,
                                    'class' => 'form-control',
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">			
                        <div class="col-md-12">
                            <label class="control-label" >Address</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('address', array(
                                    'label' => false,
                                    'div' => false,
                                    'class' => 'form-control',
                                    'required' => 'required'
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">			
                        <div class="col-md-12">
                            <label class="control-label" >City</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('city', array(
                                    'label' => false,
                                    'div' => false,
                                    'class' => 'form-control',
                                    'required' => 'required'
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">			
                        <div class="col-md-12">
                            <label class="control-label" >Pin Code</label>
                            <div class="controls">
                                <?php
                                echo $this->Form->input('pin', array(
                                    'label' => false,
                                    'div' => false,
                                    'class' => 'form-control',
                                    'required' => 'required'
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
<!--                    <h3>For Students Login 
                      
                    </h3>
                    <hr>-->

<!--                    <div class="form-group">			
                        <div class="col-md-12">
                            <label class="control-label" for="firstname">Email Address</label>
                            <div class="controls">
                                <?php
//                                echo $this->Form->input('email', array(
//                                    'label' => false,
//                                    'div' => false,
//                                    'class' => 'form-control',
//                                ));
                                ?>
                                <p>Cupcherry login access. Student can use all other facilities. </p>
                            </div>
                        </div>
                    </div>-->





                </div>
                <div class="col-md-6">

                    <h3>Parents Detail</h3>
                    <hr>
                    <div class="slt-opt clearfix">

                        <div class="pull-right">
                            <div id="new-ent" class="btn btn-primary"> New Entry </div> 
                            <div  id="ald-exst" class="btn btn-primary"> Already Exist</div>
                        </div>


                    </div>
                    <div id="search-box">
                        <div class="form-group form-alter">			
                            <div class="col-md-12">
                                <label class="control-label" >Search</label>
                                <div class="controls">
                                    <?php
                                    echo $this->Form->input('serach_box', array(
                                        'label' => false,
                                        'div' => false,
                                        'class' => 'form-control',
                                        //'required' => 'required',
                                        'placeholder' => 'Search by Name, Email or Phone',
                                    ));
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="p-form">
                        <div class="form-group form-alter">			
                            <div class="col-md-12">
                                <label class="control-label" >First Name</label>
                                <div class="controls">
                                    <?php
                                    echo $this->Form->input('parent_fname', array(
                                        'label' => false,
                                        'div' => false,
                                        'class' => 'form-control',
                                        'required' => 'required'
                                    ));
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-alter">			
                            <div class="col-md-12">
                                <label class="control-label" >Last Name</label>
                                <div class="controls">
                                    <?php
                                    echo $this->Form->input('parent_lname', array(
                                        'label' => false,
                                        'div' => false,
                                        'class' => 'form-control',
                                        'required' => 'required'
                                    ));
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-alter">			
                            <div class="col-md-12">
                                <label class="control-label" >Relation</label>
                                <div class="controls">
                                    <?php
                                    $options = array(
                                        'father' => 'Father',
                                        'mother' => 'Mother',
                                        'uncle' => 'Uncle',
                                        'aunty' => 'Aunty',
                                        'other' => 'Other');
                                    echo $this->Form->input('relation', array(
                                        'label' => false,
                                        'div' => false,
                                        'empty' => 'Select',
                                        'options' => $options,
                                        'class' => 'form-control',
                                        'required' => 'required'
                                    ));
                                    ?>
                                </div>
                            </div>
                        </div>
                        <h4>Contact Details</h4>
                        <p>You will be able to send emails and sms alerts.</p>
                        <hr>
                        <div class="form-group form-alter">			
                            <div class="col-md-12">
                                <label class="control-label" >Address</label>
                                <div class="controls">
                                    <?php
                                    echo $this->Form->input('parent_address', array(
                                        'label' => false,
                                        'div' => false,
                                        'class' => 'form-control',
                                        'required' => 'required'
                                   ));
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-alter">			
                            <div class="col-md-12">
                                <label class="control-label" >Mobile</label>
                                <div class="controls">
                                    <?php
                                    echo $this->Form->input('parent_mobile', array(
                                        'label' => false,
                                        'div' => false,
                                        'class' => 'form-control',
                                        'required' => 'required'
                                    ));
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-alter">			
                            <div class="col-md-12">
                                <label class="control-label" >Phone</label>
                                <div class="controls">
                                    <?php
                                    echo $this->Form->input('parent_phone', array(
                                        'label' => false,
                                        'div' => false,
                                        'class' => 'form-control',
                                        'required' => 'required'
                                    ));
                                    ?>
                                </div>
                            </div>
                        </div>
                        <h3>For Parents Login</h3>
                        <hr>

                        <div class="form-group form-alter">			
                            <div class="col-md-12">
                                <label class="control-label" >Email</label>
                                <div class="controls">
                                    <?php
                                    echo $this->Form->input('parent_email', array(
                                        'label' => false,
                                        'div' => false,
                                        'class' => 'form-control',
                                        
                                    ));
                                    ?>
                                    <p>Cupcherry access for parents.</p>
                                </div>
                            </div>
                        </div>




                    </div>


                </div>
                <div class="col-md-12" >
                    <div class="form-actions">
                        <?php
                        echo $this->Form->submit('Save', array('class' => 'btn btn-primary', 'div' => false));
                        echo $this->Form->end();
                        ?>

                        <button class="btn" >Reset</button>
                    </div> <!-- /form-actions -->

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        //  dob

        $('#StudentProfileDobMonth').wrap("<div class='col-md-5'></div>");
        $('#StudentProfileDobDay').wrap("<div class='col-md-3'></div>");
        $('#StudentProfileDobYear').wrap("<div class='col-md-4'></div>");
        // end
        $('#ald-exst').click(function() {
            $('#p-form').css('display', 'none');
            $('#ald-exst').css('display', 'none');
            $('#new-ent').css('display', 'block');
            $('#search-box').css('display', 'block');
        });
        $('#new-ent').click(function() {
            $('#p-form').css('display', 'block');
            $('#ald-exst').css('display', 'block');
            $('#new-ent').css('display', 'none');
            $('#search-box').css('display', 'none');
        });
    });
</script>