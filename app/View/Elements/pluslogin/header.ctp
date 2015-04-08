<div class="navbar navbar-fixed-top">

    <div class="navbar-inner">

        <div class="container">

            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <a class="brand" href="index.html">
                Cup Cherry Plus				
            </a>		

            <div class="nav-collapse">
                <ul class="nav pull-right">

                    <li class="">


                        <?php
                        $cont = $this->request->params['controller'];
                        $act = $this->request->params['action'];


                        if ($cont == 'users' && $act == 'plus_login') {
                            ?>
                            <a href="<?php
                            echo $this->Html->url(array('plus' => true,
                                'controller' => 'users',
                                'action' => 'registration'
                            ));
                            ?>" class="">
                                Registration?
                            </a>
                            <?php
                        } elseif ($cont == 'users' && $act == 'plus_registration') {
                            ?>
                            <a href="<?php
                            echo $this->Html->url(array('plus' => true,
                                'controller' => 'users',
                                'action' => 'login'
                            ));
                            ?>" class="">
                                Login..?
                            </a>
                            <?php
                        }
                        ?>



                    </li>

                </ul>

            </div><!--/.nav-collapse -->	

        </div> <!-- /container -->

    </div> <!-- /navbar-inner -->

</div> <!-- /navbar -->
