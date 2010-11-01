<?php

class Application_Model_UserRepository
{

	public function add(User $user)
	{
		// todo
	}
	
	public function removeByUserId($id)
	{
		// todo
	}
	
	/**
	 * @param int $id
	 * @return User
	 */
	public function findById($id)
	{
		$userMapper = new Application_Model_UserMapper();
		return $userMapper->find($id);
	}
	
}

