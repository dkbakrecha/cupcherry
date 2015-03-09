<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CUPCHERRY : Best education solution - ');
//$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
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
