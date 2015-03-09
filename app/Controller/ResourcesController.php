<?php

App::uses('AppController', 'Controller');

class ResourcesController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('admin_login', 'register', 'add');
    }

    public function admin_add() {
        $this->set('title_for_layout', 'Admin - Add Resources');
        $currentUser = $this->Session->read('Auth.Admin');
        $this->set('currentUser', $currentUser);
        //  prd($this->request);
        $data = $this->request->data;
        $flag = 0;
        if (isset($data) && !empty($data)) {
            $saveData = array();
            $saveData['user_id'] = $currentUser['id'];
            $saveData['title'] = $data['Resource']['title'];
            $saveData['description'] = $data['Resource']['description'];
            $saveData['privacy'] = $data['Resource']['privacy'];
            $saveData['status'] = $data['Resource']['status'];

            if (!empty($data['Resource']['filename']['name'])) {
                //  pr($this->request);
                $file = $data['Resource']['filename'];
                $filename = basename($file['name']);
                if (!empty($file['name'])) {

                    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                    $file_extensions = array('doc', 'docx', 'xls', 'xlxs', 'pdf');
                    if (in_array($ext, $file_extensions)) {
                        $flag = 1;
                        //exit;
                    } else {
                        $flag = 2;
                        // exit;
                    }
                }
            }
        }
        if ($flag == 1) {
            /*  uploading file & redirecting  */
            $newFileName = $currentUser['id'] . '-' . uniqid() . '-' . $filename;
            $destination = RESOURCE_FILE . $newFileName;
            $moved = move_uploaded_file($file['tmp_name'], $destination);

            if ($moved) {
                $saveData['filename'] = $newFileName;
            }
            if ($this->Resource->save($saveData)) {
                $this->flash_msg(1, 'File Uploaded Sucessfully.');
                $this->redirect(array('controller' => 'resources', 'action' => 'add'));
            }
        }
        if ($flag == 2) {
            $this->flash_msg(2, 'Invalid file type.');
        }
    }

    public function admin_view() {
        $this->set('title_for_layout', 'Admin - View Resources');
        $currentUser = $this->Session->read('Auth.Admin');
        $resourceAll = $this->Resource->find('all', array(
            'conditions' => array('Resource.user_id' => $currentUser['id']),
        ));
        $this->set('resourceAll', $resourceAll);
        //prd($resourceAll);
    }

    public function admin_edit($id) {
        $this->set('title_for_layout', 'Admin - Edit Resources');
        $data = $this->request->data;
        if (!empty($data) && isset($data)) {
            if ($this->Resource->save($data)) {
                $this->flash_msg(1, 'Data updated sccuessfully');
                $this->redirect(array('controller' => 'resources', 'action' => 'edit', $id));
            }
            $this->flash_msg(2, 'Data updated failed, Please try again.');
        }

        $data = $this->Resource->findById($id);
        $this->request->data = $data;
    }

    public function admin_delete($id) {
//        if ($this->request->is('get')) {
//            throw new MethodNotAllowedException();
//        }

        $this->Resource->delete($id);
            $this->flash_msg(1,'Record Deleted.');
            $this->redirect(array('controller'=>'resources','action' => 'view'));
       
    }

    public function admin_changeStatus() {
        if ($this->request->is('ajax')) {
            $data = $this->request->data;
            $saveData = array();
            $saveData['id'] = $data['id'];
            $saveData['status'] = $data['status'] == 1 ? 0 : 1;
            if ($this->Resource->save($saveData)) {
                echo '1';
            } else {
                echo '0';
            }
        } else {
            $this->flash_msg(2, 'Unauthorized Access');
            $this->redirect(array('admin' => true, 'controller' => 'users', 'action' => 'dashboard'));
        }
    }

   
    
}
