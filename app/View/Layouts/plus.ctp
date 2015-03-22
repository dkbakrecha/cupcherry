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
$cakeDescription = __d('cake_dev', 'Cup Cherry : ');
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
        <!--        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
                      rel="stylesheet">-->
        <?php
        echo $this->Html->meta('icon');


        echo $this->fetch('meta');
        echo $this->Html->css(array(
            'bootstrap/bootstrap.min',
            'fa/font-awesome.min',
            'plus/plus-bootstrap.min',
            'plus/bootstrap-responsive.min',
            'plus/style',
            'plus/pages/dashboard',
            'plus/font-awesome'
        ));
        echo $this->Html->script(array(
            'jQueryv1.11.1',
            // 'bootstrap/bootstrap.min',
            'plus/jquery-1.7.2.min',
            'plus/excanvas.min',
            'plus/chart.min',
            'plus/bootstrap',
            'plus/full-calendar/fullcalendar.min',
            'plus/base',
        ));
        ?>
    </head>
    <body>
        <?php echo $this->element('plus/header'); ?>

        <div class="main">
            <div class="main-inner">
                <div class="container">
                    <?php echo $this->Element('plus/imp_shortcuts');?>
                    <?php echo $this->Session->flash(); ?>

                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
        </div>

        <?php echo $this->element('plus/footer'); ?>
        <?php //echo $this->element('sql_dump'); ?>
    </body>
</html>
