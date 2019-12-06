<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tpl_exam extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

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

	public function test()
	{
		$this->tpl->define('test', 'test/test.tpl');

		$this->tpl->print_('test');

	}


}
