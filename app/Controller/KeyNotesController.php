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
        
        public function admin_index() {
            $this->set('title_for_layout','Eduction Notes');
            
            $keyNotesList = $this->KeyNote->find('all');
            $this->set('keyNotesList', $keyNotesList);
	}
        
        public function admin_add() {
            $this->set('title_for_layout', 'Education Notes');

            $data = $this->request->data;
            if (isset($data) && !empty($data)) {
                if ($this->KeyNote->save($data)) {
                    $this->Session->setFlash("Keynote add successfully", 'default', array('class'=>'alert alert-success'));
                    $this->redirect(array('action' => 'index', 'admin' => true));
                } else {
                    $this->Session->setFlash("Keynoye cannot add. Please Try again", 'default', array('class'=>'alert alert-danger'));
                }
            }
            
            $listData = array();
            $this->loadModel('Type');
            $this->loadModel('Category');
            
            $listData['types'] = $this->Type->find('list');
            $listData['categories'] = $this->Category->find('list');
            
            $this->set('listData',$listData);
        }
}