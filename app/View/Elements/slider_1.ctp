


<div class="section center_content for_login_back">
    <div class="container">
        <div class="front_page_image">
        <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">

            </div>

        </div>


        <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
                <div class=" ">
                    <h3 class="amber">USER LOGIN</h3>

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
                        <?php
                        echo $this->Form->submit('Login', array(
                            'label' => false,
                            'div' => false,
                            'class' => 'btn btn-primary',
                                //  'formnovalidate'=>true
                        ));
                        ?>
                    </div>


                    <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'account_recovery')); ?>" class="">Forget Password</a>

                    <?php
                    echo $this->Form->end();
                    ?>

                </div>


            </div>

        </div>

    </div>

</div>
</div>
