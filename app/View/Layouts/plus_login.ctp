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
            'bootstrap/bootstrap.min',
            'fa/font-awesome.min',
            'plus_login',
        ));
        echo $this->Html->script(array(
            'jQueryv1.11.1',
            'bootstrap/bootstrap.min',
           // 'plus_login'
        ));
        ?>
    </head>
    <body>
        <div class="container">
            
            <?php  //echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
           
        </div>

    </body>
</html>
