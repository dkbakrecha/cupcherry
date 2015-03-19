
<?php
if (!isset($currentUserInfo) && empty($currentUserInfo)) {
    ?>
<style>
    .center-background{
        background-color: white;
    }    
    
</style>
    <div class="section">
        <div class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2 loginPage ">
                  
                        <div class="col-md-12 text-center">
                            <span class="login-page-heading">
                                Login to Cup Cherry!
                            </span>
                        <hr>
                        </div>
                        
                        <div class="col-md-12 ">
                            <div class="col-md-6">
                                <div class="">
                                    <h4>Connect with us</h4>
                                    <a class="btn btn-block btn-social btn-lg btn-facebook">
                                        <i class="fa fa-facebook"></i>
                                        Login with Facebook
                                    </a>
                                    <a class="btn btn-block btn-social btn-lg btn-google-plus">
                                        <i class="fa fa-google-plus"></i>
                                        Login with Google
                                    </a>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <h4 class="amber">Login</h4>

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
                                            'class' => 'form-control input-lg',
                                            'placeholder' => 'Username'));
                                        ?>
                                    </div>
                                    <div class="form-group ">
                                      
                                        <?php
                                        echo $this->Form->input('password', array(
                                            'label' => false,
                                            'div' => false,
                                            'class' => 'form-control input-lg',
                                            'placeholder' => 'Password'));
                                        ?>
                                    </div>
                                    <div class="form-group for_btnAndFP">
                                        <div class="col-md-4 LRpadding">
                                            <?php
                                            echo $this->Form->submit('Login', array(
                                                'label' => false,
                                                'div' => false,
                                                'class' => 'btn btn-primary btn-block',
                                                    //  'formnovalidate'=>true
                                            ));
                                            ?>
                                        </div>
                                        <div class="col-md-8">
                                            <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'account_recovery')); ?>" class="">Forget Password</a>
                                        </div>

                                    </div>




                                    <?php
                                    echo $this->Form->end();
                                    ?>

                                </div>


                            </div>
                        </div>
                         <div class="col-md-12 text-center">
                             <hr>
                            <span class="">
                                Dont have an account? <a href="<?php echo $this->Html->url(array(
                                    'controller'=>'users',
                                    'action' =>'registration'
                                ));?>">Signup</a>
                            </span>
                        
                        </div>
                  



                </div>

            </div>




        </div>
    </div>
    <?php
}
?>


