<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default"  style="margin-top: 30px;">
                <div class="panel-heading">
                    Home Slider
                    <?php $data = $this->request->data; ?>
                    <?php //prd($data); ?>
                    
                    <div class="col-lg-4 pull-right" style="">
                            <div class="form-group">
                                <div class="btn btn-info btn-sm pull-right"  style="width: 100px; float: left; margin-left: 20px; margin-bottom: 10px; cursor:pointer;" id="MyUploadButton">
                                    <div onclick="imageTrigger()">
                                        <div class="">New Image</div>
                                    </div>	
                                </div>
                                
                                <a href="<?php echo $this->Html->url(array('admin'=>TRUE,'controller'=>'users','action'=>'index')) ; ?>" class="btn btn-default btn-sm pull-right">Back</a>
                            </div>
                        </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            
                            <div class="form-group">
                                <?php echo $this->Form->input('title',array('style'=>'display:none;','label'=>false)); ?>
                            </div>

                        </div>
                       

                        
                        
                        

                        <div class="col-lg-12">
                            <?php
                            if (isset($data) && !empty($data)) {
                                foreach ($data as $gImage) {
                                    ?>
                                    <div class="admin_image_div">
                                        <?php echo $this->Html->image('Home_files/' . $gImage['HomeSlider']['image'],array('width'=>220)); ?>
                                        <div class="img_control">
                                            <?php if ($gImage['HomeSlider']['is_main'] == 1) { ?>
                                            <a href="<?php echo $this->Html->url(array('admin'=>TRUE,'controller'=>'users','action'=>'makeMainbg',$gImage['HomeSlider']['id'])) ; ?>" class='fa fa-circle btn btn-default' title="main background"></a>
                                            <?php } else { ?>
                                            <a href="<?php echo $this->Html->url(array('admin'=>TRUE,'controller'=>'users','action'=>'makeMainbg',$gImage['HomeSlider']['id'])) ; ?>" class='fa fa-circle-o btn btn-default'  title="main background"></a>
                                            <?php } ?>
                                                
                                            <?php if ($gImage['HomeSlider']['status'] == 1) { ?>
                                            <a href="<?php echo $this->Html->url(array('admin'=>TRUE,'controller'=>'users','action'=>'changeSlideStatus',$gImage['HomeSlider']['id'],$gImage['HomeSlider']['status'])) ; ?>" class='fa fa-circle btn btn-default colorGreen'  title="Active"></a>
                                            <?php } else { ?>
                                            <a href="<?php echo $this->Html->url(array('admin'=>TRUE,'controller'=>'users','action'=>'changeSlideStatus',$gImage['HomeSlider']['id'],$gImage['HomeSlider']['status'])) ; ?>" class='fa fa-circle btn btn-default colorRed'  title="Inactive"></a>
                                            <?php } ?>
                                                
                                            <a href="<?php echo $this->Html->url(array('admin'=>TRUE,'controller'=>'users','action'=>'deleteSlideImage',$gImage['HomeSlider']['id'])) ; ?>" class='fa fa-times btn btn-default'  title="Delete" onclick="return confirm('Are you sure to delete it?')"></a>

                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.row -->
</div>

<div style="opacity:0; height:0px !important; width:0px !important;">
    <?php
    echo $this->Form->create('imageTemp', array('type' => 'file'));
    echo $this->Form->input('id', array('type' => 'hidden', 'value' => $this->request->data['Post']['id']));
    echo $this->Form->input('uploadfile', array('id' => 'newImage', 'type' => 'file', 'label' => false, 'onchange' => 'imagesubmitTrigger()', 'class' => ''));
    echo $this->Form->end();
    ?>
</div>	

<script>
    function imageTrigger() {
        document.getElementById("newImage").click();
    }

    function imagesubmitTrigger() {
        $('#imageTempAdminSliderForm').submit();
    }
</script>   