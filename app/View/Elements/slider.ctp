<style>
    /* CUSTOMIZE THE CAROUSEL
    -------------------------------------------------- */

    /* Carousel base class */
    .carousel {
        margin: 80px 0px;
    }
    /* Since positioning the image, we need to help out the caption */
    .carousel-caption {
        z-index: 10;
    }

    /* Declare heights because of positioning of img element */
    .for_login_back
    {
        background: url('<?php echo $this->webroot; ?>img/header-img.jpg');
    }


    .front_login{
        background: none repeat scroll 0 0 rgba(85,90,120,0.8);
        padding: 17px 30px 30px;
        border-radius: 2px;
    }
</style>

<?php
if (!isset($currentUserInfo) && empty($currentUserInfo)) {
    ?>
    <div class="section center_content for_login_back">
        <div class="container">
            <div class="front_page_image">
                <div class="row">
                    <div class="col-md-7">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <!--
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                            -->
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <h1>
                                        Helping you to achieve your aims & dreams in future
                                    </h1>
                                </div>

                                <div class="item">
                                    <h1>Get anytime education and whole control</h1>
                                </div>

                                <div class="item">
                                    <h1>
                                        Offering expert tutors in a range of academical subjects

                                    </h1>
                                </div>
                            </div>

                            <!-- Left and right controls -->
                            <!--
                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a> 
                            -->
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="front_login">
                            <h3 class="amber">Login</h3>
                            <?php
                            echo $this->Form->create('User', array('url' => array(
                                    'controller' => 'users', 'action' => 'login'
                            )));
                            ?>

                            <div class="form-group">
                                <?php
                                echo $this->Form->input('email', array(
                                    'label' => false,
                                    'div' => false,
                                    'class' => 'form-control',
                                    'placeholder' => 'Username'));
                                ?>
                            </div>

                            <div class="form-group">
                                <?php
                                echo $this->Form->input('password', array(
                                    'label' => false,
                                    'div' => false,
                                    'class' => 'form-control',
                                    'placeholder' => 'Password'));
                                ?>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <?php
                                        echo $this->Form->submit('Login', array(
                                            'label' => false,
                                            'div' => false,
                                            'class' => 'btn btn-primary ',
                                        ));
                                        ?>
                                    </div>
                                    <div class="col-md-8">
                                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'account_recovery')); ?>" class="">Forget Password</a>
                                    </div>
                                </div>
                            </div>

                            <?php
                            echo $this->Form->end();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>