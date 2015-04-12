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
//$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
//$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
    <head>
        <!--<![endif]-->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php //echo $cakeDescription  ?>
            <?php echo $this->fetch('title'); ?>
        </title>
        <?php
        echo $this->Html->meta('icon');

        //echo $this->Html->css('cake.generic');

        echo $this->fetch('meta');
        echo $this->Html->css(array(
            'bootstrap/bootstrap.min',
            '/js/jquery-ui/jquery-ui',
            'fa/font-awesome.min',
            //'admin/Admin_front',
            //'bootstrap/wysihtml5/bootstrap-wysihtml5',
            //'admin/css',
            //'admin/css_002',
            //'admin/jquery-ui-1',
            //'admin/morris',
            //'admin/blue',
            '/js/summernote/dist/summernote',
            '/js/tagsinput/bootstrap-tagsinput',
            'admin/select2',
            'admin/fullcalendar',
            //'/js/DataTables/media/js/jquery.dataTables.min',
            'admin/target-admin',
            'admin/custom',
        ));
        
        echo $this->Html->script(array(
            'jQueryv1.11.1',
            'jquery-ui/jquery-ui',
            'bootstrap/bootstrap.min',
            //'admin/jquery-1',
            //'admin/jquery_002',
            //'admin/jquery-ui-1',
            //'admin/jquery_003',
            //'bootstrap/wysihtml5/lib/wysihtml5-0.3.0',
            //'bootstrap/wysihtml5/bootstrap-wysihtml5',
            //'admin/select2',
            //'admin/raphael-2',
            //'admin/morris',
            //'admin/jquery',           
            'admin/fullcalendar',
            //'admin/target-admin',
            'DataTables/media/js/jquery.dataTables.min',
            'summernote/dist/summernote',
            'tagsinput/bootstrap-tagsinput',
            //'admin/dashboard',
            //'admin/calendar',
            //'admin/area',
            //'admin/donut',
            
        ));
        ?>
    </head>
    <body>

        <?php echo $this->element('admin/header'); ?>
        <?php echo $this->element('admin/topmenu'); ?>

        <div class="container">

            <div class="content">

                <div class="content-container">
                    <?php echo $this->Element('flash_msg'); ?>
                    <?php echo $this->fetch('content'); ?>
                </div> <!-- /.content-container -->

            </div> <!-- /.content -->
        </div>


        <?php echo $this->element('admin/footer'); ?>

        <?php //echo $this->element('sql_dump');    ?>
    </body>
</html>