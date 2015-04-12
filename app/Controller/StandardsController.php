<?php

App::uses('AppController', 'Controller');

class StandardsController extends AppController {

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

        $typeList = $this->Standard->find('all', array(
            'conditions' => array('Standard.status' => array(0, 1)),
            'fields' => array(
                'Standard.id',
                'Standard.title',
                'Standard.updated',
                'Standard.status',
            ),
        ));

        $this->set('typeList', $typeList);
    }

    public function admin_add() {
        $this->set('title_for_layout', 'Admin - Add Class');

        $data = $this->request->data;
        if (isset($data) && !empty($data)) {
            if ($this->Standard->save($data)) {
                $this->Session->setFlash("New Standard add successfully", 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index', 'admin' => true));
            } else {
                $this->Session->setFlash("New Standard cannot be add. Please try again", 'default', array('class' => 'alert alert-danger'));
            }
        }
    }

    public function admin_edit($id = null) {
        $this->set('title_for_layout', 'Admin - Edit Class');
        $data = $this->request->data;

        if (isset($data) && !empty($data)) {
            if ($this->Standard->save($data)) {
                $this->flash_msg("Standard update successfully", 1);
                $this->redirect(array('action' => 'index', 'admin' => true));
            } else {
                $this->flash_msg("Class cannot be update. Please try again", 2);
            }
        }

        $typeContant = $this->Standard->findById($id);

        $this->request->data = $typeContant;
    }

    public function admin_delete($id = null) {
        if (!$id) {
            $this->flash_msg('Invalid access', 2);
            $this->redirect(array('admin' => true, 'controller' => 'standards', 'action' => 'index'));
        }
        $data = array();
        $data['Standard']['id'] = $id;
        $data['Standard']['status'] = 2;
        if ($this->Standard->save($data)) {
            $this->flash_msg('Removed', 1);
            $this->redirect(array('admin' => true, 'controller' => 'standards', 'action' => 'index'));
        }
    }

}
