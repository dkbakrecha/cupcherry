<?php

App::uses('AppController', 'Controller');

class FaqsController extends AppController {

    public $uses = array();
    public $helpers = array(
        'General',
    );

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('about', 'contact_us', 'faq');
    }

    public function admin_index() {
        $this->set('title_for_layout', 'Admin - FAQ Page');
        $this->loadModel('FaqCategory');
        // prd($this->request);

        if (isset($this->data['FaqCategory'])) {
            if (!empty($this->data)) {
                $this->FaqCategory->save($this->data['FaqCategory']);
                $this->Session->setFlash('Data Saved');
                $this->redirect(array('controller' => 'faqs', 'action' => 'admin_index'));
            }
        }
        if (isset($this->data['Faq']) && !empty($this->data['Faq'])) {
            if (!empty($this->data)) {
                $this->Faq->save($this->data);
                $this->Session->setFlash('Data Saved');
                $this->redirect(array('controller' => 'faqs', 'action' => 'admin_index'));
            }
            $this->Session->setFlash('Data Not Saved');
        }

        $cateAll = $this->FaqCategory->find('all', array(
            'conditions' => array('FaqCategory.status' => 1),
        ));
        $this->set('cateAll', $cateAll);
    }

    public function index($cate = 'general') {
        $this->loadModel('FaqCategory');
        $this->loadModel('Faq');

        $categories = $this->FaqCategory->find('all', array(
            'conditions' => array('FaqCategory.status' => '1'),
            'fields' => array('FaqCategory.*'),
            'order' => array('order')
        ));

        $faqList = $this->Faq->find('all', array(
            'conditions' => array(
                'Faq.status' => '1',
                'FaqCate.faq_category_title' => $cate
                ),
            'fields' => array('Faq.*', 'FaqCate.*'),
            'joins' => array(
                array('table' => 'faq_categories',
                    'alias' => 'FaqCate',
                    'type' => 'INNER',
                    'conditions' => array(
                        'Faq.faq_category_id = FaqCate.id',
                    )
                )
            ),
            'order' => array('Faq.order')
        ));
        
        $this->set('categories', $categories);
        $this->set('faqList', $faqList);
        $this->set('cate',$cate);
    }

    public function admin_list() {
        $this->set('title_for_layout', 'Admin - FAQ View');
        // $this->loadModel('FaqCategory');
        $faqAll = $this->Faq->find('all', array('joins' => array(
                array(
                    'table' => 'faq_categories',
                    'alias' => 'faq_cat',
                    'type' => 'inner',
                    // 'foreignKey' => true, 
                    'conditions' => array(' faq_cat.id = Faq.faq_category_id  ')
                ),
            ), 'fields' => '*',
//         'group' => array('faq.id')
        ));


        $this->set('faqAll', $faqAll);
    }

    public function admin_edit($id) {
        $this->set('title_for_layout', 'Admin - Faq Edit');
        $this->loadModel('FaqCategory');


        $cateAll = $this->FaqCategory->find('all', array(
            'conditions' => array('FaqCategory.status' => 1),
        ));
        $this->set('cateAll', $cateAll);

        $data = $this->request->data;
        if (empty($data)) {
            $this->data = $this->Faq->read(null, $id);
        } elseif ($this->Faq->save($this->data)) {
            $this->flash_msg(1, 'Data Saveds');
            //$this->Session->setFlash('Data Saved');
            $this->redirect(array('controller' => 'faqs', 'action' => 'edit', $id));
        } else {

            $this->flash_msg(2, 'Data not Saved');
            //$this->Session->setFlash('Data not saved');
        }
    }

    public function admin_delete($id) {

        $this->Faq->delete($id);
        $this->flash_msg(1, 'Data Saved');
        // $this->Session->setFlash('Data Deleted. ');
        $this->redirect(array('controller' => 'faqs', 'action' => 'admin_list'));
    }

}
