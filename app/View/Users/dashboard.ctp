<?php
$user = array();
$user = Configure::read('currentUserInfo.User');
//$user['id'] = Configure::read('currentUserInfo.User.id');
//$user['profile_id'] = Configure::read('currentUserInfo.User.profile_id');
//$user['email'] = Configure::read('currentUserInfo.User.email');
//$user['type'] = Configure::read('currentUserInfo.User.type');
//$user['status'] = Configure::read('currentUserInfo.User.status');
//pr($user);
?>
<div class="row">
    <div class="col-md-6 ">
        <div class="box-top"> Personal Information</div>
        <div class=" dashboard_box color">
            Name : <?php echo $user['UserProfile']['fname'] . ' ' . $user['UserProfile']['lname']; ?> <br>
            Email : <?php echo $user['email']; ?><br>
            Mobile : <?php echo $user['UserProfile']['user_mobile']; ?><br>
            Type : <?php echo $user['type']; ?>
        </div>
        <div class="box-bottom">
            <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit_profile')); ?>">Edit Profile</a>
        </div>
    </div>
    <div class="col-md-6 ">
        <div class="box-top"> Other Information</div>
        <div class="dashboard_box color">
            asd
        </div>
        <div class="box-bottom">

        </div>
    </div>

</div>
