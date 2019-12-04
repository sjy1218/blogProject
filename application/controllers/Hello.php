<?php
class Hello extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('BlogModel');
	}

	public function index()
	{
		$this->load->library('pagination');

		$limit=3;
		$offset=0;

		$total_rows = $this->BlogModel->total_blog();
		$config['base_url'] = 'http://localhost/Codeigniter3/hello';
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $limit;
		$this->pagination->initialize($config);

		$data['page'] = $this->pagination->create_links();

		$data['result'] = $this->BlogModel->select_blog();
		$this->load->view('/hello/hello_mypage',$data);
	}

	public function hello_write()
	{
		$this->load->view('/hello/hello_write');
	}

	public function insert_writeForm()
	{
		$rdata['category'] = $this->input->post('category');
		$rdata['title'] = $this->input->post('title');
		$rdata['regdate'] = $this->input->post('regdate');
		$rdata['content'] = $this->input->post('content');

		$res = $this->BlogModel->insert_blog($rdata);
		if($res!=true){
			echo "업로드 실패";
		}else{
			echo "업로드 하였습니다";
		}

	}

}
