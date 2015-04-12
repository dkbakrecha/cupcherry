<?php

App::uses('Controller', 'Controller');
App::uses('AuthComponent', 'Controller/Component');

class AppController extends Controller {

    public $user_id;
    public $components = array(
        'Session',
        'Auth',
    );
    public $helpers = array(
        'General',
        'Form'
    );

    public function beforeFilter() {
        $currentUserInfo = $this->Session->read('Auth');
        
        if(!empty($currentUserInfo['User'])){
            $this->checkTerms($currentUserInfo['User']);
        }
        
        parent::beforeFilter();
        $this->Auth->allow('account_recovery', 'recovery_token', 'plus_login', 'plus_registration');

        if (isset($this->request->params['admin'])) {
            $this->layout = 'admin';

            $this->Auth->authenticate = array(
                'Form' => array(
                    'fields' => array(
                        'username' => 'email',
                        'password' => 'password',
                    ),
                    'scope' => array(
                        'User.type' => array('0', '1'),
                        'User.status !=' => '2'
                    )
                ),
            );

            // to check session key if we not define this here then is will check with 'Auth.Admin' so dont remove it
            AuthComponent::$sessionKey = 'Auth.Admin';
            $this->Auth->loginAction = array('admin' => true, 'controller' => 'users', 'action' => 'admin_login');
            $this->Auth->loginRedirect = array('admin' => true, 'controller' => 'users', 'action' => 'admin_dashboard');
            $this->Auth->logoutRedirect = array('admin' => true, 'controller' => 'users', 'action' => 'admin_login');
            //  $this->Auth->authorize = 'controller';
        } elseif (isset($this->request->params['plus'])) {
            $this->layout = 'plus';

            /*
             *  Plus login -- Organization Account
             *  Usertype => 4 
             */
            $this->Auth->authenticate = array(
                'Form' => array(
                    'fields' => array(
                        'username' => 'email',
                        'password' => 'password',
                    ),
                    'scope' => array(
                        'User.type' => array('4'),
                        'User.status !=' => '2'
                    )
                ),
            );

            // to check session key if we not define this here then is will check with 'Auth.Plus' so dont remove it
            AuthComponent::$sessionKey = 'Auth.Plus';
            $this->Auth->loginAction = array('plus' => true, 'controller' => 'users', 'action' => 'plus_login');
            $this->Auth->loginRedirect = array('plus' => true, 'controller' => 'users', 'action' => 'plus_dashboard');
            $this->Auth->logoutRedirect = array('plus' => true, 'controller' => 'users', 'action' => 'plus_login');

            $this->commonDataPlus();
        } else {
            /*
             *  Front login
             *  Usertype 
             *      2 => Student (learner)
             *      3 => Teacher 
             *      5 => Guardian
             *      6 => unset (Initial value to type)
             */
            $this->Auth->authenticate = array(
                'form' => array(
                    'fields' => array(
                        'username' => 'email',
                        'password' => 'password',
                    ),
                    'scope' => array(
                        'User.type' => array('2', '3', '5', '6'),
                        'User.status !=' => '2'
                    )
                ),
            );

            AuthComponent::$sessionKey = 'Auth.User';
            $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
            $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'dashboard');
            $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        }

        $currentUserInfo = $this->Session->read('Auth');
        //prd($currentUserInfo);
        
        if (isset($currentUserInfo) && !empty($currentUserInfo)) {
            $this->set('currentUserInfo', $currentUserInfo);
            $this->user_id = $this->Session->read('Auth.User.id');
        }

        Configure::write('currentUserInfo', $currentUserInfo);

