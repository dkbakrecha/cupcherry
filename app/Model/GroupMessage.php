<?php


class GroupMessage extends AppModel {

    var $name = 'GroupMessage';
    
   public $belongsTo =  array(
     'User' => array(
         'fields' => array('id','username','fname','lname','status')
         )  
   );
 




}
