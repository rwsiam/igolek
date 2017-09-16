<?php
/**
* Login Model
*/
class Login extends Core_Model
{
	function __construct()
	{
		parent::__construct();
		$this->setTableComponent('m_login', 'id_login');
	}

	public function get_auth($email, $password)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('m_user', "{$this->table}.username = m_user.username");
		$this->db->where('email', $email);
		$this->db->where('password', sha1($password));
		$this->db->where('status',1);
		return $this->db->get()->row();
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