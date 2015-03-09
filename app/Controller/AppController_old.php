<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array(
        'Session',
        'Auth',
    );
    public $helpers = array(
        'General',
    );

    public function beforeFilter() {
        parent::beforeFilter();
        

        if (isset($this->request->params['admin'])) {
            $this->layout = 'admin';
            
            $this->Auth->authenticate = array(
                'Form' => array(
                    'fields' => array(
                        'username' => 'email',
                        'password' => 'password',
                    ),
                    'scope' => array('User.type' => 0)
                ),
            );

            // to check session key if we not define this here then is will check with 'Auth.User' so dont remove it
            AuthComponent::$sessionKey = 'Auth.Admin';
            $this->Auth->loginAction = array('admin' => true, 'controller' => 'Users', 'action' => 'admin_login');
            $this->Auth->loginRedirect = array('admin' => true, 'controller' => 'Users', 'action' => 'admin_dashboard');
            $this->Auth->logoutRedirect = array('admin' => true, 'controller' => 'Users', 'action' => 'admin_login');
        } else {
            
            $this->Auth->authenticate = array(
                'Form' => array(
                    'fields' => array(
                        'username' => 'email',
                        'password' => 'password',
                    ),
                    'scope' => array('User.type' => array(1,2))
                ),
            );
            
            // to check session key if we not define this here then is will check with 'Auth.User' so dont remove it
            AuthComponent::$sessionKey = 'Auth.User';
            $this->Auth->loginAction = array('controller' => 'Users', 'action' => 'login');
            $this->Auth->loginRedirect = array('controller' => 'Users', 'action' => 'dashboard');
            $this->Auth->logoutRedirect = array('controller' => 'Users', 'action' => 'login');
        }

        //$this->Auth->allow('index');
        $this->SiteSettings();
        //$this->commonData();
    }

    public function flash_msg($flag = NULL, $msg) {
        if ($flag == 1) {
            $this->Session->setFlash($msg, 'default', array('class' => 'alert alert-success'));
        } elseif ($flag == 2) {
            $this->Session->setFlash($msg, 'default', array('class' => 'alert alert-danger'));
        }
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
    
    
       public function send_mail($to = null, $name = null,$message) {
       // $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->webroot . "users/login/";
        //$message = 'Hi,' . $name /* . ', Your Password is: ' . $pass */;
        App::uses('CakeEmail', 'Network/Email');
        $email = new CakeEmail('gmail');
        $email->from('jsoni2016@gmail.com');
        $email->to($to);
        $email->subject('Mail Checking -  Cup Cherry Team');
        $email->send($message /* . " " . $confirmation_link*/ );
    }
    

}
