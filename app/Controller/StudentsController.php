<?php

App::uses('AppController', 'Controller');

class StudentsController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('');
    }

    public function plus_index() {
        $this->set('title_for_layout', 'Students');
        $this->loadModel('StudentProfile');
        $this->loadModel('Standard');
        $user = Configure::read('currentUserInfo.Plus');

        //Model Bind with Type 
        $this->StudentProfile->bindModel(
                array('hasOne' => array(
                        'Standard' => array(
                            'foreignKey' => false,
                            'conditions' => array(
                                'StudentProfile.standard_id = Standard.id',
                            // 'GroupMessage.group_resource_id != 0'
                            ),
                            'fields' => array('id', 'title', 'description', 'status')
                        )
                    )
                )
        );


        $standards = $this->Standard->find('all', array(
            'conditions' => array('Standard.status' => 1),
            'fields' => array('id', 'title', 'description', 'status')
        ));
        $this->set('standards', $standards);

        if ($this->request->is('post')) {
            $StdId = $this->request->data['Student']['standard_id'];

            if (isset($StdId) && !empty($StdId)) {
                $stuList = $this->StudentProfile->find('all', array(
                    'conditions' => array(
                        'StudentProfile.status' => 1,
                        'StudentProfile.standard_id' => $StdId,
                        'StudentProfile.created_under' => $user['id'])
                ));
                //prd($stuList);
            }
        } else {
            $stuList = $this->StudentProfile->find('all', array(
                'conditions' => array(
                    //  'StudentProfile.status' => 1,
                    // 'StudentProfile.standard_id' => $StdId,
                    'StudentProfile.created_under' => $user['id']),
                'fields' => array(
                    'id',
                    'ParentProfile_id',
                    'user_id',
                    'created_under',
                    'standard_id',
                    'stu_unique_id',
                    'fname',
                    'lname',
                    'contact_number',
                    'dob',
                    'gender',
                    'address',
                    'city',
                    'pin',
                    'status',
                    'Standard.id',
                    'Standard.title',
                    'Standard.description',
                    'Standard.status',
                ),
            ));
        }


        if (isset($stuList) && !empty($stuList)) {
            $this->set('stuList', $stuList);
        }
    }

    public function plus_add() {
        $this->set('title_for_layout', 'Students');
        $this->loadModel('Standard');
        $this->loadModel('User');
        $this->loadModel('UserProfile');
        $this->loadModel('StudentProfile');
        $this->loadModel('ParentProfile');
        $user = Configure::read('currentUserInfo.Plus');
        $flag = 0;
//  prd($user);

        $standards = $this->Standard->find('all', array(
            'conditions' => array('Standard.status' => 1),
            'fields' => array('id', 'title', 'description', 'status')
        ));
        // prd($standards);
        $this->set('standards', $standards);
        // prd($types);

        $data = $this->request->data;
        //prd($data);

        @$parEmail = $data['StudentProfile']['parent_email'];


        if (isset($parEmail) && !empty($parEmail)) {
            //Parents Email is set
            $flag = 1;
        } else {
            // Parent Email not set
            $flag = 2;
        }
        /* ------------------------------------------------------------- */
        if ($flag == 1) {
            // echo 'Parents email address is set';
            $case = 0;
            $userCheck = $this->User->find('first', array(
                'conditions' => array('User.email' => $parEmail, 'User.status !=' => 2),
                'fields' => array('id', 'profile_id', 'username', 'email', 'fname', 'lname', 'status', 'type')
            ));
            // prd($userCheck);
            if (isset($userCheck) && !empty($userCheck)) {
                echo 'user found/ this email id found in database.';

              // prd($userCheck);
                
                
            } else {
                $this->loadModel('EmailContent');
                $saveUser = array();
                $saveUserPro = array();
                $studentPro = array();
                $parentPro = array();

                //for User  
                $verifyCode = uniqid();
                $randNumber = rand(100, 10000);
                $passkey = 'welcome' . '@' . $randNumber;
                $saveUser['User']['accesskey'] = $verifyCode;
                $saveUser['User']['password'] = $passkey;
                $saveUser['User']['confirm_password'] = $passkey;
                $saveUser['User']['email'] = $parEmail;
                $saveUser['User']['fname'] = $data['StudentProfile']['parent_fname'];
                $saveUser['User']['lname'] = $data['StudentProfile']['parent_lname'];
                $saveUser['User']['type'] = 5; // for parents
                $saveUser['User']['contact'] = $data['StudentProfile']['parent_mobile'];
                $saveUser['User']['address'] = $data['StudentProfile']['parent_address'];
                $saveUser['User']['created_under'] = $user['id'];
                $saveUser['User']['status'] = 3;
                $saveUser['User']['terms'] = 0;
                $saveUser['User']['profile_stauts'] = 0;
                //prd($saveUser);
                //User_profile
                $saveUserPro['UserProfile']['fname'] = $data['StudentProfile']['parent_fname'];
                $saveUserPro['UserProfile']['lname'] = $data['StudentProfile']['parent_lname'];
                $saveUserPro['UserProfile']['user_mobile'] = $data['StudentProfile']['parent_mobile'];
                $saveUserPro['UserProfile']['status'] = 1;
                //prd($saveUserPro);
                //Parent_profile
                $parentPro['ParentProfile']['fname'] = $data['StudentProfile']['parent_fname'];
                $parentPro['ParentProfile']['lname'] = $data['StudentProfile']['parent_lname'];
                $parentPro['ParentProfile']['relation'] = $data['StudentProfile']['relation'];
                $parentPro['ParentProfile']['address'] = $data['StudentProfile']['parent_address'];
                $parentPro['ParentProfile']['mobile'] = $data['StudentProfile']['parent_mobile'];
                $parentPro['ParentProfile']['email'] = $parEmail;
                $parentPro['ParentProfile']['phone'] = $data['StudentProfile']['parent_phone'];
                $parentPro['ParentProfile']['status'] = 1;
                // prd($parentPro);
                //Student profile
                $studentPro['StudentProfile']['standard_id'] = $data['StudentProfile']['standard_id'];
               // $studentPro['StudentProfile']['email'] = $data['StudentProfile']['email'];
                $studentPro['StudentProfile']['fname'] = $data['StudentProfile']['fname'];
                $studentPro['StudentProfile']['lname'] = $data['StudentProfile']['lname'];
                $studentPro['StudentProfile']['gender'] = $data['StudentProfile']['gender'];
                $studentPro['StudentProfile']['dob'] = $data['StudentProfile']['dob'];
                $studentPro['StudentProfile']['contact_number'] = $data['StudentProfile']['contact_number'];
                $studentPro['StudentProfile']['address'] = $data['StudentProfile']['address'];
                $studentPro['StudentProfile']['city'] = $data['StudentProfile']['city'];
                $studentPro['StudentProfile']['pin'] = $data['StudentProfile']['pin'];
                $studentPro['StudentProfile']['created_under'] = $user['id'];
                $studentPro['StudentProfile']['status'] = 1;
                //prd($studentPro);

                if ($this->User->save($saveUser)) {
                    $lastSaved = $this->User->find('first', array(
                        'conditions' => array('User.email' => $parEmail),
                        'fields' => array('id', 'email', 'status'),
                    ));
                    $lastId = $lastSaved['User']['id'];
                    //prd($lastSaved);
                    // Saving to User Profile
                    $saveUserPro['UserProfile']['user_id'] = $lastId;
                    if ($this->UserProfile->save($saveUserPro)) {
                        
                    } else {
                        $this->flash_msg('User Profile saving error', 2);
                    }

                    // Saving to Parent Profile
                    if ($this->ParentProfile->save($parentPro)) {
                        
                    } else {
                        $this->flash_msg('Parent Profile saving error', 2);
                    }

                    $lastSavedParentId = $this->ParentProfile->find('first', array(
                        'conditions' => array('ParentProfile.email' => $parEmail),
                        'fields' => array('id', 'fname', 'lname', 'email', 'status'),
                    ));
                    //prd($lastSavedParentId);
                    // Saving to Student Profile
                    $studentPro['StudentProfile']['ParentProfile_id'] = $lastSavedParentId['ParentProfile']['id'];
                    if ($this->StudentProfile->save($studentPro)) {
                        
                    } else {
                        $this->flash_msg('Student Profile saving error', 2);
                    }

                    //Updating Profile_id in users table
                    $saveUser1 = array();
                    $saveUser1['User']['id'] = $lastId;
                    $saveUser1['User']['profile_id'] = $lastSavedParentId['ParentProfile']['id'];
                    if ($this->User->save($saveUser1)) {
                        
                    } else {
                        $this->flash_msg('User Profile_id updateing  error', 2);
                    }

                    // Initializing Email Model.
                    $name = $data['StudentProfile']['parent_fname'];
                    $email = $parEmail;
                    $key = $verifyCode;
                    $pass = $passkey;
                    $emailObj = new EmailContent;
                    $emailObj->registration_plus($name, $email, $key, $pass);

                    $this->flash_msg('Data Saved, and a email has been sended parents id, after email verification, they can login into cupcherry.', 1);
                    $this->redirect(array('plus' => true, 'controller' => 'students', 'action' => 'add'));
                } else {
                    $this->flash_msg('Error saving user, please try again.', 2);
                    $this->redirect(array('plus' => true, 'controller' => 'students', 'action' => 'add'));
                };
            }
        } elseif ($flag == 2) {
            // No address is not set
            if (isset($data) && !empty($data)) {
                $studentPro = array();
                $parentPro = array();
                // Stu Info
                $studentPro['StudentProfile']['standard_id'] = $data['StudentProfile']['standard_id'];
                //$studentPro['StudentProfile']['email'] = $data['StudentProfile']['email'];
                $studentPro['StudentProfile']['fname'] = $data['StudentProfile']['fname'];
                $studentPro['StudentProfile']['lname'] = $data['StudentProfile']['lname'];
                $studentPro['StudentProfile']['gender'] = $data['StudentProfile']['gender'];
                $studentPro['StudentProfile']['dob'] = $data['StudentProfile']['dob'];
                $studentPro['StudentProfile']['contact_number'] = $data['StudentProfile']['contact_number'];
                $studentPro['StudentProfile']['address'] = $data['StudentProfile']['address'];
                $studentPro['StudentProfile']['city'] = $data['StudentProfile']['city'];
                $studentPro['StudentProfile']['pin'] = $data['StudentProfile']['pin'];
                $studentPro['StudentProfile']['created_under'] = $user['id'];
                $studentPro['StudentProfile']['status'] = 1;
                //prd($studentPro);
                // Parent Info
                $parentPro['ParentProfile']['fname'] = $data['StudentProfile']['parent_fname'];
                $parentPro['ParentProfile']['lname'] = $data['StudentProfile']['parent_lname'];
                $parentPro['ParentProfile']['relation'] = $data['StudentProfile']['relation'];
                $parentPro['ParentProfile']['address'] = $data['StudentProfile']['parent_address'];
                $parentPro['ParentProfile']['mobile'] = $data['StudentProfile']['parent_mobile'];
                $parentPro['ParentProfile']['email'] = $data['StudentProfile']['parent_email'];
                $parentPro['ParentProfile']['phone'] = $data['StudentProfile']['parent_phone'];
                $parentPro['ParentProfile']['status'] = 1;
                // prd($parentPro);
                // prd($data);
                if ($this->ParentProfile->save($parentPro)) {
                    $lastInsertId = $this->ParentProfile->getLastInsertID();
                    $studentPro['StudentProfile']['ParentProfile_id'] = $lastInsertId;
                    if ($this->StudentProfile->save($studentPro)) {
                        $this->flash_msg('Student saved', 1);
                        $this->redirect(array('plus' => true, 'controller' => 'students', 'action' => 'add'));
                    }
                } else {
                    $this->flash_msg('Student not saved', 2);
                    $this->redirect(array('plus' => true, 'controller' => 'students', 'action' => 'add'));
                }
                //  prd($this->request->data);
            }
        }
    }

}
