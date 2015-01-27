<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About_us extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('about_us_m');
		$this->load->model('topic_m');
		$this->load->model('news_m');
	}
	
	
	public function index()
	{	
		$per_page = 7;
		$p = (int) page_cur();	// 获取当前页码
		$data['p'] = $p;
		$data['news']  = $this->news_m->get_list($per_page,$per_page*($p-1));
		$data['page_html']	  =	page($this->news_m->get_num(), $per_page);
		$type = 2;
		$data['title'] = "我喜欢";
		$data['result'] = $this->about_us_m->get_all($type);
		$data['res_topic'] = $this->topic_m->get_all();
		$this->load->view('about_us',$data);
	}
}