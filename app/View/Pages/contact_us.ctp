<div id="content" class="content full">
    <div class="container">
<div class="row">
<div class="column small-12">
    <div class="signup">
	<div class="signup_container">
            <h1 class="amber">Contact Us</h1>
             <?php echo $this->Form->create('ContactUs',array('id' => 'frm_contactus', 'name'=>'frm_contactus')); ?>

        <div class="col-lg-7">
        	<div class="contact_tab">
            	<div class="contact_name">Name</div>
				 <?php echo $this->Form->input('name',array('class' => 'contact_input','placeholder'=>__('Your Name'),'label' => false)); ?>
                   </div>
			 
            <div class="contact_tab">
            	<div class="contact_name">Email</div>
				<?php echo $this->Form->input('email',array('class' => 'contact_input','placeholder'=>__('Your Email'),'label' => false)); ?>
            </div>
            <div class="contact_tab">
            	<div class="contact_name">Message</div>
				 <?php echo $this->Form->input('message',array('class' => 'contact_area','placeholder'=>__('Message'),'type'=>'textarea','label' => false)); ?>
				                
            </div>
            <div class="contact_tab">
            	<div class="contact_name"></div>
				  <?php echo $this->Form->input(__('Submit'),array('class'=>'contact_send','type'=>'button','value'=>'Send','label' => false));?>
				
            </div>
        </div>
		 <?php echo $this->Form->end();?>
            <div class="col-lg-5">
        <div class="contact_desc">
            <div class="contact_descHead">Address:</div>
            <div class="contact_descText"><?php echo Configure::read('Site.address') ?></div>
        </div>
        <div class="contact_desc">
            <div class="contact_descHead">Email Address:</div>
            <div class="contact_descText"><?php echo Configure::read('Site.email') ?></div>
        </div>
        <div class="contact_desc">
            <div class="contact_descHead">Contact Number:</div>
            <div class="contact_descText"><?php echo Configure::read('Site.contact_number')?></div>
        </div>
                </div>
        </form>
    </div>
</div>
    
    </div>
</div>
</div>
        <!-- END : PAGE CONTENT -->
    </div><!-- / .main -->   