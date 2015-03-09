	<section class="content">
			<header class="main-header clearfix">
				<h1 class="main-header__title">
					<i class="fa fa-info"></i>
					Admin Profile
				</h1>
				<div class="main-header__date">
                                    <a href="<?php echo $this->Html->url(array('admin'=>true,'controller'=>'users','action'=>'index')); ?>" class="btn btn-light pull-right">Back</a>
				</div>
			</header>

		<div class="row">

			<div class="col-md-12">
				<article class="widget">

			<div id="box_bg" class="row-fluid" style="display:block;">
				<div id="content_admin" class="admin_content_block">
					<?php
					echo $this->Form->create("User", array(
						'autocomplete' => 'off',
						'class'=>'form-horizontal'
						)
					);
					?>

					<div class="control-group">
					<label class="control-label">First Name</label>
					<?php 
					echo $this->Form->input('username', array(
						'type' => 'text',
						'required' => true,
						'placeholder' => 'First Name',
						'label' => false,
                                                'class' => 'input-text'
						)
					);
					?>
					</div>
					
					
                    <div class="control-group">
						<label class="control-label">Password</label>
						<?php
						echo $this->Form->input('password', array(
							'type' => 'password',
							'label' => false,
							'value'=>'',
							'required'=>false,
                                                        'class' => 'input-text'
							)
						);
						?>
					</div>

					<div class="control-group">
						<label class="control-label">Confirm Password</label>
						<?php
						echo $this->Form->input('confirm_password', array(
							'type' => 'password',
							'label' => false,
							'required'=>false,
                                                        'class' => 'input-text'
							)
						);
						?>
					</div>
                    
					<div class="control-group">
					<label class="control-label"></label>
					<?php
					echo $this->Form->submit("Save", array(
						'label' => false,
						'class' => 'btn btn-skyblue',
						'div' => false
						)
					);
					?>
					<a href="<?php echo $this->Html->url(array('admin' => TRUE, 'controller' => 'users', 'action' => 'index')); ?>" class="btn">Back</a>
					</div>
					<?php
					echo $this->Form->end();
					?>
				</div>
			</div>


                                    </article>
			</div>
		</div>
	</section> <!-- /content -->
	

<script>
$(document).ready(function() {
	$("#UserDob").datepicker({format:"dd/mm/yyyy"});
});
</script>