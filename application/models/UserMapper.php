<?php

class Application_Model_UserMapper
{
	protected $_map = array(
		'id' => 'id',
		'first_name' => 'firstName',
		'last_name' => 'lastName',
		'role' => 'role'
		);

		
	public function find($id)
	{
		$userTable = new Application_Model_DbTable_User();
		$rowset = $userTable->select(true)->where('id = ?', $id)->query(); // returns a statement
		$userData = $rowset->fetch();
		$user = new Application_Model_User();
		$user->setId($userData['id']);
		$user->setFirstName($userData['first_name']);
		$user->setLastName($userData['last_name']);
		$user->setRole($userData['role']);
		return $user;
	}
}

