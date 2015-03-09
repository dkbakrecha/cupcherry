<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('admin_login', 'register', 'add','signup');
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
            $data['User']['accesskey'] = "USER".  uniqid();
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
        $this->set('title_for_layout', 'Login');
        
        $user = $this->Session->read('Auth');
        // prd($user);
        if (isset($user['id']) && !empty($user['id'])) {
            $this->redirect($this->Auth->loginRedirect);
        }



        if ($this->request->is('post')) {
            //prd($this->Auth);
           // prd($user);
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->loginRedirect);
            }

            $this->Session->setFlash(__('Incorrect Username or Password'));
        }
    }
    
    public function logout(){
        $this->Session->delete('Auth.User');
        $this->redirect(array('controller' => 'users', 'action' => 'login'));
    }
    
    public function dashboard() {

    }


    public function admin_index() {
        
    }

    public function admin_dashboard() {
        $this->set('title_for_layout', 'Welcome to Admin Panel');
    }

    public function admin_login() {
        $this->layout = 'login';
        $this->set('title_for_layout', 'Education - Admin Panel');
        //prd(AuthComponent::password("123456"));
        $user = $this->Session->read('Auth.Admin');
        //  prd($user);
        if (isset($user['id']) && !empty($user['id'])) {
            $this->redirect($this->Auth->loginRedirect);
        }


        if ($this->request->is('post')) {
            
            //if ($user['type'] == 0) {
                if ($this->Auth->login()) {

                    $this->redirect($this->Auth->loginRedirect);
                }
            //} else {
            //    $this->Session->setFlash(__('Not Authorized'));
           // }

            $this->Session->setFlash(__('Incorrect Username or Password'));
        }
    }

    function admin_logout() {
        $this->Session->delete('Auth.Admin');
        $this->redirect(array('controller' => 'Users', 'action' => 'admin_login', 'admin' => true));
    }

    public function admin_settings() {
        $this->set('title_for_layout','Admin - Site Settings');
        $this->loadModel('Sitesetting');
        //prd($this->request);
        if (!empty($this->request->data)) {
            if ($this->Sitesetting->saveAll($this->request->data['Sitesetting'])) {
                    $this->flash_msg(1,'Websetings have been edited');
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
                $this->flash_msg(1,'User Saved');
//                $this->Session->setflash('User Saveed');
                $this->redirect(array('admin' => true, 'controller' => 'Users', 'action' => 'adduser'));
            }
        }
    }
    public function admin_list(){
        
        
        $this->set('title_for_layout','Admin - User List');
        
        $users = $this->User->find('all',array(
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
    }
    
    public function admin_delete($id)
    {
        $this->User->delete($id);
        $this->Session->setFlash('User Deleted');
        $this->redirect(array('controller'=>'Users','action'=>'admin_userlist'));
    }
    
    public function admin_edit($id)
    {
        $this->set('title_for_layout','Admin - Edit User');
        
        $data = $this->request->data;
        if(isset($data) && !empty($data)){
            //prd($data);
           if(empty($data['User']['password'])){
               unset($data['User']['password']);
           }
           //prd($data);
           if($this->User->save($data)){
               $this->Session->setFlash("User  update successfully", 'default', 'success');
               
           }else{
               $this->Session->setFlash("User  cannot be update. Please try again", 'default', 'success');
           }
        }
        
        $singleUser  = $this->User->findById($id);
        unset($singleUser['User']['password']);
        $this->request->data = $singleUser;
    }
    
    public function admin_sendmail(){
        $this->set('title_for_layout', 'Admin - Send Mail');
        @$checkedId = explode(',',$this->request->data['User']['checkedvalues']) ;
        
        $data = $this->request->data;
        @ $to = $data['User']['to'];
        @ $name = $data['User']['name'];
        @ $message = $data['User']['message'];
        
       if(isset($to)&& !empty($to) ){
        $this->send_mail($to, $name, $message);   
       }else
       {
           $this->flash_msg(2,'Please enter receiver name .. idiot');
       }
        
        
       // prd($this->request);
       // prd($checkedId);
        
    }

 
    
}
