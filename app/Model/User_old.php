<?php

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'email' => array(
            'rule' => array('isUnique', array('email'), false),
            'message' => 'This email combination has already been used.'
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'cpassword' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A conform password is required'
            ),
            'compare' => array(
                'rule' => array('validate_passwords'),
                'message' => 'The passwords you entered do not match.',
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'member')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );

    public function validate_passwords() {
        return $this->data[$this->alias]['password'] === $this->data[$this->alias]['cpassword'];
    }

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                    $this->data[$this->alias]['password']
            );

            if (!empty($this->data)) {
                $this->data['User']['dob'] = date('Y-m-d', strtotime($this->data['User']['dob']));
            }
        }
        return true;
    }

}
