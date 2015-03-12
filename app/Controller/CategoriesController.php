<?php
App::uses('AppController', 'Controller');

class CategoriesController extends AppController {
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
            $this->set('title_for_layout','Education Standard');
        
            $cateList = $this->Category->find('all',array(
                'fields' => array(
                    'Category.id',
                    'Category.title',
                    'Category.updated',
                    'Category.status',
                    )
                ));

            $this->set('cateList', $cateList);
	}
        
        public function admin_add() {
            $this->set('title_for_layout','Admin - Add Category');
        
            $data = $this->request->data;
            if(isset($data) && !empty($data)){
               if($this->Category->save($data)){
                   $this->Session->setFlash("Category add successfully", 'default', 'success');
                   $this->redirect(array('action' => 'index', 'admin' => true));
               }else{
                   $this->Session->setFlash("Category cannot be add. Please try again", 'default', 'success');
               }
            }
	}
        
	public function admin_edit($id) {
            $this->set('title_for_layout','Admin - Edit Category');
            $data = $this->request->data;
            
            if(isset($data) && !empty($data)){
               if($this->Category->save($data)){
                   $this->Session->setFlash("Category update successfully", 'default', 'success');
                   $this->redirect(array('action' => 'index', 'admin' => true));
               }else{
                   $this->Session->setFlash("Category cannot be update. Please try again", 'default', 'success');
               }
            }

            $cateContant  = $this->Category->findById($id);
            $this->request->data = $cateContant;
        }        
}