        $this->SiteSettings();
        $this->commonDataFront();
    }
    
    public function checkTerms($user){
         /* Conditions for Authorization */
        $req = $this->request;
        $cont = strtolower( $req->params['controller'] );
        $act = strtolower( $req->params['action'] );
        $currentAct = $cont . "_" . $act;
        
        $allowArray = array();
        $allowArray[] = "pages_terms";
        $allowArray[] = "pages_doandnot";
        $allowArray[] = "users_logout";
        
        if($user['terms'] == '0' && in_array($currentAct,$allowArray)){
            return true;
        }elseif($user['terms'] == '0'){
            $this->redirect(array('controller' => 'pages', 'action' => 'terms'));
            $this->response->send();
            $this->_stop();
        }
        
        return true;
    }
    
    public function isAuthorized($user){
        return true;
    }

    /* Function to find users information login */
    public function __getUserInfo($id = null) {
        $this->loadModel('User');
        $user_id = $id;
        if(empty($id)){
            $user_id = $this->Session->read('Auth.User.id');
        }
        
        $userInfo = $this->User->find('first',array(
            'conditions' => array('User.id' => $user_id)
            ));
        return $userInfo;
    }
    
    /* Get user information by email id */
    public function __getUserByMail($email = null) {
        $this->loadModel('User');
        if(empty($email)){
            $email = $this->Session->read('Auth.User.email');
        }
        
        $userInfo = $this->User->find('first',array(
            'conditions' => array('User.email' => $email)
            ));
        return $userInfo;
    }
    
    /* Get Teacher Information by user id */
    public function __getTecherInfo($id){
        
    }

    /* Common function for Flash Messges */
    public function flash_msg($msg, $flag = 1) {
        if ($flag == 1) {
            $this->Session->setFlash($msg, 'default', array('id' => 'success'));
        } elseif ($flag == 2) {
            $this->Session->setFlash($msg, 'default', array('id' => 'danger'));
        } elseif ($flag == 3) {
            $this->Session->setFlash($msg, 'default', array('id' => 'info'));
        } elseif ($flag == 4) {
            $this->Session->setFlash($msg, 'default', array('id' => 'warning'));
        }
    }

    public function commonDataFront() {
        $this->loadModel('Group');
        $this->loadModel('GroupMember');
        
        // Query to fetch all joined groups by current User
        //$user = Configure::read('currentUserInfo.User');
        $user = $this->__getUserInfo();
        //pr($user);
        $groupList = $this->Group->find('all', array(
            'conditions' => array('Group.created_by' => $user['User']['id'], 'Group.status' => 1),
            'fields' => array('id', 'title', 'status'),
        ));
        $this->set('groupList', $groupList);

        $joinedGropus = $this->GroupMember->find('all', array(
            'conditions' => array('GroupMember.user_id' => $user['User']['id'], 'GroupMember.status' => 1),
        ));
        $this->set('joinedGropus',$joinedGropus);
        //  prd($joinedGropus);
//        if($user['created_under'] != 0 && 1){
//           // $this->loadModel('Organization');
//            $org = $this->Organization->find('first',array(
//                'conditions'=> array(
//                    'Organization.user_id' => $user['created_under'],
//                    'Organization.status' => 1)
//            ));
//            $this->set('org',$org);
//            //prd($org);
//        }
        $orgGrps = $this->Group->find('all',array(
            'conditions' => array(
                'Group.managed_by' => $user['User']['id'],
                'Group.created_by' => $user['UserProfile']['created_under'],
                'Group.status' => 1),
        ));
        
        $this->set('orgGrps',$orgGrps);
       // prd($orgGrps);
        
    }

    public function commonDataPlus() {
        $this->loadModel('Standard');
        $this->loadModel('Category');

        $types = $this->Standard->find('all', array(
            'conditions' => array('Standard.status' => 1),
            'fields' => array('id', 'title', 'description', 'status')
        ));
        $this->set('types', $types);

        $categories = $this->Category->find('all', array(
            'conditions' => array('Category.status' => 1),
            'fields' => array('id', 'title', 'description', 'status'),
        ));
        $this->set('categories', $categories);
    }

    protected function SiteSettings() {
        $this->loadModel('Sitesetting');
        $site_settings = $this->Sitesetting->find('all', array(
            'fields' => array('key', 'value'),
                )
        );

        foreach ($site_settings as $each_setting) {
            Configure::write($each_setting['Sitesetting']['key'], $each_setting['Sitesetting']['value']);
        }
        $adminEmail = Configure::read('Site.email');
        Configure::write('ADMIN_MAIL', $adminEmail);
    }

    public function send_mail($to = null, $name = null, $message) {
        // $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->webroot . "users/login/";
        //$message = 'Hi,' . $name /* . ', Your Password is: ' . $pass */;
        App::uses('CakeEmail', 'Network/Email');
        $email = new CakeEmail('gmail');
        $email->from('jsoni2016@gmail.com');
        $email->to($to);
        $email->subject('Mail Checking -  Cup Cherry Team');
        $email->send($message /* . " " . $confirmation_link */);
    }

}
