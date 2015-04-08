<?php

//prd($grpList);
?>

<div class="row">
    <div class="col-md-12">
        <div class="widget-header">
            <i class="icon-group"></i>
            <h3>Groups</h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active" >
                        <a href="#jscontrols" data-toggle="tab">View Groups</a>
                    </li>
                    <li  >
                        <a href="#formcontrols" data-toggle="tab">New Group</a>
                    </li>

                </ul>

                <br>

                <div class="tab-content ">
                    <div class="tab-pane " id="formcontrols">


                        <div class="col-md-12">
                 <?php
                        echo $this->Form->create('Group', array(
                            'class' => 'form-horizontal','url'=>array(
                                'plus'=>true,'controller'=>'groups','action'=>'index'
                            )
                        ));
                        ?>

                            <fieldset>
                                <div class="form-group">
                                    <div class="col-md-6">

                                        <label class="control-label" for="firstname">Select Member</label>
                                        <div class="controls">
                                        <?php
                                        $options = array();
                                        foreach($memberList as $list){
                                            $options[$list['User']['id']] = $list['User']['fname'].' '.$list['User']['lname'].' ('. $list['User']['email'].')';
                                        }
                                        echo $this->Form->input('managed_by', array(
                                            'class' => 'form-control',
                                            'empty'=>'Select',
                                            'div' => false,
                                            'label' => false, 
                                            'required' =>'required',
                                            'options' => $options));
                                        ?>

                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">			
                                    <div class="col-md-6">
                                        <label class="control-label" for="firstname">Select Standard</label>
                                        <div class="controls">
                                        <?php
                                        $options = array();
                                        foreach($types as $type){
                                            $options[$type['Type']['id']] = $type['Type']['title']; 
                                        }
                                        echo $this->Form->input('type', array(
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


                                <div class="form-group">			
                                    <div class="col-md-6">
                                        <label class="control-label">Group Title</label>
                                        <div class="controls">
                                        <?php
                                        echo $this->Form->input('title', array(
                                            'class' => 'form-control',
                                           'required' =>'required',
                                            'label' => false,
                                            'div' => false));
                                        ?>


                                        </div>
                                    </div>

                                </div> 




                                <br />


                                <div class="form-actions">
                                <?php echo $this->Form->submit('Save', array('class' => 'btn btn-primary', 'div' => false)); ?>

                                    <button class="btn">Cancel</button>
                                </div> <!-- /form-actions -->
                            </fieldset>
                        <?php
                       echo  $this->Form->end();
                        ?>



                        </div>


                    </div>

                    <div class="tab-pane active " id="jscontrols">
                        <div class="12">
                            <table class="table table-bordered">

                                <tr>
                                    <th>Sn</th>
                                    <th>Group Title</th>
                                    <th>Managed By</th>
                                    <th>Email</th>
                                      <th>Standard</th>
                                    <th>Actions</th>
                                </tr>



                                <?php
                                $i = 1;
                                foreach ($grpList as $gprlist) {
                                    ?>

                                <tr>
                                    <td>
                                            <?php echo $i; ?>
                                    </td>
                                    <td>
                                            <?php echo $gprlist['Group']['title']; ?>
                                    </td>
                                    <td>
                                            <?php echo $gprlist['User']['fname'].' '. $gprlist['User']['lname']; ?>
                                    </td>
                                    <td>
                                            <?php echo $gprlist['User']['email']; ?>
                                    </td>
                                    <td>
                                            <?php echo $gprlist['Group']['type_id']; ?>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <?
                                $i ++;
                                }

                                ?>

                            </table>
                        </div>
                    </div>

                </div>


            </div>




















        </div>
    </div>
</div>