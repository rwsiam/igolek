<?php
/**
* Rating Model
*/
class Rating extends Core_Model
{
	
	function __construct()
	{
		perent::__construct();
		$this->setTableComponent('t_rating', 'id_rating');
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
    	$this->db->from($this->table);
    	$this->db->join('m_user', "{$this->table}.username = m_user.username");
    	$this->db->offset($page);
    	$this->db->limit($itemPerPage);
    	$query = $this->db->order_by($column, $order);
    	return $query->get()->result();
    }

    public function get_pager($totalPage, $currentPage)
    {
    	return "page {$currentPage} of {$totalPage}";
    }
}