<?php

class Organization extends AppModel {

    var $name = 'Organization';
    
    //public $hasOne = 'OrganizationProfile';
         public $hasOne = array(
        'OrganizationProfile' => array(
            'className' => 'OrganizationProfile',
            //'foreignKey' =>'managed_by',
            'conditions' => array('OrganizationProfile.status' => 1,)
        )
    );
   

}
