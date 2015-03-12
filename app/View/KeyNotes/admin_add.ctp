<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-header">
                <h3>
                    <i class="fa fa-file"></i> KeyNotes
                </h3>
            </div>

            <div class="portlet-content">           
                <div class="row">
                    <div class="col-md-6 col-md-offset-1">
                        <?php
                        echo $this->Form->create('KeyNote', array('role' => 'form'));
                        ?>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-md-12'>
                                    <label for="exampleInputEmail1">Title</label>
                                    <?php echo $this->Form->input('title', array('div' => false, 'label' => false, 'class' => 'form-control ', 'placeholder' => 'First Name')); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class='col-md-12'>
                                    <label for="exampleInputEmail1">Description</label>
                                    <?php echo $this->Form->input('description', array('div' => false, 'label' => false, 'class' => 'form-control html5wysi', 'placeholder' => 'Last Name')); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class='col-md-6'>
                                    <label for="exampleInputEmail1">Class Type</label>
                                    <?php
                                    echo $this->Form->input('type_id', array(
                                        'options' => $listData['types'],
                                        'empty' => '( choose class type )',
                                        'label' => false,
                                        'required' => true,
                                        'class' => 'form-control'
                                    ));
                                    ?>
                                </div>

                                <div class='col-md-6'>
                                    <label for="exampleInputEmail1">Category</label>
                                    <?php
                                    echo $this->Form->input('cayegory_id', array(
                                        'options' => $listData['categories'],
                                        'empty' => '( choose Category )',
                                        'label' => false,
                                        'required' => true,
                                        'class' => 'form-control'
                                    ));
                                    ?>
                                </div>
                            </div>
                        </div>

                        <?php
                        echo $this->Form->Submit('Save', array('class' => 'btn btn-success'));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.html5wysi').wysihtml5();
</script>