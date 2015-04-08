<footer class="motopress-wrapper footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--                <div>
                                    <div class="contacts">
                                        <span class="title">Feel free to contact us:</span>
                                        <span class="phone">+1 959 603 6035</span>
                                        <span class="phone">+1 959 603 6035</span>
                                        <span class="email"><a href="mailto:contact@cupcherry.com">contact@cupcherry.com</a></span>
                                    </div>
                                </div>-->
                <div class="copyright">
                    <div class="row">
                        <div data-motopress-static-file="static/static-footer-nav.php" data-motopress-type="static" class="col-lg-8">
                            
                            <?php 
                            $cuer = $this->Session->read('Auth.User');
                            if(isset($cuer['id']) && !empty( $cuer['id'] )){ 
                            ?>
                            
                            <nav class="nav footer-nav">
                                <ul class="menu" id="menu-footer-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item">
                                        <a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'index')); ?>">Home</a></li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'about')); ?>">About Us</a></li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'howitworks')); ?>">How It Works</a></li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo $this->Html->url(array('controller' => 'faqs', 'action' => 'index')); ?>">FAQ's</a></li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'terms')); ?>">Terms of Use</a></li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'contact_us')); ?>">Contact Us</a></li>
                                </ul> 
                            </nav>
                            
                            <?php } else { ?>
                            <nav class="nav footer-nav">
                                <ul class="menu" id="menu-footer-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href=""> &lt; CODE &gt; WITH <i class="fa fa-heart-o"></i> BY CupCherry TEAM </a></li>
                                </ul> 
                            </nav>
                            <?php } ?>
                            
                        </div>
                        <div data-motopress-static-file="static/static-footer-text.php" data-motopress-type="static" class="col-lg-4">
                            <div class="footer-text" id="footer-text">
                                <a class="site-name" title="" href="">Cup Cherry</a> &copy; 2015 <a title="Privacy Policy" href="">All Rights Reserved</a>

                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</footer>

<?php
        echo $this->Js->writeBuffer(array('cache' => false));
        ?>