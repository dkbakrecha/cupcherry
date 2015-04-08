<?php
App::uses('AppController', 'Controller');

class FavoritesController extends AppController {

	public function beforeFilter() {
	 	parent::beforeFilter();
		$this->Auth->allow('index');
  	}
	
        /* Function for favorite keynotes */
	public function doKeynotes() {
		$this->loadModel('KeyNoteFavorite');
                $user_id = $this->user_id;
                $keyNote_id = $this->request->data['id'];
		//prd($this->request);
		if(!isset($keyNote_id) || empty($keyNote_id)){
			//Correct Message
			$this->redirect(array('admin' => false, 'controller' => 'key_notes', 'action' => 'index'));
		}else{
			$con = array();
			$con['KeyNoteFavorite.keynote_id'] = $keyNote_id;
			$con['KeyNoteFavorite.user_id'] = $user_id;
			$fevRow  =  $this->KeyNoteFavorite->find('all',array('conditions' => $con));
			
			if(empty($fevRow)){
                                //Insert New Faverite
				$nData['KeyNoteFavorite']['keynote_id'] = $keyNote_id;
				$nData['KeyNoteFavorite']['user_id'] = $user_id;
				$nData['KeyNoteFavorite']['status'] = 1;
				
				$nSave = $this->KeyNoteFavorite->save($nData);
				echo "1";
				exit;
			}else{
				$nData['KeyNoteFavorite']['id'] = $keyNote_id;
				$nData['KeyNoteFavorite']['keynote_id'] = $this->request->query['id'];
				$nData['KeyNoteFavorite']['user_id'] = $user_id;
				
				if($fevRow[0]['KeyNoteFavorite']['status'] == 1){
					$nData['KeyNoteFavorite']['status'] = 0;
					$nSave = $this->KeyNoteFavorite->save($nData);
					echo "0";
					exit;
				}else{
					$nData['KeyNoteFavorite']['status'] = 1;
					$nSave = $this->KeyNoteFavorite->save($nData);
					echo "1";
					exit;
				}
			}
		}
	}
}