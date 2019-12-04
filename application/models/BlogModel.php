<?php

class BlogModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();

	}

	public function select_blog()
	{
//		$sql="select id,regdate,title,category,content from blog";

		$query = $this->db->select()->from('blog')->get();
		$result = $query->result();
		return $result;
	}

	public function insert_blog($data)
	{

		$category = $data['category'];
		$title = $data['title'];
		$regdate = $data['regdate'];
		$content = $data['content'];

		$sql="insert into blog set category='{$category}', title='{$title}', regdate='{$regdate}', content='{$content}'";
		$this->db->query($sql);

		return ($this->db->affected_rows() != 1) ? false : true;
	}

}
?>
