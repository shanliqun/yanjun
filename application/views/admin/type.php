<?php echo $this->load->view('admin/common/admin_header'); ?>
      <!--  	后台类别管理页面 -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i><?php echo $type_name;?>类别管理</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt mb">
                  <div class="col-md-12">
                      <section class="task-panel tasks-widget">
	                	<div class="panel-heading">
	                        <div class="pull-left"><h5><i class="fa fa-tasks"></i> <?php echo $type_name;?></h5></div>
                            <?php if($type != 3):?>
                            <a class="btn btn-success btn-sm add_news" href="<?php echo base_url('admin/type/add?type='.$type);?>">添加类别</a>
                            <?php endif;?>
                            <div class="cl"></div>
	                 	</div>
                        <div class="panel-body">
                              <div class="task-content">
                                  <ul id="sortable" class="task-list">
                      			  <?php foreach($types as $row) {?>
                                        	<li <?php switch(((int)$row['tid'])%4){
														case 0: echo "class= \"list-primary list-news \"";break;
														case 1: echo "class= \"list-danger list-news \"";break;
														case 2: echo "class= \"list-success list-news \"";break;
														case 3: echo "class= \"list-warning list-news \"";break;
														default:echo "class= \"list-primary list-news \"";break;
											  		 }?> >
                                            	<div class="task-title">
                                                    <span class="task-title-sp"><?php echo $row['name'];?></span>
                                                    <div class="pull-right hidden-phone">
                                                       <?php if ($type == 2):?>
                                                       		<button class="btn btn-success btn-xs fa fa-book" onclick='location="<?php echo base_url('admin/type/detail?type='.$type.'&tid='.$row['tid']);?>"' title="详情"></button>
													   <?php endif;?>
                                                       <button class="btn btn-primary btn-xs fa fa-pencil" onclick='location="<?php echo base_url('admin/type/edit?type='.$type.'&tid='.$row['tid']);?>"' title="编辑"></button>
                                                        <!--<button class="btn btn-danger btn-xs fa fa-trash-o" onclick='location=delcfm()? "<?php echo base_url('admin/type/delete?type='.$type.'&tid='.$row['tid']);?>" :""' title="删除"></button>-->
                                                     </div>
                                                </div>
                                              </li>
                                  <?php }?>
                        		</ul>
                    		</div>
                  
                            <div class=" add-task-row page_html">
                                <p><?php echo "$link"; ?></p>
                            </div>
                    
                	   </div>
             	  </section>
             </div>
           </div>

	   </section>
    </section>
            
      <!--main content end-->
 <?php echo $this->load->view('admin/common/admin_footer'); ?>    