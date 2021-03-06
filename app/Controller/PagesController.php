<?php

App::uses('AppController', 'Controller');

class PagesController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('index', 'about', 'contact', 'faq', 'howitworks', 'terms');
    }

    public function index() {
        $this->layout = 'homenew';
        $this->set('title_for_layout', 'Eduction');

        $user = $this->Session->read('Auth.User.id');
        $userddd = $this->Session->read('Auth');
        //prd($userddd);
        if (isset($user['id']) && !empty($user['id'])) {
            //prd($user['id']);
            $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
        }

        $this->loadModel('CmsPage');
        $cmsData = $this->CmsPage->find('all', array(
            'conditions' => array('parent_key' => 'HOMEPAGE')
        ));
    }

    public function about() {
        $this->layout = "cmsContent";
        $this->set('title_for_layout', 'About us');
        $this->loadModel('CmsPage');
        $cmsData = $this->CmsPage->find('all', array(
            'conditions' => array('unique_name' => 'ABOUT_US')
        ));

        //pr($cmsData);
        $this->set('cmsData', $cmsData[0]);
    }

    public function howitworks() {
        $this->layout = "cmsContent";
        $this->set('title_for_layout', 'How It Works | CupCherry');
        $this->loadModel('CmsPage');
        $cmsData = $this->CmsPage->find('all', array(
            'conditions' => array('unique_name' => 'HOW_IT_WORKS')
        ));

        $this->set('cmsData', $cmsData[0]);
    }

    public function contact() {
        $this->set('title_for_layout', 'Contact Us');
        $this->layout = "cmsContent";
        if ($this->request->is('post') || !empty($this->request->data)) {
            $this->loadModel('ContactUs');
            $data = $this->request->data;
            prd($data);
            $this->ContactUs->set($this->request->data);

            if ($this->ContactUs->validates()) {
                $this->loadModel('EmailContent');
                $this->EmailContent->_ContactUs($this->request->data['ContactUs']['email'], Configure::read('Site.email'), $this->request->data['ContactUs']['name'], $this->request->data['ContactUs']['message']);

                $this->Session->setFlash(__('Mail successfully sent.'), 'default', array(), 'success');
                $this->redirect(array('controller' => 'pages', 'action' => 'contact_us'));
            }
        }
    }

    public function faq() {
        $this->layout = "cmsContent";
        $this->loadModel('FaqCategory');
        $this->loadModel('Faq');

        $categories = $this->FaqCategory->find('all', array(
            'recursive' => -1,
            'conditions' => array('FaqCategory.status' => '1'),
            'fields' => array('FaqCategory.*'),
            'order' => array('order')
        ));

        //pr($categories); 
        $i = 0;
        foreach ($categories as $c) {
            $faqs = $this->Faq->find('all', array(
                'recursive' => -1,
                'conditions' => array('Faq.status' => '1', 'Faq.faq_category_id' => $c['FaqCategory']['id']),
                'fields' => array('Faq.id', 'Faq.title', 'Faq.content', 'Faq.order', ''),
                'order' => array('order')
            ));
            $j = 0;
            foreach ($faqs as $rec) {
                $categories[$i]['Faq'][$j]['title'] = $rec['Faq']['title'];
                $categories[$i]['Faq'][$j++]['content'] = $rec['Faq']['content'];
            }
            $i++;
        }
        $this->set('categories', $categories);
    }

    public function terms() {
        $this->layout = "cmsContent";
        $this->set('title_for_layout', 'Terms of Use | CupCherry');
        $this->loadModel('CmsPage');
        $cmsData = $this->CmsPage->find('all', array(
            'conditions' => array('unique_name' => 'TERMS')
        ));

        $this->set('cmsData', $cmsData[0]);
    }

    public function terms_accept() {
        $this->loadModel('User');
        $user['id'] = Configure::read('currentUserInfo.User.id');
        $user['terms'] = Configure::read('currentUserInfo.User.terms');
        $user['status'] = Configure::read('currentUserInfo.User.status');
        //prd($user);
        if ($user['terms'] == 1) {
            $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
        }
        $save['User']['id'] = $user['id'];
        $save['User']['terms'] = 1;
        if ($this->User->save($save)) {
            $this->Session->write('Auth.User.terms', $save['User']['terms']);
            $this->flash_msg('Welcome to Cupcherry', 1);
            $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
        } else {
            $this->flash_msg('Some error updating terms, please try again', 1);
            $this->redirect(array('controller' => 'users', 'action' => 'logout'));
        }
    }

    public function plus_types() {
        $this->set('title_for_layout', 'Types');
    }

    public function plus_categories() {
        $this->set('title_for_layout', 'Categories');
    }

    public function plus_help() {
        $this->set('title_for_layout', 'Help');
    }

}
