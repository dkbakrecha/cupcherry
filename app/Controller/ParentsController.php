<?php

App::uses('AppController', 'Controller');

class ParentsController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('');
    }

    public function plus_index() {
        $this->set('title_for_layout', 'Parents');
        $this->loadModel('StudentProfile');
        $this->loadModel('SpoRelation');
        $user = Configure::read('currentUserInfo.Plus');

        //Model Bind with ParentProfile 
        $this->SpoRelation->bindModel(
                array('hasOne' => array(
                        'ParentProfile' => array(
                            'foreignKey' => false,
                            'conditions' => array(
                                'SpoRelation.parent_id = ParentProfile.id',
                            ),
                        ),
                        'User' => array(
                            'foreignKey' => false,
                            'conditions' => array(
                                'ParentProfile.id = User.profile_id',
                                'User.type' => 5
                            )
                        ),
                        'UserProfile' => array(
                            'foreignKey' => false,
                            'conditions' => array(
                                'User.id = UserProfile.user_id'
                            )
                        )
                    )
                )
        );


        $parData = $this->SpoRelation->find('all', array(
            'conditions' => array('SpoRelation.org_id' => $user['id']),
            'fields' => array(
                'id',
                'stu_id',
                'org_id',
                'parent_id',
                'status',
                'ParentProfile.id',
                'ParentProfile.par_unique_id',
                'ParentProfile.fname',
                'ParentProfile.lname',
                'ParentProfile.relation',
                'ParentProfile.mobile',
                'ParentProfile.phone',
                'ParentProfile.email',
                'ParentProfile.address',
                'ParentProfile.created',
                'ParentProfile.status',
                'User.id',
                'User.email',
                'User.status',
                'User.terms',
                'User.type',
                'UserProfile.id',
                'UserProfile.fname',
                'UserProfile.lname',
                'UserProfile.user_mobile',
                'UserProfile.address',
                'UserProfile.status',)
        ));
        // prd($parData);
        $this->set('parData', $parData);
    }

    public function plus_add() {
        $this->set('title_for_layout', 'Students');
        $this->loadModel('Standard');
        $this->loadModel('User');
        $this->loadModel('UserProfile');
        $this->loadModel('StudentProfile');
        $this->loadModel('ParentProfile');
        $this->loadModel('SpoRelation');
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
                'fields' => array('id', 'profile_id', 'username', 'email', 'status', 'type')
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
                $saveUser['User']['type'] = 5; // for parents
                $saveUser['User']['contact'] = $data['StudentProfile']['parent_mobile'];
                $saveUser['User']['status'] = 3;
                $saveUser['User']['terms'] = 0;
                //prd($saveUser);
                //User_profile
                $saveUserPro['UserProfile']['fname'] = $data['StudentProfile']['parent_fname'];
                $saveUserPro['UserProfile']['lname'] = $data['StudentProfile']['parent_lname'];
                $saveUserPro['UserProfile']['user_mobile'] = $data['StudentProfile']['parent_mobile'];
                $saveUserPro['UserProfile']['address'] = $data['StudentProfile']['address'];
                $saveUserPro['UserProfile']['profile_status'] = 0;
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
                $studentPro['StudentProfile']['fname'] = $data['StudentProfile']['fname'];
                $studentPro['StudentProfile']['lname'] = $data['StudentProfile']['lname'];
                $studentPro['StudentProfile']['gender'] = $data['StudentProfile']['gender'];
                $studentPro['StudentProfile']['dob'] = $data['StudentProfile']['dob'];
                $studentPro['StudentProfile']['contact_number'] = $data['StudentProfile']['contact_number'];
                $studentPro['StudentProfile']['address'] = $data['StudentProfile']['address'];
                $studentPro['StudentProfile']['city'] = $data['StudentProfile']['city'];
                $studentPro['StudentProfile']['pin'] = $data['StudentProfile']['pin'];
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
                        $lastSavedParentId = $this->ParentProfile->getLastInsertId();
                    } else {
                        $this->flash_msg('Parent Profile saving error', 2);
                    }

                    // Saving to Student Profile
                    $studentPro['StudentProfile']['ParentProfile_id'] = $lastSavedParentId;
                    if ($this->StudentProfile->save($studentPro)) {
                        $lastStuId = $this->StudentProfile->getLastInsertId();
                    } else {
                        $this->flash_msg('Student Profile saving error', 2);
                    }

                    //Updating Profile_id in users table
                    $saveUser1 = array();
                    $saveUser1['User']['id'] = $lastId;
                    $saveUser1['User']['profile_id'] = 'par_' . $lastSavedParentId;
                    if ($this->User->save($saveUser1)) {
                        
                    } else {
                        $this->flash_msg('User Profile_id updateing  error', 2);
                    }

                    //SPO DATA Entry
                    $spoData = array();
                    $spoData['SpoRelation']['stu_id'] = $lastStuId;
                    $spoData['SpoRelation']['org_id'] = $user['id'];
                    $spoData['SpoRelation']['parent_id'] = $lastSavedParentId;
                    $spoData['SpoRelation']['status'] = 1;
                    // prd($spoData);
                    if ($this->SpoRelation->save($spoData)) {
                        $this->flash_msg('SPO data saved', 1);
                    } else {
                        $this->flash_msg('SPO data not saved', 1);
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
                    $spoData = array();

                    if ($this->StudentProfile->save($studentPro)) {
                        $lastStuId = $this->StudentProfile->getLastInsertId();
                        $this->flash_msg('Student data saved', 1);
                    } else {
                        $this->flash_msg('Student data not saved', 1);
                    }
                    //SPO DATA Entry
                    $spoData['SpoRelation']['stu_id'] = $lastStuId;
                    $spoData['SpoRelation']['org_id'] = $user['id'];
                    $spoData['SpoRelation']['parent_id'] = $lastInsertId;
                    $spoData['SpoRelation']['status'] = 1;
                    // prd($spoData);
                    if ($this->SpoRelation->save($spoData)) {
                        $this->flash_msg('SPO data saved', 1);
                    } else {
                        $this->flash_msg('SPO data not saved', 1);
                    }

                    $this->flash_msg('Data saved', 1);
                    $this->redirect(array('plus' => true, 'controller' => 'students', 'action' => 'add'));
                } else {
                    $this->flash_msg('Data not saved', 2);
                    $this->redirect(array('plus' => true, 'controller' => 'students', 'action' => 'add'));
                }
            }
        }
    }

}
