<?php
/**
* User Model
*/
class User extends Core_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTableComponent('m_user', 'username');
	}
}