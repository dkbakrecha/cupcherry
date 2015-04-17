<?php 
$content = explode("\n", $mailContents);
?>
    
<div style="border: 1px solid #eeeeee;display: table;margin: 10px auto;width: 602px;">
	<div style="float: left; width: 100%; background: #1D3F6B; height: 60px; min-height: 60px; max-height: 60px;">
		<a target="_new" href="<?php echo Router::url('/', true)?>" style="text-decoration: none;">
			<img src="<?php echo Router::url('/', true)?>img/logo.png" alt="CupCherry | Learning Solution" style="border: none;"/>
		</a>
	</div>
	<div style="float: left; width: 600px;">
		<div style="float: left; width: 100%;">&nbsp;</div>
		<div style="display: table; width: 540px; margin: 0 auto;word-break: break-all;line-height: 25px; min-height: 100px;">
			<?php 
			//echo stripslashes($mailContents); 
			foreach ($content as $line):
				echo '<p> ' . $line . "</p>\n";
			endforeach;
			?>
		</div>
		<div style="float: left; width: 100%;">&nbsp;</div>
	</div>
	<div style="float: left; width: 100%; background: #000000;height: 42px;min-height: 42px;max-height: 42px;">
		<div style="text-align: center; float: left; margin-top: 12px; width: 100%;color: #FFF">
			<div style="text-align: center; margin: 0 auto;">&copy; <?php echo date('Y').__(" CupCherry Team");?></div>
		</div>	
	</div>
</div>