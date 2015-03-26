<?php
$cakeDescription = __d('cake_dev', 'CUPCHERRY : Best education solution - ');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
	
		echo $this->fetch('meta');
		echo $this->Html->css(array(
                    'bootstrap/bootstrap.min',
                    'fa/font-awesome.min',
                    'style',
                    'newstyle',
                    'otherHome',
                    //'color3',
                ));
                
                echo $this->Html->script(array(
                    //'jquery',
                    'jquery-1.11.2.min',
                    'jquery-migrate-1.2.1.min',
                    'jQueryv1.11.1',
                    'bootstrap/bootstrap.min',
                    'wow/wow',
                    'script',
                ));
	?>
    
    <script>
        $(document).ready(function () {
            if ($('html').hasClass('desktop')) {
                new WOW().init();
            }
        });
    </script>
</head>
<body>
    <div class="page">
        <?php echo $this->element('header'); ?>
	<?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
        <?php echo $this->element('footer'); ?>
    </div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
