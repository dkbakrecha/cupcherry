<?php


class Invite extends AppModel {
     var $name = 'Invite';
    public $validate = array(
        'send_to' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A email is required'
            )
        ),
        'send_to' => array(
            'rule' => array('email', false),
            'message' => 'Enter valid email id.'
        ),
    );

}
