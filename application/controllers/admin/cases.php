<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 后台案例管理控制器
 * 
 * @author lyb
 * @version 1.0 2015-01-19
 */
class Cases extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('login_m');
		$this->load->library('uploader_ue');

		// 先验证登录
		$id = $this->login_m->check_login();
		if ($id < 0 || $id == FALSE) {
			redirect('admin/login');
		}		
		$this->load->model('cases_m');
		$this->load->model('type_m');
		$this->load->helper('form');
	}
	
	//获取表格数据，显示案例列表
	public function index()
	{
		if($_POST || $this->input->get('test') == 1) {
			if($_POST) {
				$msg = array('str' => '');
				$this->session->unset_userdata($msg);
				$msg = array('str' => $this->input->post('search'));
				$this->session->set_userdata($msg);
			}
			$str = $this->session->userdata('str');
			$per_page = 7; 
			$p = (int) page_cur();	// 获取当前页码
			$data['p'] = $p;
			$data['cases'] = $this->cases_m->search_list($str,$per_page,$per_page*($p-1));
			$data['page_html']	  =	page_r($this->cases_m->search_num($str), $per_page);
			$data['username'] = $this->session->userdata('username');
			$this->load->view('admin/cases_list',$data);
			
		}else{
			$per_page = 7;
			$p = (int) page_cur();	// 获取当前页码
			$data['p'] = $p;
			$data['cases'] = $this->cases_m->get_list($per_page,$per_page*($p-1)); 
			$data['page_html']	  =	page_r($this->cases_m->get_num(), $per_page);
			$data['username'] = $this->session->userdata('username');
			$this->load->view('admin/cases_list',$data);
		}
	}
	
	public function detail()
	{
		$data['p'] = (int) page_cur();	// 获取当前页码
		$data['username'] = $this->session->userdata('username');
		$data['id'] = (int) $this->input->get('id');
		$data['cases'] = $this->cases_m->get($data['id']);
		if($data['cases'] === FALSE) {
			redirect('admin/cases');
		}
		$this->load->view('admin/cases_detail.php', $data);
	}
	//删除新闻
	public function del() 
	{
		$p = (int) page_cur();	// 获取当前页码
		$id = (int) $this->input->get('id');
		if($id < 1) {
			redirect('admin/cases');
		}
		$this->cases_m->del($id);
		redirect('admin/cases?p='.$p);  
	}
	
	//添加新闻
	public function add() 
	{
		$name = $this->input->post('name');
		$project = $this->input->post('project');
		$config = array(
	    			"pathFormat" => "upload/{yyyy}{mm}{dd}/{time}{ss}" ,
	    			"maxSize" => 50000000 , //单位B
	    			"allowFiles" => array( ".gif" , ".png" , ".jpg" , ".jpeg" , ".bmp"  )
	    	);
		//添加图片
    	$pic = new Uploader_ue( "pic" , $config);
    	$info = $pic->getFileInfo();
    	if($info['state'] == 'SUCCESS') {
    		$images = $info['url'];
    	} else {
    		$images = '';
    	}
		sleep(1);
		//添加logo
		$logopic = new Uploader_ue( "logopic" , $config);
    	$logoinfo = $logopic->getFileInfo();
    	if($logoinfo['state'] == 'SUCCESS') {
    		$logo = $logoinfo['url'];
    	} else {
    		$logo = '';
    	}
		
		$content = $this->input->post('ue_content');
		$abstract = $this->input->post('ue_abstract');
		$date = $this->input->post('date');
		$tid = json_encode($this->input->post('case_type'));
		//var_dump($tid);
		$this->cases_m->add($name, $project, $images, $logo, $content,$abstract,$date,$tid);
		redirect('admin/cases');
	}
	
	public function add_v() 
	{
		$data['username'] = $this->session->userdata('username');
		$data['name'] = '';
		$data['project'] = '';
		$data['content'] = '';
		$data['abstract'] = '';
		$data['tid'] = array();
		$data['images'] = '';
		$data['logo'] = '';
		$data['date'] = '';
		$data['form_url'] = 'admin/cases/add';
		$data['types'] = $this->type_m->get_all(3);
		$this->load->view('admin/cases_add', $data);
	}
	
	//编辑新闻
	public function edit() 
	{
		$p = (int) page_cur();	// 获取当前页码
		$id = (int) $this->input->get('id');
		$data['name'] = $this->input->post('name');
		$data['project'] = $this->input->post('project');
		$data['tid'] = json_encode($this->input->post('case_type'));
		$old_images = $this->cases_m->get_url($id,'images');
		$config = array(
    			"pathFormat" => "upload/{yyyy}{mm}{dd}/{time}{ss}" ,
    			"maxSize" => 50000000 , //单位KB
    			"allowFiles" => array( ".gif" , ".png" , ".jpg" , ".jpeg" , ".bmp"  )
	    );
		//添加图片
    	$pic = new Uploader_ue( "pic" , $config);
    	$info = $pic->getFileInfo();
    	if($info['state'] == 'SUCCESS') {
    		$data['images'] = $info['url'];
    	} else {
    		$data['images'] = $old_images;
    	}
		sleep(1);
		$old_logo = $this->cases_m->get_url($id,'logo');
		//添加logo
		$logopic = new Uploader_ue( "logopic" , $config);
    	$logoinfo = $logopic->getFileInfo();
    	if($logoinfo['state'] == 'SUCCESS') {
    		$data['logo'] = $logoinfo['url'];
    	} else {
    		$data['logo'] = $old_logo;
    	}
		$data['content'] = $this->input->post('ue_content');
		$data['date'] = $this->input->post('date');
		if($data['name'] === FALSE || $data['content'] === FALSE) {
			redirect('admin/cases');
		}
		$data['abstract'] = $this->input->post('ue_abstract');
		if($data['name'] === FALSE || $data['abstract'] === FALSE) {
			redirect('admin/cases');
		}
		$this->cases_m->edit($id, $data);
		redirect('admin/cases?p='.$p);
	}

	public function edit_v() 
	{
		$id = (int) $this->input->get('id');
		$data = $this->cases_m->get($id);
		if($data === FALSE) {
			redirect('admin/cases');
		}
		$data['tid'] = json_decode($data['tid']);
		$data['p'] = (int) page_cur();	// 获取当前页码
		$data['username'] = $this->session->userdata('username');
		$data['id'] = $id;
		$data['types'] = $this->type_m->get_all(3);
		$data['form_url'] = 'admin/cases/edit?id=' . $data['id'].'&p='.$data['p'];
		
		$this->load->view('admin/cases_add.php', $data);
	}
	
	public function set_order()
	{
		$id = $this->input->post('pid');
		$order = $this->input->post('order');
		$this->cases_m->upadate_order($id,$order);
		redirect('admin/cases');
	}
}