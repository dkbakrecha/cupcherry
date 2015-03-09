<?php ?>
<style>
    label {
   // display: inline-block;
    float: left;
    font-weight: 700;
    margin-bottom: 5px;
  //  max-width: 100%;
    width: 150px;
}
 .form-control {
     width: 60%;
 }
</style>


    <div class="content-container">

        <div class="content-header">
            <h2 class="content-header-title"><i class="fa fa-user fa-2x"></i> &nbsp;Add New User</h2>
            <!--        <ol class="breadcrumb">
                      <li><a href="http://preview.jumpstartthemes.com/target-admin/index.html">Home</a></li>
                      <li><a href="javascript:;">Extra Pages</a></li>
                      <li class="active">Blank Page</li>
                    </ol>-->
        </div> <!-- /.content-header -->
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <h3>New User Details</h3>
                <br>
                <?php
                echo $this->Form->create('User', array('role' => 'for'));
                ?>
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
                            <label for="exampleInputEmail1">Email Address</label>
                            <?php echo $this->Form->input('email', array('div' => false, 'label' => false, 'class' => 'form-control ', 'placeholder' => 'Email')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <dvi class='col-md-12'>
                          <label for="exampleInputEmail1">Password </label>
                            <?php echo $this->Form->input('password', array('div' => false, 'label' => false, 'class' => 'form-control ', 'placeholder' => 'Password')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <dvi class='col-md-12'>
                           <label for="exampleInputEmail1">Confirm Password </label>
                            <?php echo $this->Form->input('password', array('div' => false, 'label' => false, 'class' => 'form-control ', 'placeholder' => 'Confirm Password')); ?>
                    </div>
                </div>
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
                           <label for="exampleInputEmail1">Contact</label>
                            <?php echo $this->Form->input('contact', array('div' => false, 'label' => false, 'class' => 'form-control ', 'placeholder' => 'Contact')); ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <dvi class='col-md-12'>
                           <label for="exampleInputEmail1">Address</label>
                            <?php echo $this->Form->input('address', array('div' => false, 'label' => false, 'class' => 'form-control input', 'placeholder' => 'Address')); ?>
                            <?php echo $this->Form->input('type', array('div' => false, 'label' => false, 'type' => 'hidden', 'value' => 1)); ?>
                    </div>
                </div>
                <?php
                echo $this->Form->Submit('Save', array('class' => 'btn btn-success  '));
                ?>
            </div>

        </div>

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