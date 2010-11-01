<?php

class Application_Model_StandMapper
{
	protected $_map = array(
		'id' => 'id',
		'name' => 'name',
		'address' => 'address',
		'city' => 'city',
		'state' => 'state',
		'zip_code' => 'zipCode'
		);
	
	public function select($where = null)
	{
		$standTable = new Application_Model_DbTable_Stand();
		$select = $standTable->select(true);
		if ($where) {
			$select->where($where);
		}
		$resultset = array();
		foreach ($select->query() as $row) {
			$stand = new Application_Model_Stand();
			foreach ($this->_map as $dataSourceName => $modelName) {
				$stand->{'set' . $modelName}($row[$dataSourceName]);
			}
			$resultset[] = $stand;
		}
		return $resultset;
	}
	
	public function insert()
	{}
	
	public function delete()
	{}
	
	public function update()
	{}

}

