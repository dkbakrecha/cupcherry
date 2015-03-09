<?php 

?>
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
            <h2 class="content-header-title"><i class="fa fa-book fa-2x"></i> &nbsp;Add New Resource</h2>
            <!--        <ol class="breadcrumb">
                      <li><a href="http://preview.jumpstartthemes.com/target-admin/index.html">Home</a></li>
                      <li><a href="javascript:;">Extra Pages</a></li>
                      <li class="active">Blank Page</li>
                    </ol>-->
        </div> <!-- /.content-header -->
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <h3>Fill Details</h3>
                <br>
                <?php
                echo $this->Form->create('Resource', array('role' => 'for' ,'enctype' => 'multipart/form-data'));
                ?>
                <div class="form-group">
                    <div class="row">
                        <dvi class='col-md-12'>
                           <label for="exampleInputEmail1">User Name  </label>
                            <?php echo $this->Form->input('user_id', array('div' => false, 'label' => false,'value'=>$currentUser['fname'],'class' => 'form-control ', 'disabled' => 'disabled','type'=>'text')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <dvi class='col-md-12'>
                           <label for="exampleInputEmail1">Resource Title</label>
                            <?php echo $this->Form->input('title', array('div' => false, 'label' => false, 'class' => 'form-control ', 'placeholder' => 'Resource Title')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <dvi class='col-md-12'>
                            <label for="exampleInputEmail1">Select File</label>
                            <?php echo $this->Form->input('filename', array('div' => false, 'label' => false, 'class' => 'form-controls ', 'type' => 'file')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <dvi class='col-md-12'>
                          <label for="exampleInputEmail1">Description </label>
                            <?php echo $this->Form->input('description', array('div' => false, 'label' => false, 'class' => 'form-control ','cols'=>3, 'placeholder' => 'About the file..')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <dvi class='col-md-12'>
                           <label for="exampleInputEmail1">Privacy </label>
                            
                            <?php 
                                $options = array('0'=>'Private','1'=>'Public');
                                
                            echo $this->Form->input('privacy', 
                                    array(
                                        'div' => false, 
                                        'label' => false, 
                                        'class' => 'form-control', 
                                       
                                        'options'=> $options,
                                        )); ?>
                    </div>
                </div>
               
                <div class="form-group">
                    <div class="row">
                        <dvi class='col-md-12'>
                           <label for="exampleInputEmail1">Status</label>
                            <?php 
                            $options = array('0'=>'Active','1'=>'Inactive');
                            echo $this->Form->input('status', 
                                    array('div' => false, 
                                        'label' => false,
                                        'class' => 'form-control ',
                                        'options' => $options)); ?>
                    </div>
                </div>

              
                <?php
                echo $this->Form->Submit('Save', array('class' => 'btn btn-success  '));
                echo $this->Form->end();
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