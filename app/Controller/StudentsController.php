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
        $this->loadModel('Type');
        $user = Configure::read('currentUserInfo.Plus');
//
//        //Model Bind with Type 
//        $this->StudentProfile->bindModel(
//                array('hasOne' => array(
//                        'Type' => array(
//                            'foreignKey' => false,
//                            'conditions' => array(
//                                'StudentProfile.type_id = Type.id',
//                               // 'GroupMessage.group_resource_id != 0'
//                            )
//                        )
//                    )
//                )
//        );


        $types = $this->Type->find('all', array(
            'conditions' => array('Type.status' => 1),
            'fields' => array('id', 'title', 'description', 'status')
        ));
        $this->set(compact($types));

        @$typeId = $this->request->data['Student']['type_id'];

        if (isset($typeId) && !empty($typeId)) {
            $stuList = $this->StudentProfile->find('all', array(
                'conditions' => array(
                    'StudentProfile.status' => 1,
                    'StudentProfile.type_id' => $typeId,
                    'StudentProfile.created_under' => $user['id'])
            ));
            //prd($stuList);
        }

        if (isset($stuList) && !empty($stuList)) {
            $this->set('stuList', $stuList);
        }
    }

    public function plus_add() {
        $this->set('title_for_layout', 'Students');
        $this->loadModel('Type');
        $this->loadModel('StudentProfile');
        $this->loadModel('ParentProfile');
        $user = Configure::read('currentUserInfo.Plus');
        //  prd($user);

        $types = $this->Type->find('all', array(
            'conditions' => array('Type.status' => 1),
            'fields' => array('id', 'title', 'description', 'status')
        ));
        $this->set(compact($types));
        // prd($types);

        $data = $this->request->data;
        // prd($data);
        if (isset($data) && !empty($data)) {
            $studentPro = array();
            $parentPro = array();
            // Stu Info
            $studentPro['StudentProfile']['type_id'] = $data['StudentProfile']['type_id'];
            $studentPro['StudentProfile']['registration_number'] = $data['StudentProfile']['registration_number'];
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
