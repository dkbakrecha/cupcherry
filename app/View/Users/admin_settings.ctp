<?php
//prd($allSettings);
echo $this->Html->css(array(
    'admin/bootstrap-fileupload'));
echo $this->Html->script(array(
    'admin/bootstrap-fileupload'));
?>
<style>
    .btmmargin{
        margin-bottom: 15px !important;
    }
</style>
<div class="content-header">
    <h2 class="content-header-title">Account Settings</h2>
    <!--        <ol class="breadcrumb">
              <li><a href="http://preview.jumpstartthemes.com/target-admin/index.html">Home</a></li>
              <li><a href="javascript:;">Sample Pages</a></li>
              <li class="active">Account Settings</li>
            </ol>-->
</div> <!-- /.content-header -->


<div class="row">

    <div class="col-md-3 col-sm-4">

        <ul id="myTab" class="nav nav-pills nav-stacked">
            <li class="active">
                <a href="#profile-tab" data-toggle="tab">
                    <i class="fa fa-user"></i> 
                    &nbsp;&nbsp;Profile Settings
                </a>
            </li>
            <li>
                <a href="#password-tab" data-toggle="tab">
                    <i class="fa fa-lock"></i> 
                    &nbsp;&nbsp;Change Password
                </a>
            </li>
            <li>
                <a href="#messaging" data-toggle="tab">
                    <i class="fa fa-envelope"></i> 
                    &nbsp;&nbsp;Message Settings
                </a>
            </li>
            <li>
                <a href="#payments" data-toggle="tab">
                    <i class="fa fa-dollar"></i> 
                    &nbsp;&nbsp;Payment Settings
                </a>
            </li>
            <li>
                <a href="#reports" data-toggle="tab">
                    <i class="fa fa-signal"></i> 
                    &nbsp;&nbsp;Configure Reports
                </a>
            </li>
        </ul>

        <br>

    </div> <!-- /.col -->

    <div class="col-md-9 col-sm-8">

        <div class="tab-content stacked-content">

            <div class="tab-pane fade in active" id="profile-tab">

                <h3 class="">Edit Profile Settings</h3>

                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing 
                    elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque
                    penatibus et magnis dis parturient montes. Lorem ipsum dolor sit amet, 
                    consectetuer adipiscing elit.</p>

                <hr>

                <br>
                
                
                <div class="row">
                    <?php echo $this->Form->create('Sitesitting',array('class'=>'form-horizontal')); ?>

                                    <div class="form-group ">
                                        <label class="col-md-3">Avatar</label>
                                        <div class="col-md-7">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 180px; height: 180px;">
                                                    <img alt="Profile Avatar" src="./img/avatars/avatar-large-1.jpg">
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 200px; line-height: 20px;"></div>
                                                <div>
                                                    <span class="btn btn-default btn-file">
                                                        <span class="fileupload-new">Select image</span>
                                                        <span class="fileupload-exists">Change</span>
                                                        <input type="file">
                                                    </span>
                                                    <a class="btn btn-default fileupload-exists" data-dismiss="fileupload" href="#">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                   




                    <?php  $i = 0;
                    foreach ($allSettings as $settings) {
                     
                        ?>
                        <div class="form-group ">
                            <label class="col-md-3"><?php echo $settings['Sitesetting']['title'] ?>
                                <?php echo $this->Form->input("Sitesetting.$i.id",array('value'=>$settings['Sitesetting']['id'],'type'=>'hidden'));; ?>
                            </label>


                            <div class="col-md-7">
                                <?php echo $this->Form->input("Sitesetting.$i.value",
                                        array('class' => 'form-control', 
                                              'label' => false, 
                                            'type' => 'text',
                                            'value' => $settings['Sitesetting']['value'])); 
                                ?>
                                <!--<input name="user-name" value="jumpstartui" class="form-control" disabled="disabled" type="text">-->

                            </div> 
                        </div> 
                        <!-- /.col -->
                        <?php
                            $i++ ;
                     
                    }
                    ?>

                    <div class="form-group">
                        <div class="col-md-7 col-md-push-3">
                            <?php echo $this->Form->Submit('Update', array('class' => 'btn btn-sccuess', 'div' => false)); ?>

                        </div>
                    </div>




                    <?php echo $this->Form->end(); ?>
                </div>
            </div> <!-- /.tab-pane --> 

            <div class="tab-pane fade" id="password-tab">

                <h3 class="">Change Your Password</h3>

                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing 
                    elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque
                    penatibus et magnis dis parturient montes.</p>

                <br>

                <form action="./page-settings.html" class="form-horizontal">

                    <div class="form-group">

                        <label class="col-md-3">Old Password</label>

                        <div class="col-md-7">
                            <input name="old-password" class="form-control" type="password">
                        </div> <!-- /.col -->

                    </div> <!-- /.form-group -->

                    <hr>

                    <div class="form-group">

                        <label class="col-md-3">New Password</label>

                        <div class="col-md-7">
                            <input name="new-password-1" class="form-control" type="password">
                        </div> <!-- /.col -->

                    </div> <!-- /.form-group -->

                    <div class="form-group">

                        <label class="col-md-3">New Password Confirm</label>

                        <div class="col-md-7">
                            <input name="new-password-2" class="form-control" type="password">
                        </div> <!-- /.col -->

                    </div> <!-- /.form-group -->

                    <br>

                    <div class="form-group">

                        <div class="col-md-7 col-md-push-3">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            &nbsp;
                            <button type="reset" class="btn btn-default">Cancel</button>
                        </div> <!-- /.col -->

                    </div> <!-- /.form-group -->

                </form>
            </div> <!-- /.tab-pane -->


            <div class="tab-pane fade" id="messaging">
                <h3>Message Settings</h3>
                <p>Etsy mixtape wayfarers, ethical wes anderson tofu 
                    before they sold out mcsweeney's organic lomo retro fanny pack lo-fi 
                    farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft
                    beer, iphone skateboard locavore carles etsy salvia banksy hoodie 
                    helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit 
                    cred pitchfork. Williamsburg banh mi whatever gluten-free, carles 
                    pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred 
                    you probably haven't heard of them, vinyl craft beer blog stumptown. 
                    Pitchfork sustainable tofu synth chambray yr.</p>

                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing
                    elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis 
                    natoque penatibus et magnis dis parturient montes, nascetur ridiculus 
                    mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, 
                    sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, 
                    aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet 
                    a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
            </div> <!-- /.tab-pane -->

            <div class="tab-pane fade" id="payments">
                <h3>Payments Settings</h3>
                <p>Etsy mixtape wayfarers, ethical wes anderson tofu 
                    before they sold out mcsweeney's organic lomo retro fanny pack lo-fi 
                    farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft
                    beer, iphone skateboard locavore carles etsy salvia banksy hoodie 
                    helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit 
                    cred pitchfork. Williamsburg banh mi whatever gluten-free, carles 
                    pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred 
                    you probably haven't heard of them, vinyl craft beer blog stumptown. 
                    Pitchfork sustainable tofu synth chambray yr.</p>

                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing
                    elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis 
                    natoque penatibus et magnis dis parturient montes, nascetur ridiculus 
                    mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, 
                    sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, 
                    aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet 
                    a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
            </div> <!-- /.tab-pane -->

            <div class="tab-pane fade" id="reports">
                <h3>Reports Settings</h3>
                <p>Etsy mixtape wayfarers, ethical wes anderson tofu 
                    before they sold out mcsweeney's organic lomo retro fanny pack lo-fi 
                    farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft
                    beer, iphone skateboard locavore carles etsy salvia banksy hoodie 
                    helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit 
                    cred pitchfork. Williamsburg banh mi whatever gluten-free, carles 
                    pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred 
                    you probably haven't heard of them, vinyl craft beer blog stumptown. 
                    Pitchfork sustainable tofu synth chambray yr.</p>

                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing
                    elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis 
                    natoque penatibus et magnis dis parturient montes, nascetur ridiculus 
                    mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, 
                    sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, 
                    aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet 
                    a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
            </div> <!-- /.tab-pane -->

        </div> <!-- /.tab-content -->

    </div> <!-- /.col -->

</div> <!-- /.row -->