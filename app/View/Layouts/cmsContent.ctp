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
$cakeDescription = __d('cake_dev', '| Education Solution | CupCherry.com');
//$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=9">
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $this->fetch('title'); ?>
            <?php echo $cakeDescription ?>
        </title>
        <?php
        echo $this->Html->meta('icon');


        echo $this->fetch('meta');
        echo $this->Html->css(array(
            'bootstrap/bootstrap.min',
            'fa/font-awesome.min',
            'style',
            'front',
            'mediafile',
            'bootstrap-social'
        ));

        echo $this->Html->script(array(
            'jquery-1.11.2.min',
            'jquery-migrate-1.2.1.min',
            'jQueryv1.11.1',
            'bootstrap/bootstrap.min',
            'custom_jquery',
        ));
        ?>
    </head>
    <body>
        <?php //echo 'Current User Id : ' . Configure::read('currentUserInfo.id'); ?>
        <?php
        echo $this->element('header2');
        echo $this->element('menu');
        echo $this->element('flash_msg');
        ?>

        <?php //echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
        <?php echo $this->element('footer'); ?>
    </body>
</html>
