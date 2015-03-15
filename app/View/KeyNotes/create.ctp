<?php 
    echo $this->Html->css(array(
        'bootstrap/wysihtml5/bootstrap-wysihtml5'
        ));
    echo $this->Html->script(array(
        'bootstrap/wysihtml5/lib/wysihtml5-0.3.0',
        'bootstrap/wysihtml5/bootstrap-wysihtml5'
        ));
?>

<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-header">
                    <i class="fa fa-file"></i> Create KeyNotes
            </div>

            <div class="portlet-content">           
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <?php
                        echo $this->Form->create('KeyNote', array('role' => 'form'));
                        ?>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-md-12'>
                                    <?php echo $this->Form->input('title', array('div' => false, 'label' => false, 'class' => 'form-control ', 'placeholder' => 'Enter KeyNote Title')); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class='col-md-12'>
                                    <?php 
                                    echo $this->Form->input('description', array(
                                        'type' => 'textarea',
                                        'div' => false, 
                                        'label' => false, 
                                        'class' => 'form-control html5wysi', 
                                        'placeholder' => 'Enter KeyNote Here'
                                    )); 
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class='col-md-6'>
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