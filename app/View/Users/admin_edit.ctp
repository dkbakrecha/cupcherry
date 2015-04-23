<style>
    label {
        float: left;
        font-weight: 700;
        margin-bottom: 5px;
        width: 150px;
    }
    .form-control {
        width: 60%;
    }
</style>



<div class="content-header">
    <h2 class="content-header-title">
        <i class="fa fa-user"></i> &nbsp; User Edit 

    </h2>
    <!--            <ol class="breadcrumb">
                    <li><a href="http://preview.jumpstartthemes.com/target-admin/index.html">Home</a></li>
                    <li><a href="javascript:;">Data Elements</a></li>
                    <li class="active">Tables Advanced</li>
                </ol>-->
</div> <!-- /.content-header -->

<div class="row">
    <?php
    echo $this->Form->create('UserProfile', array('role' => 'form'));
    echo $this->Form->hidden('id');
    ?>
    <div class="col-md-5 col-md-offset-1">

        <div class="form-group">
            <div class="row">
                <dvi class='col-md-12'>
                    <label for="exampleInputEmail1">First name</label>
                    <?php echo $this->Form->input('fname', array('div' => false, 'label' => false, 'class' => 'form-control ', 'placeholder' => 'First Name')); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <dvi class='col-md-12'>
                    <label for="exampleInputEmail1">Last name</label>
                    <?php echo $this->Form->input('lname', array('div' => false, 'label' => false, 'class' => 'form-control ', 'placeholder' => 'Last Name')); ?>
            </div>
        </div>                
        <div class="form-group">
            <div class="row">
                <dvi class='col-md-12'>
                    <label for="exampleInputEmail1">Email address</label>
                    <?php echo $this->Form->input('email', array('div' => false, 'value' => $this->request->data['User']['email'], 'label' => false, 'class' => 'form-control ', 'placeholder' => 'Email Address')); ?>
            </div>
        </div>                



    </div>
    <div class="col-md-5">
        <div class="form-group">
            <div class="row">
                <dvi class='col-md-12'>
                    <label id="dobgender" for="Gender">Gender : </label>
                    <?php
                    $options = array('M' => 'Male', 'F' => 'Female');
                    $attributes = array('legend' => false, 'div' => false, 'label' => false);
                    echo $this->Form->radio('gender', $options, $attributes);
                    
                    ?>
                </dvi>

            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <dvi class='col-md-12'>
                    <label id="doblabel" for="exampleInputEmail1">Date Of Birth </label>
                    <div class="form-group">

                        <?php echo $this->Form->input('dob', array('div' => false, 'label' => false, 'separator' => '')); ?>
                    </div>
                </dvi>
            </div>
        </div>                
        <div class="form-group">
            <div class="row">
                <dvi class='col-md-12'>
                    <label for="exampleInputEmail1">Contact Number</label>
                    <?php echo $this->Form->input('contact', array(
                        'div' => false,
                        'label' => false, 
                        'class' => 'form-control',
                        'placeholder' => 'Contact',
                        'value' => $singleUser['UserProfile']['user_mobile'])); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <dvi class='col-md-12'>
                    <label for="exampleInputEmail1">Address</label>
                    <?php echo $this->Form->input('address', array('div' => false, 'label' => false, 'class' => 'form-control input', 'placeholder' => 'Address')); ?>
                    
            </div>
        </div>
    </div>


</div>
<div class="row">
    <div class="col-lg-10 col-lg-offset-1">
        <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'users', 'action' => 'list')) ?>" class="btn btn-primary pull-right">BACK</a>

        <?php echo $this->Form->Submit('Save', array('class' => 'btn btn-success pull-right')); ?>
    </div>
    <?php
    echo $this->Form->end();
    ?>
</div>




<script type="text/javascript">

    // var valid=true;

    jQuery(document).ready(function() {

        // $("#UserDobMonth").addClass("form-control");
        $("#UserDobMonth").css({"width": "25%", "height": "34", 'margin-right': '3px'});

        $("#UserDobYear").css({"width": "25%", "height": "34", 'margin-right': '3px'});
        $("#UserDobDay").css({"width": "10%", "height": "34", 'margin-right': '3px'});
//        $("#doblabel").css({"font-size": "15px", });
//        $("#dobgender").css({"font-size": "15px", });
        $("#UserGenderM").css({"font-size": "15px", "font-weight": "500", 'margin-left': '25px', 'margin-right': '10px'});
        $("#UserGenderF").css({"font-size": "15px", "font-weight": "500", 'margin-left': '25px', 'margin-right': '10px'});


    });




</script>
