<?php echo $this->load->view('admin/common/admin_header'); ?>
      <!-- **********************************************************************************************************************************************************
      		后台新闻列表页面
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>新闻管理</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt mb">
                  <div class="col-md-12">
                      <section class="task-panel tasks-widget">
	                	<div class="panel-heading">
	                        <div class="pull-left"><h5><i class="fa fa-tasks"></i> 新闻列表</h5></div>
                            <form class="my_search" method="post" action="<?php echo base_url('admin/news?test=1');?>" role="search">
                            	<div class="form-group">
                                	<input class="form-control" type="text" name="search" placeholder="请输入关键字搜索"/>
                                </div>
                            </form>
                            <a class="btn btn-success btn-sm add_news" href="<?php echo base_url('admin/news/add_v');?>">添加新闻</a>
                            <div class="cl"></div>
	                 	</div>
                          <div class="panel-body">
                              <div class="task-content">
                                  <ul id="sortable" class="task-list">
									<?php foreach ($news as $news): ?>
                                      <li <?php
										       switch(((int)$news['id'])%4){
													case 0: echo "class= \"list-primary list-news \"";break;
													case 1: echo "class= \"list-danger list-news \"";break;
													case 2: echo "class= \"list-success list-news \"";break;
													case 3: echo "class= \"list-warning list-news \"";break;
													default:echo "class= \"list-primary list-news \"";break;
											   }
										 ?>
										>
										  <div class="task-title">
                                          	<div class="task-title-sp pull_left" style="width:5%;">
                                              	<?php echo $news['order_id']; ?>
                                              </div>
                                              <div class="task-title-sp pull_left list_title">
                                              	<?php echo $news['title']; ?>
                                              </div>
                                              <div class=" pull_left list_time">
	                                              <?php if(!empty($news['images'])) :?>
												  	  <img src="<?php echo base_url($news['images']);?>" width="80" height="48"/>
												  <?php else:?>
												  	  <img src=" " width="80" height="48"/>
											      <?php endif;?>
                                              </div>
                                              <div class="task-title-sp pull_left list_time">
                                              	  发布时间：&nbsp;<?php echo date('Y-m-d',$news['add_date']); ?>
                                              </div>
                                              <div class="pull-right hidden-phone">
                                              	  <a href="<?php echo base_url('admin/news/news_detail?id='.$news['id'].'&p='.$p);?>" title="详情">
                                                  	    <button class="btn btn-success btn-xs fa fa-book"></button>
                                                  </a>
                                                  <a onclick="up_img(<?php echo $news['order_id'];?>,<?php echo $news['id'];?>)" title="调序">
													<button class="btn btn-info btn-xs fa fa-retweet"></button> 
                                                  </a>
                                                  <a href="<?php echo base_url('admin/news/edit_v?id='.$news['id'].'&p='.$p);?>" title="编辑">
                                                  		<button class="btn btn-primary btn-xs fa fa-pencil"></button> 
                                                  </a>
                                                  <a onclick="return del_alert()" href="<?php echo base_url('admin/news/del?id='.$news['id'].'&p='.$p);?>" title="删除">   
                                                  		<button class="btn btn-danger btn-xs fa fa-trash-o"></button> 
                                                  </a>
                                              </div>
                                              <div class="cl"></div>
                                          </div>
                                      </li>
									<?php endforeach;?>               
                                  </ul>
                              </div>
                              <div class=" add-task-row page_html">
                                  <?php echo $page_html;?>
                              </div>
                          </div>
                          
                      </section> 
              <form action="<?php echo base_url('admin/news/set_order');?>" method="post" enctype="multipart/form-data">
                  <div id="img_up" style="display:none;">
                    <div class="pic_div">						
                        <span class="up_word">排序</span>
                        <span class="up_input"><input id="order" name="order" type="text" value="" size="5" class="form-control"/></span>
                        <div class="cl"></div>
                    </div>
                    <input type="hidden" id="pid" name="pid" value="" />
                     <div class="button_img">
                        <button onclick="return is_empty()" type="submit" class="btn btn-success">提交</button>
                        <button onclick="return close_button()" class="btn btn-danger">关闭</button>
                    </div>
                 </div>
             </form>
                  </div><!--/col-md-12 -->
              </div><!-- /row -->
		</section> <!--/wrapper -->
      </section>
	  <script type="text/javascript">
		function del_alert(){
			return confirm('删除操作不可恢复，确定删除么？');
		}
		function is_empty() {
			if($('#order').val() == '') {
				alert('请填入顺序');
				return false;
			}
		}
		function up_img(order,id) {
			$("#order").val(order);
			$("#pid").val(id);
			$("#img_up").show();
		}
		function close_button() {
			$("#img_up").hide();
			return false;
		}
	  </script>
      <!--main content end-->
 <?php echo $this->load->view('admin/common/admin_footer'); ?>    