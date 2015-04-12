<!-- Admin Side Forms -->
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">            
            <div class="ibox float-e-margins">                
                <!-- <div class="formAdmin"> -->                

                <div class="ibox-content">


                    <?php
                    echo $this->Form->create("EmailContent", array(
                        'action' => 'admin_edit',
                        'autocomplete' => 'off',
                        'class' => 'form-horizontal formAdmin',
                        'onsubmit' => 'return validate("content")'
                            )
                    );
                    echo $this->Form->input('id', array('type' => 'hidden'));
                    ?>

                    <div class="form-group"><label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-6">
                            <?php
                            echo $this->Form->input('title', array(
                                'type' => 'text',
                                'required' => true,
                                'placeholder' => 'Title',
                                'class' => 'form-control',
                                'label' => false,
                                    )
                            );
                            ?>

                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group"><label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-6">
                            <?php
                            echo $this->Form->input('title', array(
                                'type' => 'text',
                                'required' => true,
                                'placeholder' => 'Title',
                                'class' => 'form-control',
                                'label' => false,
                                    )
                            );
                            ?>

                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group"><label class="col-sm-2 control-label">Keywords</label>
                        <div class="col-sm-6">
                            <?php
                            echo $this->Form->input('keywords', array(
                                'type' => 'text',
                                'required' => true,
                                'placeholder' => 'Title',
                                'class' => 'form-control',
                                'label' => false,
                                'readonly' => true,
                                    )
                            );
                            ?>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-sm-2 control-label">Body</label>
                        <div class="col-sm-8">

                            <?php
                            echo $this->Form->input('content', array(
                                'type' => 'textarea',
                                'required' => true,
                                'placeholder' => 'Email Body',
                                'rows' => '6',
                                'cols' => '80',
                                'label' => false
                                    )
                            );
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-white" type="button" onclick="window.location = '<?php echo $this->Html->url(array('admin' => true, 'controller' => 'email_contents', 'action' => 'index')); ?>'" type="buton">Back</button>
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </div>
                    </div>
                    <?php
                    echo $this->Form->end();
                    ?>
                </div>

                <!-- </div> -->
            </div>



        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('textarea#EmailContentContent').summernote();
    });
</script>