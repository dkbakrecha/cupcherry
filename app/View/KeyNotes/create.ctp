<?php
    echo $this->Html->css(array('/js/summernote/dist/summernote'));
    echo $this->Html->script(array('summernote/dist/summernote'));
?>

<div class="row keynotes-view">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"> <i class="fa fa-file"></i> Create Notes
                <a href="<?php echo $this->Html->url(array('controller' => 'key_notes', 'action' => 'mynotes')) ?>" class="btn pull-right btn-outline">My Notes</a>
            </h3>
        </div>
        <div class="panel-body">

<div class="row">
    <div class="col-md-12">
        <div class="portlet">
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
                                    echo $this->Form->input('standard_id', array(
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
                                    echo $this->Form->input('category_id', array(
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
        </div>
    </div>
</div>




<script>
    $('.html5wysi').summernote({
        height: 250,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough']],
            ['fontsize', ['fontsize']],
            ['para', ['ul', 'ol']],
        ]
    });
</script>