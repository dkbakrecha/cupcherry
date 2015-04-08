<?php

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

    var $name = 'User';
//    public $hasOne = array(
//        'Organization' => array(
//            'className' => 'Organization',
//            'foreignKey' => 'user_id',
//            'conditions' => array('Organization.status' => '1'),
//
//        ),
//        'UserProfile' => array(
//            'className' => 'UserProfile',
//            'foreignKey' => 'user_id',
//            'conditions' => array('UserProfile.status' => '1'),
//
//        ),
//        
//        
//    );
  
    
    
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            ),
            'unique name' => array(
                'rule' => 'isUnique',
                'message' => 'this username already taken'
            )
        ),
        'email' => array(
            'valid email' => array(
                'rule' => array('email', false), // second parameter verify that the host for the address is valid / I set this false right now
                'message' => 'Please enter a valid email address'
            ),
            'unique email' => array(
                'rule' => 'isUnique',
                'message' => 'This email address already registered.'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            ),
            'password match' => array(
                'rule' => 'passwordMatch',
                'message' => ''
            )
        ),
        'confirm_password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A confirm password is required'
            )
        ),
        'change_password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'old password is required'
            )
        ),
        'change_password' => array(
            'required' => array(
                'rule' => 'checkCurrentPassword',
            // 'message' => 'old password incorrect.'
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

    public function passwordMatch() {
        if ($this->data[$this->alias]['password'] == $this->data['User']['confirm_password']) {
            return true;
        }
        $this->invalidate('confirm_password', 'Passwords do not match.');
        return false;
    }

    public function checkCurrentPassword() {
        $passwordHasher = new SimplePasswordHasher();
        $this->data[$this->alias]['change_password'] = $passwordHasher->hash(
                $this->data[$this->alias]['change_password']
        );

        //$currentId = Configure::read('currentUserInfo.id');
        $oldpassword = $this->data[$this->alias]['old_password'];

        if ($this->data[$this->alias]['change_password'] == $oldpassword) {
            return true;
        }
        $this->invalidate('change_password', 'old password incorrect.');
        return false;
    }

//    public function validate_passwords() {
//        return $this->data[$this->alias]['password'] === $this->data[$this->alias]['cpassword'];
//    }

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
