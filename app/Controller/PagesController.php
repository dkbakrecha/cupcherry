<?php
App::uses('AppController', 'Controller');

class PagesController extends AppController {

	public $uses = array();
        
        public function beforeFilter() {
        parent::beforeFilter();
            // Allow users to register and logout.
            $this->Auth->allow('index','about','contact_us','faq','howitworks');
        }

        public function index()
        {
            $this->layout = 'homenew';            
            $this->set('title_for_layout','Eduction');
            $user = $this->Session->read('Auth.User.id');
            if(isset($user['id']) && !empty($user['id'])){
                $this->redirect(array('controller'=>'users','action'=>'dashboard'));
            }
            
            $this->loadModel('CmsPage');
            $cmsData = $this->CmsPage->find('all',array(
                    'conditions' => array('parent_key' => 'HOMEPAGE')
                ));
            
        }
        public function test(){
            
        }
        
        public function about() {
            $this->set('title_for_layout','About us');
            $this->loadModel('CmsPage');
            $cmsData = $this->CmsPage->find('all',array(
                'conditions' =>  array('unique_name' => 'ABOUT_US')
                ));
            
            //pr($cmsData);
            $this->set('cmsData',$cmsData[0]);
	}
        
        public function howitworks() {
            $this->set('title_for_layout','About us');
            $this->loadModel('CmsPage');
            $cmsData = $this->CmsPage->find('all',array(
                'conditions' =>  array('unique_name' => 'HOW_IT_WORKS')
                ));
            
            //pr($cmsData);
            $this->set('cmsData',$cmsData[0]);
	}
        
        public function contact_us()
	{		
		if($this->request->is('post') || !empty($this->request->data))
		{
				$this->loadModel('ContactUs');
				$this->ContactUs->set($this->request->data);
				
				if($this->ContactUs->validates()){
					$this->loadModel('EmailContent');
					$this->EmailContent->_ContactUs($this->request->data['ContactUs']['email'],Configure::read('Site.email'),$this->request->data['ContactUs']['name'],$this->request->data['ContactUs']['message']);	
				
					$this->Session->setFlash(__('Mail successfully sent.'), 'default', array(),'success');
					$this->redirect(array('controller'=>'pages','action' => 'contact_us'));									
				}
		}
	}
        
        public function faq() {
                $this->loadModel('FaqCategory');
		$this->loadModel('Faq');
		
		$categories  = $this->FaqCategory->find('all',array(
			'recursive' => -1,			
			'conditions' => array('FaqCategory.status' => '1'),
				'fields' => array('FaqCategory.*'),
				'order' =>array('order')
		
		));
		
		//pr($categories); 
		$i=0; 
		foreach($categories as $c)
		{
			$faqs  = $this->Faq->find('all',array(
				'recursive' => -1,
				'conditions' => array('Faq.status' => '1','Faq.faq_category_id'=>$c['FaqCategory']['id']),
					'fields' => array('Faq.id','Faq.title','Faq.content','Faq.order',''),
					'order' =>array('order')
			));
				$j=0;
				foreach($faqs as $rec)
				{
					$categories[$i]['Faq'][$j]['title']=$rec['Faq']['title'];
					$categories[$i]['Faq'][$j++]['content']=$rec['Faq']['content'];
				}
			$i++;	
			}
		$this->set('categories',$categories);	
	}
}