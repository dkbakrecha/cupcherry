<style>
    label {
        // display: inline-block;
        float: left;
        font-weight: 700;
        margin-bottom: 5px;
        //  max-width: 100%;
        width: 150px;
    }
    .form-control {
        width: 60%;
    }
    .for_input {
        float: left;
        margin-left: 30px;
    }
</style>

<div class="content-header">
    <h2 class="content-header-title"><i class="fa fa-question"></i> FAQ Edit<a href="<?php echo $this->Html->url(array('controller' => 'faqs', 'action' => 'list', 'admin' => true)); ?>" class="btn btn-primary pull-right">Back</a></h2>
    
</div>
<div class="row"> 
    <div class="col-md-9 col-md-offset-1 ">
        <?php echo $this->Form->create('FaqCategory'); ?>
        <div class="form-group hideblock">
            <label for="exampleInputEmail1">Category Name</label>
            <?php echo $this->Form->input('faq_category_title', array('label' => false, 'div' => false, 'class' => 'form-control for_input', 'placeholder' => 'Category Name', 'required')); ?>
<!--                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">-->
            <?php echo $this->Form->submit('Save', array('class' => 'btn btn-primary for_input', 'div' => false)) ?>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
    
    <div class="col-md-2">
        <button class="btn btn-default btntoggle">Add Category</button>
    </div>
</div>  
<hr><br>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h3> Update FAQ</h3><br>
        <?php echo $this->Form->create('Faq'); ?>
        <div class="form-group ">
            <label for="exampleInputEmail1">Category Name</label>

            <?php
            $cateArr = array();
            foreach ($cateAll as $cate) {
                $cateArr[$cate['FaqCategory']['id']] = $cate['FaqCategory']['faq_category_title'];
            }


            echo $this->Form->input('faq_category_id', array(
                'label' => false,
                'div' => false,
                'class' => 'form-control',
                'options' => $cateArr,
                'empty' => ' -- SELECT --',
                'required'
            ));
            ?>
        </div>
        <div class="form-group">
            <label for="">Category Title</label>
            <?php echo $this->Form->input('title', array('label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => 'Category Title')); ?>
            <?php echo $this->Form->hidden('id'); ?>
        </div>
        <div class="form-group">
            <label for="">Category Content</label>
            <?php echo $this->Form->input('content', array('label' => false, 'div' => false, 'class' => 'form-control', 'rows' => 5, 'placeholder' => 'Enter Something..')); ?>
        </div>
        <?php echo $this->Form->Submit('Save', array('class' => 'btn btn-success col-md-offset-2 ')); ?>
        
        <?php echo $this->Form->end(); ?>
    </div>

</div>

<script type="text/javascript">
    jQuery(document).ready(function() {
        $(".btntoggle").click(function() {
            $(".hideblock").toggle();
        });
    });
</script>