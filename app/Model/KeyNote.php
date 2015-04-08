<?php
App::uses('AppModel', 'Model');

class KeyNote extends AppModel {
    
    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id'
        )
    );
}