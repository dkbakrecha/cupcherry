<?php
$user = array(); 

$user['id'] = Configure::read('currentUserInfo.User.id');
$user['profile_id'] = Configure::read('currentUserInfo.User.profile_id');
$user['email'] = Configure::read('currentUserInfo.User.email');
$user['type'] = Configure::read('currentUserInfo.User.type');
$user['status'] = Configure::read('currentUserInfo.User.status');
pr($user);
?>

