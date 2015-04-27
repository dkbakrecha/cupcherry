<?php

class GroupMessage extends AppModel {

    var $name = 'GroupMessage';
    public $belongsTo = array(
        'User' => array(
            'fields' => array('id', 'username', 'status')
        ) 
        
    );
      public $hasOne = array(
        'UserProfile' => array(
            'foreignKey' =>false,
            'conditions' =>array('UserProfile.user_id = GroupMessage.user_id'),
            'fields' => array('id','user_id' ,'fname','lname' ,'status')
        ) 
        
    );
   

}
