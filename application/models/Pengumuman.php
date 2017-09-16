<?php
/**
* Pengumuman Model
*/
class Pengumuman extends Core_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTableComponent('t_pengumuman', 'id_pengumuman');
	}

	public function search($keyword)
	{
		# code...
	}

	public function get_total_items()
    {
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_item_from_page($page, $itemPerPage, $column, $order)
    {
    	$this->db->select('*');
    	$this->db->from('v_pengumuman');
    	$this->db->offset($page);
    	$this->db->limit($itemPerPage);
    	$query = $this->db->order_by($column, $order);
    	return $query->get()->result();
    }

    public function get_pager($totalPage, $currentPage)
    {
    	return "page {$currentPage} of {$totalPage}";
    }

    public function get_count_by_uid($uid)
    {
        $this->db->from('v_pengumuman');
        $this->db->where('username', $uid);
        return $this->db->count_all_results();
    }

}