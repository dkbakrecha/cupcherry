<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-header">
                <h3>
                    <i class="fa fa-file"></i> Add Standard 
                </h3>
            </div>

            <div class="portlet-content">  

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h3> Add New Standard</h3><br>
                        <?php echo $this->Form->create('Standard', array('role' => 'form')); ?>
                        <div class="form-group ">
                            <label for="exampleInputEmail1">Standard Name</label>
                            <?php echo $this->Form->input('title', array('div' => false, 'label' => false, 'class' => 'form-control ', 'placeholder' => 'First Name')); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <?php echo $this->Form->input('description', array('label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => 'Category Title')); ?>
                        </div>

                        <?php echo $this->Form->Submit('Save', array('class' => 'btn btn-success col-md-offset-2 ')); ?>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>


           </div>
        </div>
    </div>
</div>