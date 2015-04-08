<?php

//prd($stuList);
?>

<div class="row">
    <div class="col-md-12">
        <div class="widget-header">
            <i class="icon-group"></i>
            <h3>Students</h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <div class="col-md-8">
                <div class="col-md-10">
                    <?php
                        echo $this->Form->create('Student', array(
                            'class' => 'form-horizontal','url'=>array(
                                'plus'=>true,'controller'=>'students','action'=>'index'
                            )
                        ));
                        //echo $this->Form->hidden('type_value',array('value'=>''));
                        ?>
                    <div class="form-group">			

                        <label class="control-label" for="firstname">Select Standard</label>
                        <div class="controls">
                                        <?php
                                        $options = array();
                                        foreach($types as $type){
                                            $options[$type['Type']['id']] = $type['Type']['title']; 
                                        }
                                        echo $this->Form->input('type_id', array(
                                            'class' => 'form-control',
                                            'div' => false, 
                                            'label' => false,
                                            'empty'=>'Select',
                                            'required' =>'required',
                                            'options'=>$options));
                                        ?>
                        </div>

                    </div>



                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <?php
                    echo $this->Form->submit('Go',array('class'=>'btn btn-primary'));
                    echo $this->Form->end();
                ?>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <a href="<?php echo $this->Html->url(array(
                    'plus'=>true,'controller'=>'students','action'=>'add'
                ))?>" class="btn btn-primary pull-right">Add New</a>

            </div>
            <?php
                if(isset($stuList) && !empty($stuList)){
                    ?>
            <div class="col-md-12">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Standard</th>
                        <th>Contact</th>
                    </tr>
                    <?php
                    $i = 1;
                    foreach($stuList as $list){
                        ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo
                            $this->Form->postLink($list['StudentProfile']['fname'].' '.$list['StudentProfile']['lname'],
                                    array('controller'=>'students','action'=>'edit',$list['StudentProfile']['id']));
                        ?></td>
                        <td><?php echo $list['StudentProfile']['type_id'];?></td>
                        <td><?php echo $list['StudentProfile']['contact_number'];?></td>
                    </tr>
                        <?php
                        $i++;
                    }
                    
                    ?>
                </table>



            </div>
            <?php
                }
            
            ?>


        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#StudentProfileTypeId').change(function() {
            var selectedType;
            selectedType = $('#StudentProfileTypeId option:selected').val();
            $('#StudentProfileTypeValue').val(selectedType);
            //alert(selectedType);
        });

    });
</script>