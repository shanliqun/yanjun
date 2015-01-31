<?php
/**
 * 分页的helper
 * 
 * @author 风格独特
 * @version 1.0 2014-02-28
 */

/**
 * 获取分页的HTML代码
 * 
 * @param number $total_rows
 * @param number $per_page
 * @param string $base_url
 * @return string
 */
 
 //前台分页
function page($total_rows, $per_page = 10, $base_url = NULL)
{
	// 加载CI的pagination类库
	$CI = & get_instance();
	$CI->load->library('pagination');
	
	// 处理base_url
	if ($base_url === NULL) {
		// 获取URI
		$base_url = server('REDIRECT_URL') . '?';
		
		// 获取GET参数，并且剔除参数p，组建新的base_url
		$gets = get();
		
		if ($gets !== FALSE) {
			if (isset($gets['p'])) {
				unset($gets['p']);
			}
			
			if (count($gets) > 0) {
				$query_string = http_build_query($gets);
				$base_url .= $query_string;
			}
		}
	}
	
	// 设置CI的分页配置
	$config = array(
			'base_url'				=> $base_url,
			'per_page'				=> $per_page,
			'total_rows'			=> $total_rows,
			'num_links'				=> 6,
			'query_string_segment'	=> 'p',
			'first_link'			=> false,
			'last_link'				=> false,
			'prev_link'				=> '< Previous',
			'next_link'				=> 'Next >',
			'use_page_numbers'		=> TRUE,
			'page_query_string'		=> TRUE,
			'full_tag_open' 		=> '<div class="page_full">',
			'full_tag_close' 		=> '</div>',
			'num_tag_open'			=> '<div class="page_num">',
			'num_tag_close' 		=> '</div>',
			'cur_tag_open'          => '<a class="current">&nbsp;&nbsp;&nbsp;', // 当前页开始样式
			'cur_tag_close'         => '&nbsp;&nbsp;&nbsp;</a>',
			'prev_tag_open'			=> '<div style="float:left ; margin-left:12px; margin-right:25px">',
			'prev_tag_close' 		=> '</div>',
			'next_tag_open'			=> '<div style="float:left; margin-left:25px; margin-right:12px">',
			'next_tag_close' 		=> '</div>',
	);
	
	// 初始化和返回链接
	$CI->pagination->initialize($config);
	return $CI->pagination->create_links();
}

//后台分页
function page_r($total_rows, $per_page = 10, $base_url = NULL)
{
	// 加载CI的pagination类库
	$CI = & get_instance();
	$CI->load->library('pagination');
	
	// 处理base_url
	if ($base_url === NULL) {
		// 获取URI
		$base_url = server('REDIRECT_URL') . '?';
		
		// 获取GET参数，并且剔除参数p，组建新的base_url
		$gets = get();
		
		if ($gets !== FALSE) {
			if (isset($gets['p'])) {
				unset($gets['p']);
			}
			
			if (count($gets) > 0) {
				$query_string = http_build_query($gets);
				$base_url .= $query_string;
			}
		}
	}
	
	// 设置CI的分页配置
	$config = array(
			'base_url'				=> $base_url,
			'per_page'				=> $per_page,
			'total_rows'			=> $total_rows,
			'num_links'				=> 10,
			'query_string_segment'	=> 'p',
			'first_link'			=> '首页',
			'last_link'				=> '末页',
			'prev_link'				=> '<',
			'next_link'				=> '>',
			'use_page_numbers'		=> TRUE,
			'page_query_string'		=> TRUE,
			'cur_tag_open'          => '<a class="current">', // 当前页开始样式
			'cur_tag_close'         => '</a>',
	);
	
	// 初始化和返回链接
	$CI->pagination->initialize($config);
	return $CI->pagination->create_links();
}


/**
 * 返回当前访问的页码数
 */
function page_cur() 
{
	$p = (int) get('p');
	if ($p < 1) {
		$p = 1;
	}
	return $p;
}
