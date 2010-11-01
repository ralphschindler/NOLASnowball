<?php

class Application_Model_StandRepository
{
	
	public function findById($id)
	{
		$standMapper = new Application_Model_StandMapper();
		return current($standMapper->select(1));
	}
	
	// this is probably a bad idea if there is alot of data
	public function findAll()
	{
		$standMapper = new Application_Model_StandMapper();
		return $standMapper->select();
	}

}

