<?php ?>

<div class="row">
    <div class="col-md-12">
        <div class="widget-header">
            <i class="icon-user"></i>
            <h3>Add Member</h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li  class="active">
                        <a href="#formcontrols" data-toggle="tab">New Member</a>
                    </li>
                    <li >
                        <a href="#jscontrols" data-toggle="tab">View Member</a></li>
                </ul>

                <br>

                <div class="tab-content ">
                    <div class="tab-pane active" id="formcontrols">
                        <?php
                        echo $this->Form->create('User', array(
                            'class' => 'form-horizontal'
                        ));
                        ?>

                        <fieldset>

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

                                        <p class="help-block">This is going to be the login id.</p>
                                    </div>
                                </div>

                            </div> 


                            <div class="form-group">
                                <div class="col-md-6">

                                    <label class="control-label" for="firstname">First Name</label>
                                    <div class="controls">
                                        <?php
                                        echo $this->Form->input('fname', array(
                                            'class' => 'form-control',
                                            'div' => false, 'label' => false));
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
                                    <label class="control-label">Rights</label>


                                    <div class="controls">
                                        <label class="checkbox inline">
                                            <input type="checkbox"> Option 01
                                        </label>

                                        <label class="checkbox inline">
                                            <input type="checkbox"> Option 02
                                        </label>
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
                        $this->Form->end();
                        ?>
                    </div>

                    <div class="tab-pane " id="jscontrols">
                        <table class="table table-bordered">
                            <tr>
                                
                                <th>Organization Name</th>
                                <th>User Name</th>
                                <th>status</th>
                            </tr>
                            <?php
                            foreach ($membersList as $memlist) {
                                ?>
                            <tr>
                                <td>
                                    <?php echo $memlist['OrganizationMember']['organization_id']?>
                                </td>
                                <td>
                                    <?php echo $memlist['OrganizationMember']['user_id']?>
                                </td>
                                <td>
                                    <?php echo $memlist['OrganizationMember']['status']?>
                                </td>
                            </tr>
                            <?
                            }

                            ?>

                        </table>
                    </div>

                </div>


            </div>

        </div>
    </div>
</div>