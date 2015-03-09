<?php

App::uses('AppController', 'Controller');

class GroupsController extends AppController {

    public $uses = array();
    public $helpers = array('Js');
    public $components = array('RequestHandler');

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('');
    }

    public function index() {
        $this->set('title_for_layout', 'Groups');
        $this->loadModel('GroupMember');
        $currentUserId = $this->Session->read('Auth.User.id');
        //  prd($currentUserId);
        $groupData = $this->Group->find('all', array(
            'conditions' => array('Group.created_by' => $currentUserId, 'Group.status' => 1),
        ));
        $this->set('groupData', $groupData);

        $joinedGropus = $this->GroupMember->find('all', array(
            'conditions' => array('GroupMember.user_id' => $currentUserId, 'GroupMember.status' => 1)
        ));
        $this->set('joinedGropus', $joinedGropus);
        //prd($joinedGropus);
        // prd($groupData);
    }

    public function add() {
        $this->set('title_for_layout', 'Group Add');
        $data = $this->request->data;
        $currentUser = $this->Session->read("Auth.User");
        if (isset($data) && !empty($data)) {
            $data['Group']['created_by'] = $currentUser['id'];
            $data['Group']['managed_by'] = $currentUser['id'];
            $data['Group']['modified'] = date("Y-m-d H:i:s");
            $data['Group']['status'] = 1;
            if (!empty($data['Group']['image']['name'])) {
                /**
                 * Group Logo upload
                 */
                $file = $data['Group']['image'];
                $filename = basename($file['name']);
                if (!empty($file['name'])) {
                    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                    $file_extension = array('png', 'jpeg', 'jpg');
                    if (in_array($ext, $file_extension)) {
                        $newFileName = "group" . "_" . uniqid() . '.' . $ext;
                        $destination = GROUP_IMG . $newFileName;
                        $moved = move_uploaded_file($file['tmp_name'], $destination);

                        if ($moved) {
                            $data['Group']['logo'] = $newFileName;
                        }
                    }
                }
            }
        }
        if ($this->request->is('post')) {
            if ($this->Group->save($data)) {
                $this->Session->setFlash(__('Group add successfully'));
                $this->redirect(array('controller' => 'groups', 'action' => 'index'));
            }
        }

        //prd($data);
    }

    public function view($id = null) {
        $this->set('title_for_layout', 'Group View');
        $this->loadModel('GroupMessage');
        $data = array();
        $groupData = $this->Group->find('all', array(
            'conditions' => array('Group.id' => $id, 'Group.status' => 1),
        ));
        $this->set('groupData', $groupData);

        //Pending 21.2.15

        $messages = $this->GroupMessage->find('all', array(
            'conditions' => array('GroupMessage.group_id' => $id, 'GroupMessage.status' => 1),
            'order' => array('GroupMessage.created DESC'),
//            'joins' => array(
//                array(
//                    'table' => 'group_resources',
//                    'alias' => 'GroupResources',
//                    'type' => 'INNER',
//                    'conditions' => array(
//                        'GroupMessage.GroupResource_id = GroupResources.id'
//                    ))
//            ),
//            'fields' => '*',
        ));
        //    prd($messages);
        $this->set('messages', $messages);
    }

    public function save_message($id = null) {
        $this->loadModel('GroupMessage');
        $data = $this->request->data;
        $save = array();
        $currentUserId = $this->Session->read('Auth.User.id');
        // prd($data);

        if (isset($data) && !empty($data)) {
            $save['GroupMessage']['user_id'] = $currentUserId;
            $save['GroupMessage']['group_id'] = $id;
            $save['GroupMessage']['message'] = $data['Group']['message'];
            $save['GroupMessage']['status'] = 1;
            if ($this->GroupMessage->save($save)) {
                $lastInsertMsgId = $this->GroupMessage->getLastInsertID();
                $lastInsertMsgData = $this->GroupMessage->findById($lastInsertMsgId);
                $this->set('lastInsertMsgData', $lastInsertMsgData);

                if ($this->RequestHandler->isAjax()) {
                    $this->autoRender = FALSE;

                    $this->render('save_message', 'ajax');
                } else {
                    $this->flash_msg(1, 'Posted');
                    $this->redirect(array('controller' => 'groups', 'action' => 'view', $id));
                }
            } else {
                $this->flash_msg(2, 'Unable to post, Some error.');
            }
        } else {
            
        }
    }

    public function save_resource($id = null) {
        $this->loadModel('GroupResource');
        $this->loadModel('GroupMessage');
        $data = $this->request->data;
        //  pr($id);
        if (isset($data) && !empty($data)) {
            $userId = Configure::read('currentUserInfo.id');
            $saveData = array();
            $saveData['GroupResource']['user_id'] = $userId;
            $saveData['GroupResource']['group_id'] = $id;
            $saveData['GroupResource']['short_description'] = $data['GroupResource']['short_description'];
            $saveData['GroupResource']['status'] = 1;
            if (!empty($data['GroupResource']['file']['name'])) {
                /**
                 * Resources upload
                 */
                $file = $data['GroupResource']['file'];
                $filename = basename($file['name']);
                if (!empty($file['name'])) {
                    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                    $file_extension = array('docx', 'png', 'jpeg', 'jpg');
                    if (in_array($ext, $file_extension)) {
                        $newFileName = "grp_res" . "-" . uniqid() . '.' . $ext;
                        $destination = RESOURCE_FILE . $newFileName;
                        $moved = move_uploaded_file($file['tmp_name'], $destination);

                        if ($moved) {
                            $saveData['GroupResource']['file_name'] = $newFileName;
                        }
                    }
                }
            }
        }
        if ($this->GroupResource->save($saveData)) {
            $lastInsertResId = $this->GroupResource->getLastInsertID();
            $saveResId['GroupMessage']['GroupResource_id'] = $lastInsertResId;
            $this->GroupMessage->save($saveResId);
            if ($this->RequestHandler->isAjax()) {
                $this->autoRender = FALSE;

               // $this->render('save_message', 'ajax');
            } else {
                $this->flash_msg(1, 'File Uploaded');
                $this->redirect(array('controller' => 'groups', 'action' => 'view', $id));
            }
        } else {
            $this->flash_msg(2, 'Some error in file uploadation');
            $this->redirect(array('controller' => 'groups', 'action' => 'view', $id));
        }
    }

    public function send_invitation($id = null) {
        $this->loadModel('Invite');
        $this->loadModel('EmailContent');
        $data = array();
        $data = $this->request->data;
        if (isset($data) && !empty($data)) {

            $mailAddress = $this->request->data['Group']['user_address'];
            $invitationKey = uniqid();
            $currentUserId = $this->Session->read('Auth.User.id');
            $currentUserName = $this->Session->read('Auth.User.fname');

            $data['Invite']['user_id'] = $currentUserId;
            $data['Invite']['group_id'] = $id;
            $data['Invite']['send_to'] = $mailAddress;
            $data['Invite']['invitation_key'] = $invitationKey;
            $data['Invite']['status'] = 1;
            //  prd($data);
            if ($this->Invite->save($data)) {
                if ($this->RequestHandler->isAjax()) {

                    $name = $currentUserName;
                    $email = $mailAddress;
                    $key = $invitationKey;

                    $emailObj = new EmailContent;
                    $emailObj->sendInvitation($name, $email, $key);


                    $this->autoRender = FALSE;
                    $this->render('success', 'ajax');
                } else {
                    $name = $currentUserName;
                    $email = $mailAddress;
                    $key = $invitationKey;

                    $emailObj = new EmailContent;
                    $emailObj->sendInvitation($name, $email, $key);

                    $this->flash_msg(1, "Invitaion sended.");
                    $this->redirect(array('controller' => 'groups', 'action' => 'view', $id));
                }
            } else {
                $this->flash_msg(2, "Invitaion can't be send. Some error.");
            }
        }
    }

    public function invitation_token($token = null) {
        $this->loadModel('Invite');
        $this->loadModel('User');
        $this->loadModel('GroupMember');
        $flag = 0;

        $result = $this->Invite->find('all', array(
            'conditions' => array('Invite.invitation_key' => $token, 'Invite.status' => 1),
        ));

        // prd($result);
        if (isset($result) && !empty($result)) {

            // This code finds that the user already exist or not.
            $userExist = $this->User->find('all', array(
                'conditions' => array('User.email' => $result[0]['Invite']['send_to'], 'User.status' => 1),
                'fields' => array('id', 'email', 'status')
            ));


            if (isset($userExist) && !empty($userExist)) {
                $flag = 1;
            } else {
                $flag = 2;
            }

            // If user is found then this condition will run.
            if ($flag == 1) {


                $groupId = $result[0]['Invite']['group_id'];

                $invitesEntry = array();
                $groupEntry = array();
                $groupMember = array();

                //Invites Table Entry
                $invitesEntry['Invite']['id'] = $result[0]['Invite']['id'];
                $invitesEntry['Invite']['accepted'] = 1;
                $invitesEntry['Invite']['invitation_key'] = 0;
                $invitesEntry['Invite']['status'] = 0;

                $groupData = $this->Group->find('all', array(
                    'conditions' => array('Group.id' => $groupId, 'Group.status' => 1),
                    'fields' => array('id', 'status', 'total_member')
                ));

                //Group Table Entry
                $groupEntry['Group']['id'] = $groupData[0]['Group']['id'];
                $groupEntry['Group']['total_member'] = $groupData[0]['Group']['total_member'] + 1;

                //GroupMember Table Entry
                $grpMemEntry['GroupMember']['group_id'] = $result[0]['Invite']['group_id'];
                $grpMemEntry['GroupMember']['user_id'] = $userExist[0]['User']['id'];
                $grpMemEntry['GroupMember']['status'] = 1;
                // prd($grpMemEntry);
                $this->Invite->save($invitesEntry);
                $this->Group->save($groupEntry);
                $this->GroupMember->save($grpMemEntry);
            }
            // Else this condition will run. Means user not exist or user status is 0
            elseif ($flag == 2) {
                $this->flash_msg(1, 'Registration required');
                $this->redirect(array('controller' => 'users', 'action' => 'login'));
            }
        } else {
            $this->flash_msg(1, 'Link Expired. Try resening a new link');
            $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }
    }

    public function admin_view() {
        $this->set('title_for_layout', 'Admin - Group View');

        $groupList = $this->Group->find('all', array(
            'conditions' => array('Group.status' => array(0, 1)),
        ));
        $this->set('groupList', $groupList);
        //prd($groupList);
    }

    public function admin_changeStatus() {
        if ($this->request->is('ajax')) {
            $data = $this->request->data;
            $saveData = array();
            $saveData['id'] = $data['id'];
            $saveData['status'] = $data['status'] == 1 ? 0 : 1;
            if ($this->Group->save($saveData)) {
                echo '1';
            } else {
                echo '0';
            }
        } else {
            $this->flash_msg(2, 'Unauthorized Access');
            $this->redirect(array('admin' => true, 'controller' => 'users', 'action' => 'dashboard'));
        }
    }

    public function admin_delete($id = null) {

        $id = $this->Group->read(null, $id);

        if (empty($id)) {
            $this->flash_msg('2', 'Unauthorized Access.');
            $this->redirect(array('controller' => 'users', 'action' => 'dashborad'));
        }

        if (!empty($id) && isset($id)) {
            $this->Group->id = $id;
            if ($this->Group->saveField('status', '2')) {
                $this->flash_msg('1', 'Recorded deleted.');
                $this->redirect(array('controller' => 'groups', 'action' => 'view'));
            }
        }
    }

}
