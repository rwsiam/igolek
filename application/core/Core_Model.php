<?php
/**
* 
*/
class Core_Model extends CI_Model
{
	var $table;
	var $id;
	var $itemPerPage;
	var $currentPage;
	var $totalItem;
	var $totalPage;
	var $searchColumn;

	function __construct()
	{
		parent::__construct();
	}

	/*set table component*/
	public function setTableComponent($tableName, $primaryKey)
	{
		$this->table = $tableName;
		$this->id 	 = $primaryKey;
	}

	/*insert data*/
	public function insert($data = array())
	{
        $this->db->insert($this->table, $data);
        return true;
	}
	/*delete data by id*/
	public function delete_by_id($id)
    {
        $this->db->where($this->id, $id);
        $query  = $this->db->delete($this->table);
        return $query;
    }
    /*update data by something*/
    public function update($where = array(), $data = array())
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    /*select all data on table*/
    public function select_all()
    {
    	$this->db->from($this->table);
    	$query = $this->db->get()->result();
    	return $query;
    }
    /*select data by id*/
    public function select_by_id($id)
    {
    	$this->db->from($this->table);
    	$this->db->where($this->id, $id);
    	$query = $this->db->get();

    	return $query->row();
    }

    /*pagination override function*/

    public function set_component_page($perPage, $currentPage, $totalItem, $totalPage)
    {
    	$this->itemPerPage 	= $perPage;
    	$this->currentPage  = $currentPage;
    	$this->totalItem	= $totalItem;
    	$this->totalPage    = $totalPage;
    }

    public function get_total_items()
    {
    	# code...
    	# please override
    }

    public function get_item_from_page($page, $itemPerPage, $column, $order)
    {
    	# code...
    	# please override
    }

    public function get_pager($totalPage, $currentPage)
    {
    	# code...
    	# please override
    }

    public function get_total_page()
    {
    	return ceil($totalItem/$itemPerPage);
    }
}