<?php
App::uses('AppController', 'Controller');

class KeyNotesController extends AppController {

	public $uses = array();
        
        public function beforeFilter() {
        parent::beforeFilter();
            $this->Auth->allow('');
        }

        public function index()
        {
            $this->set('title_for_layout','Eduction');
        } 
}