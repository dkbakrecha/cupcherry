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
$cakeDescription = __d('cake_dev', 'Cup Cherry - ');
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
            // 'fa/font-awesome.min',
            'plus/plus-bootstrap.min',
            'plus/font-awesome',
            'plus/style',
            'plus/pages/signin',
            'plus/bootstrap-responsive.min',
                //   'bootstrap/bootstrap.min',
        ));
        echo $this->Html->script(array(
            //  'jQueryv1.11.1',
            //s  'bootstrap/bootstrap.min',
            'plus/jquery-1.7.2.min',
            'plus/bootstrap',
            'plus/signin',
        ));
        ?>
    </head>
    <body>

        <?php echo $this->Element('pluslogin/header'); ?>
        <div class="container">
            <?php echo $this->Element('flash_msg') ?>
            <?php echo $this->fetch('content'); ?>
        </div>

        <?php echo $this->Element('pluslogin/footer'); ?>


    </body>
</html>
