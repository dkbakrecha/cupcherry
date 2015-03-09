<?php

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class GroupMember extends AppModel {

    var $name = 'GroupMember';
    
   public $belongsTo = 'Group';




}
