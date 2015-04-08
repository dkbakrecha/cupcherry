<?php ?>

<div class="row">
    <div class="col-md-12">
        <div class="widget-header">
            <i class="icon-group"></i>
            <h3>Members</h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active" >
                        <a href="#jscontrols" data-toggle="tab">View Member</a>
                    </li>
                    <li  >
                        <a href="#formcontrols" data-toggle="tab">New Member</a>
                    </li>

                </ul>

                <br>

                <div class="tab-content ">
                    <div class="tab-pane " id="formcontrols">
                        <?php
                        echo $this->Form->create('User', array(
                            'class' => 'form-horizontal'
                        ));
                        ?>

                        <fieldset>
                            <div class="form-group">
                                <div class="col-md-6">

                                    <label class="control-label" for="firstname">First Name</label>
                                    <div class="controls">
                                        <?php
                                        echo $this->Form->input('fname', array(
                                            'class' => 'form-control',
                                            'div' => false, 'label' => false, 'required' => 'required'));
                                        ?>

                                    </div>
                                </div>

                            </div>
                            <div class="form-group">			
                                <div class="col-md-6">
                                    <label class="control-label" for="firstname">Last Name</label>
                                    <div class="controls">
                                        <?php
                                        echo $this->Form->input('lname', array(
                                            'class' => 'form-control',
                                            'div' => false, 'label' => false));
                                        ?>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">			
                                <div class="col-md-6">
                                    <label class="control-label" for="username">Email</label>
                                    <div class="controls">
                                        <?php
                                        echo $this->Form->input('email', array(
                                            'class' => 'form-control',
                                            'placeholder' => 'Provide valid email id',
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

                    <div class="tab-pane active " id="jscontrols">
                        <div class="12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Sn</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>




                                <?php
                                $i = 1;
                                foreach ($membersList as $memlist) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo $memlist['User']['fname'] . ' ' . $memlist['User']['lname']; ?>
                                        </td>
                                        <td>
                                            <?php echo $memlist['User']['email']; ?>
                                        </td>
                                        <td>
                                            <?php echo $memlist['User']['status']; ?>
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