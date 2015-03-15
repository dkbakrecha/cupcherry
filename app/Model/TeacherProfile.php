<?php

class TeacherProfile extends AppModel {

    var $name = 'TeacherProfile';
    public $validate = array(
        'phone_number' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please provide you number.'
            ),
            'phone_number' => array(
                'rule' => 'numeric',
                'message' => 'Please provide valid number'
            ),
//            'phone_number' => array(
//                'rule' => array('phone'),
//                'message' => 'Please provide valid number'
//            )
        ),
    );

}
