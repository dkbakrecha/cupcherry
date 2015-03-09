<?php
App::uses('AppController', 'Controller');

class TypesController extends AppController {
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
        
            $typeList = $this->Type->find('all',array(
                'fields' => array(
                    'Type.id',
                    'Type.title',
                    'Type.updated',
                    'Type.status',
                    )
                ));

            $this->set('typeList', $typeList);
	}
        
	public function admin_edit($id) {
            $this->set('title_for_layout','Admin - Edit CMS Pages');
        
            $data = $this->request->data;
            if(isset($data) && !empty($data)){
               
       
               if($this->CmsPage->save($data)){
                   $this->Session->setFlash("CMS Content  update successfully", 'default', 'success');
                   $this->redirect(array('action' => 'index', 'admin' => true));
               }else{
                   $this->Session->setFlash("CMS Content  cannot be update. Please try again", 'default', 'success');
               }
            }

            $cmsContant  = $this->CmsPage->findById($id);
            
            $this->request->data = $cmsContant;
	}
}