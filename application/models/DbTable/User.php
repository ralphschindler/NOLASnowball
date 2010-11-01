<?php

class Application_Model_DbTable_User extends Zend_Db_Table_Abstract
{
	protected $_rowClass = 'Application_Model_User';
    protected $_name = 'user';
}

