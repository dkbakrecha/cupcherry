<!-- Start Site Header -->
  <header class="site-header sticky-header">
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6 col-xs-8">
            <h1 class="logo"> <a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'index')); ?>">CUPCHERRY</a> </h1>
          </div>
          <div class="col-md-8 col-sm-6 col-xs-4">
            <ul class="top-navigation hidden-sm hidden-xs">
              <li><a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'about')); ?>">About Us</a></li>
              <li><a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'contact_us')); ?>">How It Works</a></li>
              <li><a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'contact_us')); ?>">Contact Us</a></li>
            </ul>
            <a href="#" class="visible-sm visible-xs menu-toggle"><i class="fa fa-bars"></i></a> </div>
        </div>
      </div>
    </div>
      <?php echo $this->element("menu"); ?>
  </header>
  <!-- End Site Header --> 
  
  <?php echo $this->element('pageheader'); ?>