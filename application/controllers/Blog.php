<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->library('template_', null, 'tpl');
		$this->load->library('session');

		$this->load->helper('url');

		$this->load->model('BlogModel');
	}

	public function index()
	{
		$this->tpl->define('index', 'index.tpl');

        $this->tpl->assign(array(
            'title'  =>'First Template_',
            'content'=>'Hello World!',
        ));

        $this->tpl->print_('index');
	}

	//블로그 메인 페이지
	public function hello_mypage()
	{
		$this->tpl->define(array(
			'head' => 'blog/layout/head.tpl',
			'script' => 'blog/layout/script.tpl',
			'mypage' => 'blog/hello_mypage.tpl'
		));

		$this->load->library('pagination');

		$limit=3;
		$offset = $this->session->userdata('offset');

		if(empty($offset) == false) {
			$offset = $this->session->userdata('offset');
		}else{
			$offset= 0;
		}

		//테이블 전체 갯수 가져오기
		$total_rows = $this->BlogModel->total_blog();

		$config['base_url'] = 'http://localhost/Codeigniter3/blog/offset_blog';
		$config['total_rows'] =  $total_rows;
		$config['per_page'] = $limit;
		$config['cur_page'] = $offset;
		$config['uri_segment'] = 3;

		$this->pagination->initialize($config);
		$page = $this->pagination->create_links();


		//blog 테이블 전체데이터 가져오기
		$result = $this->BlogModel->select_blog($limit,$offset,'');

		$jresult = json_encode($result);

		$this->tpl->assign(array(
			'row' => $jresult,
			'page' => $page
		));

		$this->tpl->print_('mypage');
	}

	//글쓰기
	public function hello_write()
	{
		$this->tpl->define('write', 'blog/hello_write.tpl');

		$this->tpl->print_('write');
	}


	//글쓰기 업로드
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

	function offset_blog($offset = 0)
	{
		$data['offset'] = $offset;
		$this->session->set_userdata($data);
		$this->hello_mypage();
	}

	public function list_mypage(){
		$limit=3;
		$offset = $this->session->userdata('offset');

		if(empty($offset) == false) {
			$offset = $this->session->userdata('offset');
		}else{
			$offset= 0;
		}

		$result = $this->BlogModel->select_blog($limit,$offset,'');
		echo json_encode($result);
	}

}
