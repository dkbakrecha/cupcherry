<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">            
            <div class="ibox float-e-margins">                
                <!-- <div class="formAdmin"> -->                

                <div class="ibox-content">
                    <?php
                    echo $this->Form->create("EmailContent", array(
                        'autocomplete' => 'off',
                        'class' => 'form-horizontal formAdmin',
                        'onsubmit' => 'return validate()'
                    ));

                    echo $this->Form->input('id', array('type' => 'hidden'));
                    ?>

                    <div class="form-group"><label class="col-sm-2 control-label">To</label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('to', array(
                                'type' => 'text',
                                'placeholder' => 'To address',
                                'id' => 'mailIds',
                                'class' => 'form-control',
                                'label' => false,
                            ));
                            ?>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Subject</label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('subject', array(
                                'type' => 'text',
                                'required' => true,
                                'placeholder' => 'Subject',
                                'class' => 'form-control',
                                'label' => false,
                            ));
                            ?>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Body</label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('content', array(
                                'type' => 'textarea',
                                'placeholder' => 'Email Body',
                                'rows' => '6',
                                'cols' => '120',
                                'label' => false,
                                'required' => false
                            ));
                            echo $this->Form->error('content');
                            ?>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-white" type="button">Back</button>
                            <button class="btn btn-primary" type="submit">Send</button>
                        </div>
                    </div>
                    <?php
                    echo $this->Form->end();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('textarea#EmailContentContent').summernote({
            height: 250,
        });
        $('#mailIds').tagsinput({
            trimValue: true,
            confirmKeys: [13, 32]
        });

        <?php if (isset($user_email) && !empty($user_email)) { ?>
            $('#mailIds').tagsinput('add', '<?php echo $user_email; ?>');
        <?php } ?>

        /*
        $("#mailIds").on('beforeItemAdd', function(event) {
            if (!IsEmail(event.item)) {
                event.cancel = true;
            }
        });
        */
        $(".btn.btn-white").click(function() {
            window.top.location = '<?php echo $this->Html->url(array("admin" => true, "controller" => "email_contents", "action" => "index")); ?>';
        });
    });

    function validate()
    {
        $(".error-message").remove();

        if ($("#EmailContentSubject").val().trim() == "") {
            $("#EmailContentSubject").parent().append('<div class="error-message">Subject is required.</div>');
            return false;
        }

        description = 'EmailContentContent';
        if (validateCKEDITORforBlank($.trim(CKEDITOR.instances.EmailContentContent.getData().replace(/<[^>]*>|\s/g, ''))))
        {
            $("#" + description).parent().append('<div class="error-message">This field is required.</div>');
            //CKEDITOR.instances.description.setData("");
            return false;
        }


        /*var nicE = new nicEditors.findEditor('EmailContentContent');
         var dataInEditor    =   nicE.getContent();*/

        if ($("#EmailContentSubject").val().trim() == "") {
            $("#EmailContentSubject").parent().append('<div class="error-message">Subject is required.</div>');
            return false;
        }

        description = 'EmailContentContent';
        if (validateCKEDITORforBlank($.trim(dataInEditor.replace(/<[^>]*>|\s/g, ''))))
        {
            $("#" + description).parent().append('<div class="error-message">This field is required.</div>');
            nicE.setContent("");
            return false;
        }
        return true;
    }

    $(document).ready(function() {
        $('#mailIds').parent().find(".bootstrap-tagsinput").addClass('form-control');
    });
</script>