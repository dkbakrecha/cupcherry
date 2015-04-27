<style>
    .ver-div {
       
    }

</style>

<header class="page-header primary">
    <div class="container">
        <h1>Contact Us</h1>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="contact-info clearfix">
               
                    <div class="col-lg-12">
                        <div class="contact_desc">
                            <div class="contact_descHead">Office Location:</div>
                            <div class="contact_descText"><?php echo Configure::read('Site.address') ?></div>
                        </div>
                        <div class="contact_desc">
                            <div class="contact_descHead">Email Address:</div>
                            <div class="contact_descText"><?php echo Configure::read('Site.email') ?></div>
                        </div>
                        <div class="contact_desc">
                            <div class="contact_descHead">Contact Number:</div>
                            <div class="contact_descText"><?php echo Configure::read('Site.contact_number') ?></div>
                        </div>
                    </div>
               
            </div>
        </div>
        <div class="col-md-6">
            <div class="column small-12">
                <?php echo $this->Form->create('contact'); ?>
                <div class="col-lg-10">
                    <h2>Want to send us mail?</h2>
                    <!--                    <div class="muted">
                                            <em>(Note: All fields are required)</em>
                                        </div>-->

                    <div class="form-group">

                        <?php
                        echo $this->Form->input('name', array(
                            'class' => 'form-control',
                            'placeholder' => 'Whats your mom calls you.?',
                            'label' => false,
                            'div' => false));
                        ?>
                    </div>

                    <div class="form-group">

                        <?php
                        echo $this->Form->input('email', array(
                            'class' => 'form-control',
                            'placeholder' => 'On which email id we contact you back',
                            'label' => false,
                            'div' => false));
                        ?>
                    </div>

                    <div class="form-group">

                        <?php
                        echo $this->Form->input('subject', array(
                            'class' => 'form-control', 'placeholder' => 'Subject',
                            'label' => false,
                            'div' => false));
                        ?>
                    </div>


                    <div class="form-group">

                        <?php
                        echo $this->Form->input('message', array(
                            'class' => 'form-control', 'placeholder' => 'Whats going in your mind.?',
                            'type' => 'textarea',
                            'label' => false,
                            'div' => false));
                        ?>

                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-primary', 'div' => 'false', 'label' => false)); ?>

                    </div>
                </div>
                <?php echo $this->Form->end(); ?>




            </div>



        </div>
    </div>

</div>




