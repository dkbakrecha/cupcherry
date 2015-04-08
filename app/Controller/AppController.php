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
                        'User.type' => array('0','1'),
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
        
        //$this->Auth->authorize = array('Controller');
        
        
        if (isset($currentUserInfo) && !empty($currentUserInfo)) {
            $this->set('currentUserInfo', $currentUserInfo);
            $this->user_id = $this->Session->read('Auth.User.id');
        }

        Configure::write('currentUserInfo', $currentUserInfo);

        //$this->checkTerms($currentUserInfo['User']);
        $this->SiteSettings();
        $this->commonData();
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

    public function __getUser() {
        $currentUserInfo = $this->Session->read('Auth.User');
        return $currentUserInfo;
    }

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

    public function commonData() {
        $this->loadModel('Group');
        $this->loadModel('GroupMember');
        // Query to fetch all joined groups by current User
        $userId = Configure::read('currentUserInfo.User.id');

        $groupList = $this->Group->find('all', array(
            'conditions' => array('Group.created_by' => $userId, 'Group.status' => 1),
            'fields' => array('id', 'title', 'status'),
        ));
        $this->set('groupList', $groupList);
        //  prd($groupList);

        $joinedGropus = $this->GroupMember->find('all', array(
            'conditions' => array('GroupMember.user_id' => $userId, 'GroupMember.status' => 1),
        ));
        $this->set('joinedGropus', $joinedGropus);
        //  prd($joinedGropus);
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
