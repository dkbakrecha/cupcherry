<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow(
                'admin_login', 'register', 'add', 'signup', 'registration', 'verification'
        );
    }

    public function register() {
        if ($this->request->is('post')) {
            $this->User->create();
            // pr($this->request->data);
            $this->request->data['User']['role'] = 'member';
            // exit;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'login'));
            }
            $this->Session->setFlash(
                    __('The user could not be saved. Please, try again.')
            );
        }
    }

    public function profile($username = null) {
        $this->set('title_for_layout', 'Public Profile');


        $userData = $this->User->find('first', array('conditions' => array(
                'username' => $username
        )));

        $this->set('userData', $userData);
    }

    public function changepassword() {
        $this->set('title_for_layout', 'Change Password');
        // pr($this->request->data);
        $currentId = Configure::read('currentUserInfo.id');
        $data = $this->request->data;


        //  prd($data);

        if (isset($data) && !empty($data)) {
            $oldpass = $this->User->find('first', array(
                'conditions' => array('User.id' => $currentId),
                'fields' => array('password', 'id'),
            ));

            $data['User']['id'] = $oldpass['User']['id'];
            $data['User']['old_password'] = $oldpass['User']['password'];
            $this->User->set($data);
            if ($this->User->validates()) {
                if ($this->User->save($data)) {

                    $this->flash_msg(1, 'Password changed.');
                    $this->redirect(array('controller' => 'users', 'action' => 'changepassword'));
                } else {
                    $this->flash_msg(2, 'Password not changed.');
                    //  $this->redirect(array('controller'=>'users','action'=>'changepassword'));
                }
            } else {
                $errors = $this->User->validationErrors;
            }
        }
    }

    public function edit_profile() {
        $this->loadModel('UserProfile');
        $this->set('title_for_layout', 'Edit Profile');
        $userId = Configure::read('currentUserInfo.id');

        $data = array();
        $data = $this->UserProfile->find('first', array(
            'conditions' => array('UserProfile.user_id' => $userId),
        ));
        if (!isset($userId) && empty($userId)) {
            $this->flash_msg(2, 'Unauthorized access.');
            $this->redirect(array('controller' => 'pages', 'action' => 'index'));
        }



        if ($this->request->is('post')) {
            $saveData = $this->request->data;
            $saveData['UserProfile']['id'] = $data['UserProfile']['id'];
            $saveData['UserProfile']['user_id'] = $userId;
            if ($this->UserProfile->save($saveData)) {
                $this->flash_msg(1, 'Profile Updated.');
                $this->redirect(array('controller' => 'users', 'action' => 'edit_profile'));
            } else {
                $this->flash_msg(2, 'Unable to save profile. Please try again.');
                $this->redirect(array('controller' => 'users', 'action' => 'edit_profile'));
            }
        }
        if (!$this->request->data) {
            $this->request->data = $data;
        }
    }

    public function registration() {
        $data = array();
        $this->loadModel('EmailContent');
        $this->set('title_for_layout', 'Registration');
        $data = $this->request->data;
        //$data = $this->User->set($this->request->data);
        $user = $this->Session->read('Auth.User');
        if (isset($user['id']) && !empty($user['id'])) {
            $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
        }


        if (isset($data) && !empty($data)) {
            $verifyCode = uniqid();
            $data['User']['status'] = 3;
            $data['User']['type'] = 1;
            $data['User']['accesskey'] = $verifyCode;

            $this->User->set($data);
            if ($this->User->validates()) {
                if ($this->User->save($data)) {
                    $name = $data['User']['fname'];
                    $email = $data['User']['email'];
                    $status = $data['User']['status'];
                    $key = $data['User']['accesskey'];
                    // Initializing Email Model.
                    $emailObj = new EmailContent;
                    $emailObj->registration_mail($status, $name, $email, $key);

                    $this->flash_msg(1, 'An Email has been send to your email id. Please check');
                    $this->redirect(array('controller' => 'pages', 'action' => 'index'));
                }
                $this->flash_msg(2, 'Some error occurred in registration.');
                $this->redirect(array('controller' => 'pages', 'action' => 'index'));
            } else {
                $errors = $this->User->validationErrors;
            }
        }
    }

    public function verification($key) {
        $this->loadModel('User');
        if (!$key) {
            $this->flash_msg(2, 'Invalid access.');
            $this->redirect(array('controller' => 'pages', 'action' => 'index'));
        }

        $data = array();
        $data = $this->User->find('all', array(
            'conditions' => array('User.accesskey' => $key)
        ));
        $saveData = array();
        $saveData['User']['id'] = $data[0]['User']['id'];
        $saveData['User']['accesskey'] = $data[0]['User']['accesskey'];
        $saveData['User']['status'] = $data[0]['User']['status'];

        // prd($saveData);
        if (isset($saveData) && !empty($saveData)) {
            $saveData['User']['status'] = 1;
            $saveData['User']['accesskey'] = 1;  // Verified by user

            if ($this->User->save($saveData)) {

                $this->flash_msg(1, 'Verification successful.');
                $this->redirect(array('controller' => 'pages', 'action' => 'index'));
            }
            // $this->User->validationErrors;
            $this->flash_msg(2, 'Verification unsuccessful.');
            $this->redirect(array('controller' => 'pages', 'action' => 'index'));
        } else {
            $this->flash_msg(2, 'Invalid access.');
            $this->redirect(array('controller' => 'pages', 'action' => 'index'));
        }
    }

    public function account_recovery() {
        $this->set('title_for_layout', 'Password Reset');
        $this->loadModel('EmailContent');
        $flag = 0;
        if ($this->request->is('post')) {
            // prd($this->request->data);
            $emailId = $this->request->data['User']['email'];
            $result = $this->User->find('all', array(
                'conditions' => array('User.email' => $emailId, 'User.status' => 1),
                'fields' => array('id', 'status', 'email', 'fname'),
            ));
            if (isset($result) && !empty($result)) {
                $flag = 1;
            } else {
                $flag = 2;
            }
        }
        if ($flag == 1) {

            $data = array();
            $uniqueCode = uniqid();
            $data['User']['id'] = $result[0]['User']['id'];
            $data['User']['password_reset_key'] = $uniqueCode;
            //Updating password_reset_key field with uniqueCode
            $this->User->save($data);

            $name = $result[0]['User']['fname'];
            $email = $result[0]['User']['email'];
            $key = $uniqueCode;

            // Initializing Email Object
            $emailObj = new EmailContent;
            $emailObj->forgetPassword($name, $email, $key);



            $this->flash_msg(1, "An Email has been send to your email address. Please Check.");
            $this->redirect(array('controller' => 'users', 'action' => 'login'));
        } else if ($flag == 2) {
            $this->flash_msg(2, "This email address doesn't exist.");
        }
    }

    public function recovery_token($token = null) {
        $this->set('title_for_layout', 'Change Password');
        $data = array();
        $this->set('setKey', $token);
        $data = $this->request->data;
        if (!$token) {
            $this->flash_msg(2, 'Invalid access');
            $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }
        $result = $this->User->find('all', array(
            'conditions' => array('User.password_reset_key' => $token, 'User.status' => 1),
            'fields' => array('id', 'email', 'status')
        ));
        $data['User']['id'] = $result[0]['User']['id'];
        $data['User']['password_reset_key'] = 0;

        if (isset($result) && !empty($result)) {
            if ($this->request->is('post')) {
                $this->User->set($data);
                if ($this->User->validates()) {
                    if ($this->User->save($data)) {
                        $this->flash_msg(1, 'Password Changed.');
                        $this->redirect(array('controller' => 'users', 'action' => 'login'));
                    }
                    $this->flash_msg(2, 'Password not chnaged');
                    $this->redirect(array('controller' => 'users', 'action' => 'login'));
                } else {
                    $errors = $this->User->validationErrors;
                }
            }
        } else {
            $this->flash_msg(2, 'Invalid result');
            $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }
    }

    public function signup() {
        $this->set('title_for_layout', 'Signup');
        $data = $this->request->data;
        if ($this->request->is('post')) {
            $this->User->create();
            // pr($this->request->data);
            $data['User']['created'] = date("Y-m-d H:i:s");
            $data['User']['modified'] = date("Y-m-d H:i:s");
            $data['User']['role'] = '2';
            $data['User']['status'] = '4';
            $data['User']['accesskey'] = "USER" . uniqid();
            // exit;
            if ($this->User->save($data)) {
                $this->Session->setFlash(__('The user is created successfully. Please see your Email address to verify link.'));
                return $this->redirect(array('action' => 'login'));
            }
            $this->Session->setFlash(
                    __('The user could not be created. Please, try again.')
            );
        }
    }

    public function index() {
        
    }

    public function view() {
        
    }

    public function login() {
        $this->set('title_for_layout', 'Member login');

        $user = $this->Session->read('Auth.User');
        if (isset($user['id']) && !empty($user['id'])) {
            $this->redirect($this->Auth->loginRedirect);
        }

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $status = $this->Auth->User('status');
                $userData = $this->Auth->User();
                $msg = '';
                switch ($status) {
                    case '3':
                        $link = Router::url(array('controller' => 'users', 'action' => 'resend_activation', $userData['email']), true);

                        $msg = __('Your account is not activated. Resend activation code?');
                        $click = __('click here');
                        $msg .= ('<a href="' . $link . '" target="_BLANK">' . $click . '</a>.');


                        //$msg = _('Your account is not activated');
                        break;
                    case '0':
                        $msg = _('Your account is disabled by Administrator');
                        break;
                }


                if (empty($msg)) {
                    $this->flash_msg('Logged in successful');
                    $this->redirect($this->Auth->loginRedirect);
                } else {
                    $this->Auth->logout();
                    $this->flash_msg($msg,2);
                }
            } else {
                $this->flash_msg('Incorrect Username or Password',2);
            }
        }
    }

    public function step1() {
        
    }

    public function uprofile($id = null) {
        // echo $id;
        $this->loadModel('UserProfile');
        // prd($this->request->data);

        $this->set('title_for_layout', 'Complete Profile');
        $userId = Configure::read('currentUserInfo.id');

        if (!isset($userId) && empty($userId)) {
            $this->flash_msg(2, 'Unauthorized access.');
            $this->redirect(array('controller' => 'pages', 'action' => 'index'));
        }

        $data = $this->request->data;
        if (isset($data) && !empty($data)) {

            if ($this->request->is('post')) {
                $data['UserProfile']['user_id'] = $userId;
                $data['UserProfile']['status'] = 1;
                if ($this->UserProfile->save($data)) {
                    $this->flash_msg('Profile Saved.');
                    $this->redirect(array('controller' => 'users', 'action' => 'dasboard'));
                } else {
                    $this->flash_msg('Unable to save profile. Please try again.',2);
                    $this->redirect(array('controller' => 'users', 'action' => 'uprofile'));
                }
            }
        }
    }

    public function tprofile($id = null) {
        //echo $id;

        $this->loadModel('TeacherProfile');
        $this->loadModel('Type');
        $this->loadModel('Category');
        $this->loadModel('TeacherFacility');
        $types = $this->Type->find('all', array(
            'conditions' => array('Type.status' => 1),
            'fields' => array('id', 'title', 'description', 'status'),
        ));
        $this->set('types', $types);
        $categories = $this->Category->find('all', array(
            'conditions' => array('Category.status' => 1),
            'fields' => array('id', 'title', 'description', 'status'),
        ));
        $this->set('categories', $categories);
        $facility = $this->TeacherFacility->find('all', array(
            'conditions' => array('TeacherFacility.status' => 1),
            'fields' => array('id', 'title', 'status'),
        ));
        $this->set('facility', $facility);

        $data = array();
        $data = $this->request->data;

        //   prd($data);
        if (isset($data) && !empty($data)) {
            $data['TeacherProfile']['user_id'] = Configure::read('currentUserInfo.id');
            $data['TeacherProfile']['status'] = 1;
            $this->TeacherProfile->set($data);
            if ($this->TeacherProfile->validates()) {
                if ($this->TeacherProfile->save($data)) {
                    $this->flash_msg(1, 'Profile saved.');
                    $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
                } else {
                    $this->flash_msg(2, 'Profile not saved.');
                    $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
                }
            } else {
                $errors = $this->TeacherProfile->validationErrors;
            }
        }
    }

    public function logout() {
        $this->Session->delete('Auth.User');
        $this->redirect(array('controller' => 'users', 'action' => 'login'));
    }

    public function dashboard() {
        
    }

    public function admin_index() {
        
    }

    public function admin_dashboard() {
        //  $a = $this->Session->read('Admin.fname');
        // prd($a);
        // echo  WWW_ROOT;
        $this->set('title_for_layout', 'Welcome to Admin Panel');
        $user = $this->Session->read('Auth');
        // prd($user);
    }

    public function admin_login() {
        // prd($this->request->data);
        $this->layout = 'login';
        $this->set('title_for_layout', 'Cup Cherry - Admin Panel');

        $user = $this->Session->read('Auth.Admin');
        //  prd($user);
        if (isset($user['id']) && !empty($user['id'])) {
            $this->redirect($this->Auth->loginRedirect);
        }



        if ($this->request->is('post')) {
            //   prd($user);


            if ($user['type'] == 0) {
                if ($this->Auth->login()) {

                    $this->redirect($this->Auth->loginRedirect);
                }
            } else {
                $this->Session->setFlash(__('Not Authorized'));
            }

            $this->Session->setFlash(__('Incorrect Username or Password'));
        }
    }

    function admin_logout() {
        $this->Session->delete('Auth.Admin');
        $this->redirect(array('controller' => 'Users', 'action' => 'admin_login', 'admin' => true));
    }

    public function admin_settings() {
        $this->set('title_for_layout', 'Admin - Site Settings');
        $this->loadModel('Sitesetting');
        //prd($this->request);
        if (!empty($this->request->data)) {
            if ($this->Sitesetting->saveAll($this->request->data['Sitesetting'])) {
                $this->flash_msg(1, 'Websetings have been edited');
                //$this->Session->setFlash('Websettings have been edited', 'default', array('class' => 'success'));
                $this->redirect(array('controller' => 'users', 'action' => 'admin_settings'));
            } else {
                $this->Session->setFlash('Websetting could not be edited. Please, try again.', 'default', array('class' => 'error'));
            }
        }

        $allSettings = $this->Sitesetting->find('all', array(
            'conditions' => array('Sitesetting.status' => 1)
        ));
        $this->set('allSettings', $allSettings);
        // prd($allSettings);
    }

    public function admin_slider() {
        $this->loadModel('HomeSlider');
        $this->set('title_for_layout', 'Home Slider');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (isset($data['imageTemp']['uploadfile']) && !empty($data['imageTemp']['uploadfile'])) {
                $file = $data['imageTemp']['uploadfile'];
                if (!empty($file['name'])) {
                    $ext = $this->get_extension($file['name']);
                    $file_extension = array('png', 'gif', 'jpeg', 'jpg', 'bmp');

                    if (in_array($ext, $file_extension)) {
                        $newFileName = "Home_" . uniqid() . '.' . $ext;
                        $destination = 'img/Home_files/' . $newFileName;
                        $moved = move_uploaded_file($file['tmp_name'], $destination);
                        if ($moved) {

                            $saveImgData['HomeSlider']['image'] = $newFileName;
                            $this->HomeSlider->save($saveImgData);
                        }
                    }
                }
            }
        }

        $gData = $this->HomeSlider->find('all', array('conditions' => array('HomeSlider.status' => 1)));
        $this->request->data = $gData;
    }

    public function admin_makeMainbg($imgid) {
        if (!empty($imgid)) {
            $this->loadModel('HomeSlider');
            $this->HomeSlider->updateAll(
                    array('HomeSlider.is_main' => 0), array('1')
            );
            $this->HomeSlider->updateAll(
                    array('HomeSlider.is_main' => 1), array('HomeSlider.id' => $imgid)
            );
            $this->redirect(array('action' => 'admin_slider'));
        } else {
            
        }
    }

    public function admin_deleteSlideImage($imgid) {
        if (!empty($imgid)) {
            $this->loadModel('HomeSlider');
            $data = array();
            $data['HomeSlider']['status'] = 2;
            $data['HomeSlider']['id'] = $imgid;
            $this->HomeSlider->save($data);
            $this->redirect(array('action' => 'admin_slider'));
        } else {
            
        }
    }

    public function admin_profile() {
        $this->set('title_for_layout', 'Edit Profile');
        $request = $this->request;

        $currUserId = $this->Session->read('Auth.Admin.id');
        $currUserRecord = $this->User->findById($currUserId);

        if (($request->isPost() || $request->isPut())) {
            $data = $request['data'];
            $data['User']['id'] = $currUserRecord['User']['id'];

            if (!isset($data['User']['password']) || empty($data['User']['password'])) {
                unset($data['User']['password']);
                unset($data['User']['confirm_password']);
            }

            if ($this->User->save($data)) {

                $this->Session->setFlash(__("User profile changed successfully."));
                $this->redirect(array('controller' => 'users', 'action' => 'index'));
            }
        }

        if (isset($currUserRecord) && !empty($currUserRecord)) {
            $this->request->data = $currUserRecord;
        } else {
            $this->Session->setFlash(__("Invalid User Request"), 'flash_error');
            $this->redirect(array('controller' => 'index', 'action' => 'index'));
        }
    }

    public function admin_music() {
        $this->loadModel('Sitesetting');

        if (!empty($this->request->data)) {
            $data = $this->request->data;
            //pr($data['Music']['file']);
            //prd($this->request->data);

            if (isset($data['Music']['file']) && !empty($data['Music']['file'])) {
                $file = $data['Music']['file'];
                if (!empty($file['name'])) {
                    $ext = $this->get_extension($file['name']);
                    $file_extension = array('mp3');

                    if (in_array($ext, $file_extension)) {
                        $fname = rand(1000, 9999);
                        $newFileName = $fname . '.' . $ext;
                        $destination = 'files/' . $newFileName;
                        $moved = move_uploaded_file($file['tmp_name'], $destination);
                        if ($moved) {
                            $this->Sitesetting->updateAll(
                                    array('Sitesetting.value' => $fname), array('Sitesetting.key' => 'Site.musicfile')
                            );
                        }
                    }
                }
            }

            $this->Sitesetting->updateAll(
                    array('Sitesetting.value' => $data['Music']['play']), array('Sitesetting.key' => 'Site.play')
            );
        }
    }

    public function get_extension($file_name) {
        $ext = explode('.', $file_name);
        $ext = array_pop($ext);
        return strtolower($ext);
    }

    public function admin_seostatus() {
        
    }

    public function admin_prostatus() {
        
    }

    public function admin_support() {
        
    }

    public function admin_adduser() {
        $this->set('title_for_layout', 'Admin - Add User');
        $this->loadModel('User');
        // pr($this->request);
        //$userData = array();

        if (!empty($this->request->data) && isset($this->request->data)) {
            if ($this->User->save($this->request->data)) {
                $this->flash_msg(1, 'User Saved');
//                $this->Session->setflash('User Saveed');
                $this->redirect(array('admin' => true, 'controller' => 'Users', 'action' => 'adduser'));
            }
        }
    }

    public function admin_list() {


        $this->set('title_for_layout', 'Admin - User List');

        $users = $this->User->find('all', array(
            'fields' => array(
                'User.id',
                'User.email',
                'User.fname',
                'User.lname',
                'User.type',
                'User.accesskey',
                'User.contact',
                'User.address',
                'User.dob',
                'User.status',
                'User.gender',
                'User.created')
                ,));

        $this->set('listUsers', $users);
//        $totalUsers = count($users); 
//        $this->set('totalUsers',$totalUsers);
    }

    public function admin_delete($id) {
        $this->User->delete($id);
        $this->Session->setFlash('User Deleted');
        $this->redirect(array('controller' => 'Users', 'action' => 'admin_userlist'));
    }

    public function admin_edit($id) {
        $this->set('title_for_layout', 'Admin - Edit User');

        $data = $this->request->data;
        if (isset($data) && !empty($data)) {
            //prd($data);
            if (empty($data['User']['password'])) {
                unset($data['User']['password']);
            }
            //prd($data);
            if ($this->User->save($data)) {
                $this->Session->setFlash("User  update successfully", 'default', 'success');
            } else {
                $this->Session->setFlash("User  cannot be update. Please try again", 'default', 'success');
            }
        }


        $singleUser = $this->User->findById($id);
        unset($singleUser['User']['password']);
        $this->request->data = $singleUser;
    }

    public function admin_sendmail() {
        $this->set('title_for_layout', 'Admin - Send Mail');
        @$checkedId = explode(',', $this->request->data['User']['checkedvalues']);

        $data = $this->request->data;
        @ $to = $data['User']['to'];
        @ $name = $data['User']['name'];
        @ $message = $data['User']['message'];

        if (isset($to) && !empty($to)) {
            $this->send_mail($to, $name, $message);
        } else {
            $this->flash_msg(2, 'Please enter receiver name .. idiot');
        }


        // prd($this->request);
        // prd($checkedId);
    }

    public function plus_login() {
        // prd($this->request);
        $this->layout = 'plus_login';
        $this->set('title_for_layout', 'Plus Login');

        $user = Configure::read('currentUserInfo.Plus');
        // echo $userId;

        if (isset($user['id']) && !empty($user['id'])) {
            $this->redirect($this->Auth->loginRedirect);
        }



        if ($this->request->is('post')) {

            if ($this->Auth->login()) {

                $this->redirect($this->Auth->loginRedirect);
            } else {
                $this->flash_msg(2, 'Username & password incorrect.');
            }
        }
    }

    public function plus_logout() {
        $this->Session->delete('Auth.Plus');
        $this->redirect(array('plus' => true, 'controller' => 'users', 'action' => 'login'));
    }

    public function plus_registration() {

        $this->layout = 'plus_login';
        $this->set('title_for_layout', 'Plus Registration');
        $this->loadModel('PlusRequest');
        // $this->loadModel('User');
        $this->loadModel('EmailContent');
        // prd($this->request->data);
        $data = $this->request->data;
        if (!empty($data) && isset($data)) {
            $data['PlusRequest']['status'] = 0;
            if ($this->PlusRequest->save($data)) {

                $organizationName = $data['PlusRequest']['organization_name'];
                $contactPerson = $data['PlusRequest']['contact_person'];
                $contactEmail = $data['PlusRequest']['contact_email'];
                $contactNumber = $data['PlusRequest']['contact_number'];
                // Initializing Email Model.
                $emailObj = new EmailContent;
                $emailObj->plus_request($organizationName, $contactPerson, $contactEmail, $contactNumber);

                $this->flash_msg(1, 'Thanks for showing interest in CupCherry, We will contact you soon.');
                $this->redirect(array('controller' => 'users', 'action' => 'login'));
            } else {
                $this->flash_msg(2, 'Some error, Please try again.');
                $this->redirect(array('controller' => 'users', 'action' => 'registration'));
            }
        }
    }

    public function plus_dashboard() {
        // $this->layout = 'plus';
        $this->set('title_for_layout', 'Welcome to Cup Cherry Plus');
    }

    public function plus_addmember() {
        $this->set('title_for_layout', 'Add New Member');
        $this->loadModel('User');
        $this->loadModel('EmailContent');
        $user = Configure::read('currentUserInfo.Plus');
        //  prd($user);
        $data = $this->request->data;
        if (isset($data) && !empty($data)) {
            $verifyCode = uniqid();
            $passkey = $data['User']['fname'] . '@123';
            $data['User']['password'] = $passkey;
            $data['User']['confirm_password'] = $passkey;
            $data['User']['type'] = 2;
            $data['User']['created_under'] = $user['id'];
            $data['User']['accesskey'] = $verifyCode;
            $data['User']['status'] = 3;
            $data['User']['profile_status'] = 0;


            $this->User->set($data);
            if ($this->User->validates()) {
                $organ_name = 'XYZ';
                $name = $data['User']['fname'];
                $email = $data['User']['email'];
                $temPassword = $passkey;
                $key = $verifyCode;

                // Initializing Email Model.
                $emailObj = new EmailContent;
                $emailObj->add_member_request($organ_name, $name, $email, $temPassword, $key);
                if ($this->User->save($data)) {
                    $this->flash_msg(3, 'An Email has been send to you member ,Please  verify the email address.');
                    $this->redirect(array('plus' => true, 'controller' => 'users', 'action' => 'addmember'));
                } else {
                    $this->flash_msg(2, 'Some error occured, Please try again.');
                    $this->redirect(array('plus' => true, 'controller' => 'users', 'action' => 'addmember'));
                }
            } else {
                $errors = $this->User->validationErrors;
                $this->set('errors', $errors);
//                if (isset($errors['email'])) {
//                    $this->User->validationErrors['email'][0] = "asds";
//                }
                //prd($errors);
            }
        } else {
            
        }
    }

}
