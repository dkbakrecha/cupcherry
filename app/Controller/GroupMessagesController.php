<?php

App::uses('AppController', 'Controller');

class GroupMessagesController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('admin_login', 'register', 'add');
    }

  
   
    
}
