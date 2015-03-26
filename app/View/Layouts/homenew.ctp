<?php
$cakeDescription = __d('cake_dev', '| Education Solution | CupCherry');
?>
<!DOCTYPE html>
<html>
    <head>
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
        <?php echo $this->element('header2'); ?>
        <?php echo $this->element('menu'); ?>
        <?php echo $this->element('slider'); ?>
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
        <?php echo $this->element('footer'); ?>
        <?php //echo $this->element('sql_dump');    ?>
    </body>
</html>
