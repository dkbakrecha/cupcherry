<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-header">
                <h3>
                    <i class="fa fa-file"></i> Category add
                </h3>
            </div>

            <div class="portlet-content">           
                <div class="row">
                    <div class="col-md-6 col-md-offset-1">
                        <?php
                        echo $this->Form->create('Category', array('role' => 'form'));
                        ?>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-md-12'>
                                    <label for="exampleInputEmail1">Enter new class</label>
                                    <?php echo $this->Form->input('title', array('div' => false, 'label' => false, 'class' => 'form-control ', 'placeholder' => 'First Name')); ?>
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