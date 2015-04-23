<?php
//prd($membersList);
?>

<div class="row">
    <div class="col-md-12">
        <div class="widget-header">
            <i class="icon-group"></i>
            <h3>Members</h3>

            <a href="
            <?php echo $this->Html->url(array('plus' => true, 'controller' => 'users', 'action' => 'listmembers')); ?>
               " class="btn btn-primary pull-right">List Members</a>
        </div> <!-- /widget-header -->
        <div class="widget-content">

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
            echo $this->Form->end();
            ?>


        </div>
    </div>
</div>