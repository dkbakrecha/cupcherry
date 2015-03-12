<?php

App::uses('AppController', 'Controller');

class TypesController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('');
    }

    public function index() {
        $this->set('title_for_layout', 'Eduction');
    }

    public function admin_index() {
        $this->set('title_for_layout', 'Education Standard');

        $typeList = $this->Type->find('all', array(
            'fields' => array(
                'Type.id',
                'Type.title',
                'Type.updated',
                'Type.status',
            )
        ));

        $this->set('typeList', $typeList);
    }

    public function admin_add() {
        $this->set('title_for_layout', 'Admin - Add Class');

        $data = $this->request->data;
        if (isset($data) && !empty($data)) {
            if ($this->Type->save($data)) {
                $this->Session->setFlash("New type add successfully", 'default', array('class'=>'alert alert-success'));
                $this->redirect(array('action' => 'index', 'admin' => true));
            } else {
                $this->Session->setFlash("New Type cannot be add. Please try again", 'default', array('class'=>'alert alert-danger'));
            }
        }
    }

    public function admin_edit($id) {
        $this->set('title_for_layout', 'Admin - Edit Class');
        $data = $this->request->data;

        if (isset($data) && !empty($data)) {
            if ($this->Type->save($data)) {
                $this->Session->setFlash("Class update successfully", 'default', array('class'=>'alert alert-success'));
                $this->redirect(array('action' => 'index', 'admin' => true));
            } else {
                $this->Session->setFlash("Class cannot be update. Please try again", 'default', array('class'=>'alert alert-danger'));
            }
        }

        $typeContant = $this->Type->findById($id);
        $this->request->data = $typeContant;
    }

}
