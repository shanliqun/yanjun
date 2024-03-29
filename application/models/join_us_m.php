<?php
/**
 * 功能：后台-加入我们 -模型 
 * 相关子模块：部门介绍、员工介绍、招聘职位
 * 涉及表格：yj_department_type、yj_employee、yj_job
 * @notice 部门介绍在类别管理里编辑，此处无需编辑，员工和招聘职位只需要和部门关联，每个部门的不同。
 * @author lizzyphy
 * @time 2015.01.16
 *
 */
class Join_us_m extends CI_Model {
	function __construct() 
	{	
		parent::__construct();
		$this->load->database();
		$this->load->library('uploader_ue');
	}
	//获得部门
	public function get_all_department()
	{
	    $query = $this->db->get('yj_department_type');
	    return $query->result_array();
	}
	//获得问题
	public function get_all_question()
	{
	    $query = $this->db->get('yj_join_questions');
	    return $query->result_array();
	}
	//获得问题详情
	public function get_question($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('yj_join_questions');
		$result = $query->row_array();
		return $result;
	}
	//编辑问题
	 public function question_edit($arr)
   	{
	   $this->db->where('id',$arr['id']);
	   $data = array(
	   			'title' => $arr['title'],
				'content' => $arr['content']
	   			);
	   $this->db->update('yj_join_questions',$data);
	   return true;
   	}
	//获得部门名称
	public function get_department_name($did)
	{
		$this->db->where('tid',$did);
		$query = $this->db->get('yj_department_type');
		$result = $query->row_array();
		return $result['name'];
	}
	
	//获得所有员工
	public function get_all_employee()
	{  
		$this->db->order_by('did asc,order_id desc');	
	    $query = $this->db->get('yj_employee');
	    return $query->result_array();
	}
	
	//获得部门信息
	public function get_department($tid)
	{
		$query = $this->db->get_where('yj_department_type', array('tid' => $tid));
	    return $query->row_array();
	}
	public function get_topic()
	{
		$query = $this->db->get_where('yj_topic', array('id' => 4));
	    return $query->row_array();
	}
	//
	public function add_employee($data)
	{
	    if($data['id'] == '') {
			$this->db->select_max('order_id');
			$query = $this->db->get('yj_employee');
			$order = $query->row_array();
			$data['order_id'] = $order['order_id'] + 1;
	        $this->db->insert('yj_employee',$data);
	    } else {
	        $this->db->where('id',$data['id']);
	        $this->db->update('yj_employee',$data);
	    }
	    return TRUE;
	}
	
	public function delete_employee($id)
	{
	    $this->db->where('id',$id);
	    $this->db->delete('yj_employee');
	    return TRUE;
	}
	
	public function get_all_job()
	{
		$this->db->order_by('did asc,order_id desc');
	    $query = $this->db->get('yj_job');
	    return $query->result_array();
	}
	
	public function get_job($id)
	{
	    $this->db->where('id',$id);
	    $query = $this->db->get('yj_job');
	    return $query->row_array();
	}
	
	public function add_job($data)
	{
	    if($data['id'] == '') {
			$this->db->select_max('order_id');
			$query = $this->db->get('yj_job');
			$order = $query->row_array();
			$data['order_id'] = $order['order_id'] + 1;
	        $this->db->insert('yj_job',$data);
	    } else {
	        $this->db->where('id',$data['id']);
	        $this->db->update('yj_job',$data);
	    }
	    return TRUE;
	}
	public function delete_job($id)
	{
	    $this->db->where('id',$id);
	    $this->db->delete('yj_job');
	    return TRUE;
	}
	public function pageConfig($count)
   {
       $config['base_url'] = 'join_us/department';
       $config['total_rows'] = $count;
       $config['per_page'] = 6;
       $config['first_link'] = "首页";
       $config['last_link'] = "末页";
       $config['use_page_numbers'] = TRUE;
       $config['cur_tag_open'] = '<b>';
       $config['cur_tag_close'] = '</b>';
       $this->pagination->initialize($config);
   }
   	public function get_num($table)
	{
		return $this->db->count_all($table);
	}
   
	public function get_list($limit,$offset)
	{
	   $this->db->order_by('did asc,order_id desc');
       $query = $this->db->get('yj_employee',$limit, $offset);
       return $query->result_array();
	}

	public function get_job_list($limit,$offset)
	{
		$this->db->order_by('did asc,order_id desc');
		$query = $this->db->get('yj_job',$limit, $offset);
		return $query->result_array();
	}

	//获得单个员工信息
	public function get_employee($id)
	{
	    $this->db->where('id',$id);
	    $query = $this->db->get('yj_employee');
	    return $query->row_array();
	}
	//获得各部门员工
	public function get_department_employee($did,$limit,$offset)
	{
		$this->db->order_by('order_id','desc');
	    $query = $this->db->get_where('yj_employee', array('did' => $did),$limit, $offset);
		return $query->result_array();
	}
	//获得各部门招聘职位
	public function get_department_job($did,$limit,$offset)
	{
		$this->db->order_by('order_id','desc');
	    $query = $this->db->get_where('yj_job', array('did' => $did),$limit, $offset);
		return $query->result_array();
	}
	public function get_depar_num($did,$table)
	{   
		$this->db->where('did',$did);
		//$this->db->get($table);
		return $this->db->count_all_results($table);
	}
	   
   public function upadate_order($id,$order,$type)
   {
	   $this->db->where('id',$id);
	   $data = array(
	   			'order_id' => $order
	   			);
	   $this->db->update($type,$data);
	   return true;
   }
	
}