<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-header">
                <h3>
                    <i class="fa fa-file"></i> Types Edit
                </h3>
            </div>

            <div class="portlet-content">           
                <div class="row">
                    <div class="col-md-6 col-md-offset-1">
                        <?php
                        echo $this->Form->create('Standard', array('role' => 'form'));
                        echo $this->Form->hidden('id');
                        ?>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-md-12'>
                                    <label for="exampleInputEmail1">Standard Name</label>
                                    <?php echo $this->Form->input('title', array('div' => false, 'label' => false, 'class' => 'form-control ', 'placeholder' => 'First Name')); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-md-12'>
                                    <label for="exampleInputEmail1">Description</label>
                                    <?php echo $this->Form->input('description', array('div' => false, 'label' => false, 'class' => 'form-control ', 'placeholder' => 'First Name')); ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        echo $this->Form->Submit('Save', array('class' => 'btn btn-success  '));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>