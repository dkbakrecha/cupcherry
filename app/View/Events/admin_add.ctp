<!-- Admin Side Forms -->
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">            
            <div class="ibox float-e-margins">                
                <!-- <div class="formAdmin"> -->                

                <div class="ibox-content">

                    <?php
                    echo $this->Form->create("Event", array(
                        'action' => 'admin_add',
                        'class' => 'form-horizontal formAdmin',
                            )
                    );
                    ?>

                    <div class="form-group"><label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-6">
                            <?php
                            echo $this->Form->input('title', array(
                                'type' => 'text',
                                'required' => true,
                                'placeholder' => 'Title',
                                'class' => 'form-control',
                                'label' => false
                                    )
                            );
                            ?>
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group"><label class="col-sm-2 control-label">Keywords</label>
                        <div class="col-sm-6">
                            <?php
                            echo $this->Form->input('event_date', array(
                                'type' => 'text',
                                'required' => true,
                                'placeholder' => 'date',
                                'class' => 'form-control',
                                'label' => false,
                                    )
                            );
                            ?>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-8">
                            <?php
                            echo $this->Form->input('description', array(
                                'type' => 'textarea',
                                'required' => true,
                                'placeholder' => 'Description',
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

    $(function() {
        $("#EventEventDate").datepicker();
    });
</script>