        <div class="content-header">
            <h2 class="content-header-title"><i class="fa fa-user fa-lg"></i> &nbsp; CMS Edit </h2>
        </div> <!-- /.content-header -->

        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <h3>Edit User Details</h3>
                <br>
                <?php
                echo $this->Form->create('CmsPage', array('role' => 'form'));
                echo $this->Form->hidden('id');
                ?>
                <div class="form-group">
                    <div class="row">
                        <dvi class='col-md-12'>
                                                <label for="exampleInputEmail1">Title</label>
                            <?php echo $this->Form->input('title', array('div' => false, 'label' => false, 'class' => 'form-control ', 'placeholder' => 'First Name')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <dvi class='col-md-12'>
                                                <label for="exampleInputEmail1">Description</label>
                            <?php echo $this->Form->input('description', array('div' => false, 'label' => false, 'class' => 'form-control html5wysi', 'placeholder' => 'Last Name')); ?>
                    </div>
                </div>
                
                <?php
                echo $this->Form->Submit('Save', array('class' => 'btn btn-success'));
                echo $this->Form->end();
                ?>
            </div>
        </div>
        
        
        <script>
	$('.html5wysi').wysihtml5();
</script>