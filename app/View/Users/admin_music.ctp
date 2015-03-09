<section class="content">
    <header class="main-header clearfix">
        <h1 class="main-header__title">
            <i class="fa fa-file"></i>
            Background Music
        </h1>
        <div class="main-header__date">
            <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'users', 'action' => 'settings')); ?>" class="btn btn-light pull-right">Back</a>
        </div>
    </header>

    <div class="row">

        <div class="col-md-12">
            <article class="widget">
                <header class="widget__header">
                    <h3 class="widget__title">Site Music</h3>
                </header>

                <div class="widget__content">
                    <?php echo $this->Form->create('Music', array('type' => 'file')); ?>
                    <?php
                    echo $this->Form->input('file', array(
                        'label' => false,
                        'type' => 'file',
                        'placeholder' => 'Music File',
                        'class' => 'input-text'));
                    ?>
                    
                    <?php
                    echo $this->Form->input('play', array(
                        'label' => false,
                        'options' => array('0' => 'play' , '1' => 'not play'),
                        'placeholder' => 'Play',
                        'class' => 'input-text'));
                    ?>
                    
                    <?php echo $this->Form->submit('Save', array('class' => 'btn btn-light pull-right')); ?>
                    <?php echo $this->Form->end(); ?>
                    <div class="clearfix"></div>
                </div>

            </article>
        </div>
    </div>
</section> <!-- /content -->


<div style="opacity:0; height:0px !important; width:0px !important;">
    <?php
    echo $this->Form->create('imageTemp', array('type' => 'file'));
    echo $this->Form->input('id', array('type' => 'hidden', 'value' => $this->request->data['Product']['id']));
    ?>
    <?php echo $this->Form->input('uploadfile', array('id' => 'newImage', 'type' => 'file', 'label' => false, 'onchange' => 'imagesubmitTrigger()', 'class' => '')); ?>
<?php echo $this->Form->end(); ?>
</div>	

<script>
    function imageTrigger() {
        document.getElementById("newImage").click();
    }

    function imagesubmitTrigger() {
        $('#imageTempAdminAddForm').submit();
    }
</script>


<script type="text/javascript">

    $(document).ready(function() {
        $('#keyWords').tagsinput();


        $('textarea#ProductSpecification').ckeditor();
    });

    function validateCKEDITORforBlank(field)
    {
        var vArray = new Array();
        vArray = field.split("&nbsp;");
        var vFlag = 0;
        for (var i = 0; i < vArray.length; i++)
        {
            if (vArray[i] == '' || vArray[i] == "")
            {
                continue;
            }
            else
            {
                vFlag = 1;
                break;
            }
        }
        if (vFlag == 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function validate(description)
    {

        $(".error-message").remove();
        if (validateCKEDITORforBlank($.trim(CKEDITOR.instances.description.getData().replace(/<[^>]*>|\s/g, ''))))
        {
            $("#" + description).parent().append('<div class="error-message">This field is required.</div>');
            CKEDITOR.instances.description.setData("");
            return false;
        }
        return true;
    }
</script>     
