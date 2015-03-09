<script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-45989557-1', 'auto');
    ga('send', 'pageview');

</script>

<div class="tail-top">
    <div class="container">
        <div class="row">
            <div data-motopress-static-file="static/static-social-networks.php" data-motopress-type="static" class="col-lg-6 social-nets-wrapper">

                <ul class="social">
                    <li><span>FOLLOW US </span></li>
                    <li><a title="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a title="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a title="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <!--
                    <li><a title="pinterest" href="#"><i class=""></i></a></li>
                    <li><a title="linkedin" href="#"><i class=""></i></a></li>
                    -->
                </ul> 
            </div>
            <div data-motopress-static-file="static/static-top-links.php" data-motopress-type="static" class="col-lg-6">
                <div class="top-links">
                    <ul>
                        <li><a href="">Member Area</a></li>
                        <li><a href="">Sitemap</a></li>
                    </ul>
                </div> 
            </div>
        </div>
    </div>
</div>

<header class="header" id="header">
    
        <div class="container ">


            <div class="tail-bottom" style="position: relative; top: 0px;">
                <div class="row">
                    <div data-motopress-static-file="static/static-logo.php" data-motopress-type="static" class="col-lg-3">

                        <div class="logo pull-left">
                            <h1>
                                <a class="logo_h logo_h__img" href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'index')); ?>"><span class="fa fa-globe"></span> CupCherry</a>
                            </h1>
                        </div>
                    </div>
                    <div data-motopress-static-file="static/static-nav.php" data-motopress-type="static" class="col-lg-6">

                        <nav class="header-menu">
                            <!--<ul class="sf-menu sf-js-enabled sf-arrows">-->
                            <ul class="sf-menu sf-arrows">
                                <li class="current">
                                    <a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'howitworks')); ?>">How It Works</a>
                                </li>

                                <li>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'about')); ?>">About</a>
                                </li>
                                <li >
                                    <a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'contact_us')); ?>">Contact</a>
                                </li>
                                <?php
                                $currentUser = $this->Session->read('Auth.User');
                                if (empty($currentUser)) {
                                    ?>
                                    <li class="last">
                                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login')); ?>">login</a>
                                    </li>
    <?php
} else {
    ?>    
                                    <li class="last">
                                        <a href="#" class="sf-with-ul">USER MENU</a>
                                        <ul class="sub-menu" style="display: none;">
                                            <li>
                                                <a href="<?php echo $this->Html->url(array('controller' => 'groups', 'action' => 'index')); ?>">Groups</a>
                                            </li>
                                            <!--<li class="">
                                                <a href="#" class="sf-with-ul">Nulla vel diam</a>
                                                <ul class="sub-menu" style="display: none;">
                                                    <li>
                                                        <a href="#">Fermentum nisl</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Mauris accumsan</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Nulla vel diam</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Sed in lacus ut</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Enim adipiscing</a>
                                                    </li>
                                                </ul>
                                            </li>-->
                                            <li>
                                                <a href="<?php echo $this->Html->url(array('controller' => 'keynotes', 'action' => 'index')); ?>">Questions</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit_profile')); ?>">Profile</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')); ?>">Logout</a>
                                            </li>
                                        </ul>
                                    </li>
<?php } ?>
                            </ul>
                            <!--<select class="select-menu sf-menu sf-js-enabled sf-arrows" style="display: inline-block;"><option value="#">Navigate to...</option><option value="http://livedemo00.template-help.com/wt_52879/index.html" selected="selected">&nbsp;Home</option><option value="http://livedemo00.template-help.com/wt_52879/index-1.html">&nbsp;About</option><option value="http://livedemo00.template-help.com/wt_52879/index.html#">&ndash;&nbsp;Mauris accumsan</option><option value="http://livedemo00.template-help.com/wt_52879/index.html#">&ndash;&nbsp;Nulla vel diam</option><option value="http://livedemo00.template-help.com/wt_52879/index.html#">&ndash;&ndash;&nbsp;Fermentum nisl</option><option value="http://livedemo00.template-help.com/wt_52879/index.html#">&ndash;&ndash;&nbsp;Mauris accumsan</option><option value="http://livedemo00.template-help.com/wt_52879/index.html#">&ndash;&ndash;&nbsp;Nulla vel diam</option><option value="http://livedemo00.template-help.com/wt_52879/index.html#">&ndash;&ndash;&nbsp;Sed in lacus ut</option><option value="http://livedemo00.template-help.com/wt_52879/index.html#">&ndash;&ndash;&nbsp;Enim adipiscing</option><option value="http://livedemo00.template-help.com/wt_52879/index.html#">&ndash;&nbsp;Sed in lacus ut</option><option value="http://livedemo00.template-help.com/wt_52879/index.html#">&ndash;&nbsp;Enim adipiscing</option><option value="http://livedemo00.template-help.com/wt_52879/index.html#">&ndash;&nbsp;Fermentum nisl</option><option value="http://livedemo00.template-help.com/wt_52879/index-2.html">&nbsp;Blog</option><option value="http://livedemo00.template-help.com/wt_52879/index-3.html">&nbsp;Products</option><option value="http://livedemo00.template-help.com/wt_52879/index-4.html">&nbsp;Contacts</option></select>-->
                        </nav>
                    </div>
                    <div data-motopress-static-file="static/static-search.php" data-motopress-type="static" class="col-lg-3 hidden-phone">

                        <div class="search-form search-form__h hidden-phone clearfix">
                            <form accept-charset="utf-8" action="" method="get" class="navbar-form pull-right" id="search-header">
                                <input type="text" class="search-form_it" name="s">
                                <button class="search-form_is" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</header>