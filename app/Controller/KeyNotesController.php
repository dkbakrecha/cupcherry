<?php

App::uses('AppController', 'Controller');


class KeyNotesController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('hello');
    }

    public function index() {
        $this->set('title_for_layout', 'Eduction');
        $data = $this->request->data;
        if (isset($data) && !empty($data)) {
            $searchTerm = $data['Keynotes']['searchTerm'];
            $notesData = $this->KeyNote->find('all',array(
                'conditions' => array('KeyNote.title LIKE' => '%' . $searchTerm . '%')
            ));

            $this->set('searchNotes',$notesData);
        }
    }

    public function admin_index() {
        $this->set('title_for_layout', 'Eduction Notes');

        $keyNotesList = $this->KeyNote->find('all');
        $this->set('keyNotesList', $keyNotesList);
    }

    public function admin_add() {
        $this->set('title_for_layout', 'Education Notes');

        $data = $this->request->data;
        if (isset($data) && !empty($data)) {
            if ($this->KeyNote->save($data)) {
                $this->Session->setFlash("Keynote add successfully", 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index', 'admin' => true));
            } else {
                $this->Session->setFlash("Keynoye cannot add. Please Try again", 'default', array('class' => 'alert alert-danger'));
            }
        }

        $listData = array();
        $this->loadModel('Type');
        $this->loadModel('Category');

        $listData['types'] = $this->Type->find('list');
        $listData['categories'] = $this->Category->find('list');

        $this->set('listData', $listData);
    }

    public function create() {
        $this->set('title_for_layout', 'Education Notes');

        $data = $this->request->data;
        if (isset($data) && !empty($data)) {
            $user = $this->__getUserInfo();
           // pr($user);
            $saveData = $data;
            $saveData['KeyNote']['user_id'] = $user['User']['id'];
            
            if ($this->KeyNote->save($saveData)) {
                $this->Session->setFlash("Keynote add successfully", 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'mynotes'));
            } else {
                $this->Session->setFlash("Keynoye cannot add. Please Try again", 'default', array('class' => 'alert alert-danger'));
            }
        }

        $listData = array();
        $this->loadModel('Standard');
        $this->loadModel('Category');

        $listData['Standard'] = $this->Standard->find('list');
        $listData['categories'] = $this->Category->find('list');

        $this->set('listData', $listData);
    }

    public function mynotes() {
        $notesData = $this->KeyNote->find('all',array(
            'conditions' => array('KeyNote.user_id' => $this->user_id)
        ));
        
        $this->set('notesData',$notesData);
    }
    
    public function view($id) {
        $noteData = $this->KeyNote->find('first',array(
            'conditions' => array('KeyNote.id' => $id)
        ));
        
        $this->set('noteData',$noteData);
    }

}
