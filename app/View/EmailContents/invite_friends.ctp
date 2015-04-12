<div class="modal-dialog pinpopup">
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title pintext" id="myModalLabel"><?php echo __("Invite your friends"); ?></h4>
		</div>
		<div class="modal-body">
			<?php 
			echo $this->Form->create("InviteFriend", array(
				'id' => 'InviteFriendForm',
				'autocomplete' => 'off',
				'method' => 'POST',
			));
			echo $this->Form->hidden("pid", array("value" => $pin_id));
			?>
			<div class="pinpopupinput">
				<?php 
				echo $this->Form->input('mailids', array(
					"label" => false,
					"class" => "pinpopuptextbox",
					"placeholder" => __("Email"),
					"div" => array("class" => "input_warpper"),
				)); 
				?>
			</div>
			<div class="pinpopupinput">
				<?php
				echo $this->Form->input("message", array(
					"type" => 'textarea',
					"required" => true,
					"label" => false,
					"class" => "pinpopuptextbox",
					"placeholder" => __("Message"),
					"div" => array("class" => "input_warpper"),
				));
				?>
				<div style="font-size: 11px;color:#000;"><?php echo __("The link will be included with the invitation mail"); ?></div>
			</div>
			<div class="addproductpopup_buttondin">
				<button class="signinpopupregisterbutton invitebtn"><?php echo __('Invite'); ?></button>
			</div>			
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		$('#InviteFriendMailids').tagsinput({
			trimValue: true,
			confirmKeys: [13, 32]
		});
		$('#InviteFriendMailids').parent().find(".bootstrap-tagsinput").addClass("pinpopuptextbox");
		$('#InviteFriendMailids').parent().find(".bootstrap-tagsinput input").attr("style", "");
		$('#InviteFriendMailids').parent().find(".bootstrap-tagsinput input").css("width", "30%");
		$("#InviteFriendMailids").on('beforeItemAdd', function(event) {
            if(!IsEmail(event.item)) {
				event.cancel = true;
            }
        });		
	});
</script>