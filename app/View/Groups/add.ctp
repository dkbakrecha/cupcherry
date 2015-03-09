<div class="main">
    <!-- START : PAGE CONTENT -->


    <div class="section ">
        <div class="row">
            <div class="col-md-12">
               
                    <div class="signup_container">
                        <h1 class="amber">Add Group</h1>
                        <?php echo $this->Form->create('Group', array('id' => 'frm_contactus', 'name' => 'frm_contactus', 'type' => 'file')); ?>

                        <div class="col-lg-7">
                            <div class="form-group">
                                
                                <?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Group Title','required'=>'required', 'label' => false)); ?>
                            </div>

                            <div class="form-group">
                                
                                <?php echo $this->Form->input('description', array('class' => 'form-control', 'placeholder' => 'Group Description', 'type' => 'textarea', 'label' => false)); ?>
                            </div>
                            <div class="form-group">
                                
                                <?php echo $this->Form->input('image', array('class' => 'form-control', 'type' => 'file', 'label' => false,'div'=>false)); ?>
                            </div>
                            <div class="form-group">
                                
                                <?php echo $this->Form->submit('Create', array('class' => 'btn btn-primary ' )); ?>

                            </div>
                        </div>
                        <?php echo $this->Form->end(); ?>

                        </form>
                  
                </div>
            </div>
        </div>
    </div>
    <!-- END : PAGE CONTENT -->
</div><!-- / .main -->   