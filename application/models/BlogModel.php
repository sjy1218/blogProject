<?php

class BlogModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();

	}

	public function select_blog($limit,$offset,$id)
	{
		$query = $this->db->get('blog',$limit,$offset);
		if(isset($id) == false){
			$query .= $this->db->where('id',$id);
		}
		$result = $query->result();
		return $result;
	}

	public function total_blog()
	{
		$query = $this->db->select()->from('blog')->get();
		$row = $query->num_rows();
		return $row;
	}

	public function insert_blog($data)
	{
		$category = $data['category'];
		$title = $data['title'];
		$regdate = $data['regdate'];
		$content = $data['content'];

		$idata = array(
			'category' => $category,
			'title' => $title,
			'regdate' => $regdate,
			'content' => $content
		);

		$this->db->insert('blog', $idata);

		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function select_test(){
		$query = $this->db->get('blog');
		$result = $query->result();
		return $result;
	}

}
?>
