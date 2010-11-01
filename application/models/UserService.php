<?php

class Application_Model_UserService
{

	public function getById($id)
	{
		$userRepository = new Application_Model_UserRepository();
		return $userRepository->findById($id);
	}
	
}

