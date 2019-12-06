<?php
class Hello extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('BlogModel');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->library('pagination');

		$limit=3;
		$offset = $this->session->userdata('offset');

		if(empty($offset) == false) {
			$offset = $this->session->userdata('offset');
		}else{
			$offset= 0;
		}

		$total_rows = $this->BlogModel->total_blog();

		$config['base_url'] = 'http://localhost/Codeigniter3/hello/offset_blog';
		$config['total_rows'] =  $total_rows;
		$config['per_page'] = $limit;
		$config['cur_page'] = $offset;
		$config['uri_segment'] = 3;

		$this->pagination->initialize($config);
		$data['page'] = $this->pagination->create_links();

		$data['result'] = $this->BlogModel->select_blog($limit,$offset,'');
		$this->load->view('/hello/hello_mypage',$data);
	}

	public function hello_write()
	{
		$this->load->view('/hello/hello_write');
	}

	public function hello_modify($id)
	{
//		if(empty($id) == false){
//			$data['views'] = ;
//		}

		$this->load->view('/hello/hello_modify');
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

	function limit_blog($limit = 3, $offset=0){
		$data['limit'] = $this->input->post('limit');
		$data['offset'] = $offset;
		$this->session->set_userdata($data);
		$this->index();
	}

	function offset_blog($offset = 0)
	{
		$data['offset'] = $offset;
		$this->session->set_userdata($data);
		$this->index();
	}

}
