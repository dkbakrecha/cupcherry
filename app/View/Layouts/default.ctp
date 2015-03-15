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
        <meta http-equiv="X-UA-Compatible" content="IE=9">
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
            'front',
            'mediafile',
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
        <div class="page">
            <?php echo 'Current User Id : ' . Configure::read('currentUserInfo.id');?>
            <?php echo $this->element('header2'); ?>
            <?php echo $this->element('menu'); ?>
             <?php // echo $this->Session->flash(); ?>
            <?php
            if (!isset($currentUserInfo) && empty($currentUserInfo)) {
                // prd($this->request);
                if ($this->request->params['controller'] == 'users' && $this->request->params['action'] == 'login') {
                    echo $this->element('slider');
                } elseif ($this->request->params['controller'] == 'pages' && $this->request->params['action'] == 'index') {
                    echo $this->element('slider');
                }
            }
            ?>


            <div class="container-fluid LRpadding center-background">
                <?php
                $userId = Configure::read('currentUserInfo.id');
                if (isset($userId) && !empty($userId)) {
                    ?>
                    <div class="container min-height ">
                        <?php echo $this->Session->flash(); ?>
                        <div class="row marginTB20px">
                            <div class="col-md-3  left_member LRpadding">
                                <?php echo $this->element('left_panel'); ?>
                            </div>
                            <div class="col-md-9 ">
                                <div class="col-md-12 right_member">
                                    <?php echo $this->fetch('content'); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="container">
                        <?php echo $this->Session->flash(); ?>
                        <div class="row">

                            <div class="col-md-12 ">

                                <?php echo $this->fetch('content'); ?>

                            </div>

                        </div>
                    </div>
                    <?php
                }
                ?>

                <?php echo $this->element('footer'); ?>
            </div>

            <?php //echo $this->element('sql_dump');     ?>
        </div>
        <?php
         echo $this->Js->writeBuffer(array('cache' => false));
        ?>
    </body>
</html>
