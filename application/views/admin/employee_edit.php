<?php echo $this->load->view('admin/common/admin_header'); ?>
      <!-- **********************************************************************************************************************************************************
      		后台添加和编辑新闻页面
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>员工管理</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt mb">
                  <div class="col-md-12">
                      <section class="task-panel tasks-widget">
	                	<div class="panel-heading">
	                        <div class="pull-left"><h5><i class="fa fa-tasks"></i> 编辑员工信息</h5></div>
	                        <a href="<?php echo base_url('admin/join_us/employee?p='.$p);?>">
	                        	<button class="btn btn-theme03 back_botton pull-right">返回</button>
	                        </a>
                            <div class="cl"></div>
	                 	</div>
                        <div class="panel-body">
                        	<form class="form-horizontal style-form" method="post" action="<?php echo base_url($form_url);?>" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">员工姓名</label>
                                      <div class="col-sm-5">
                                          <input type="text" name="employee_name" id="employee_name" class="form-control" value="<?php echo $employee['employee_name'];?>">
                                      </div>
                                      <div class="cl"></div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">员工工号</label>
                                      <div class="col-sm-5">
                                           <input type="text" name="employee_id" id="employee_id" class="form-control" value="<?php echo $employee['employee_id'];?>">
                                      </div>
                                      <div class="cl"></div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">员工部门</label>
                                      <div class="col-sm-5">
                                           <select name="employee_department" id="employee_department" style="margin-top: 5px;">
                                               <?php foreach ($departments as $department):?>
                                                    <option value = "<?php echo $department['tid'];?>" <?php if($employee['did'] == $department['tid']) {echo "selected";}?>><?php echo $department['name'];?></option>
                                               <?php endforeach;?>
                                           </select>
                                      </div>
                                      <div class="cl"></div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">员工照片</label>
                                      <div class="col-sm-10">
                                      	   <p class="give_notice">jpg图片规格：240*240！</p>
                                           <?php if(!empty($employee['pic'])) :?>
										      <img src="<?php echo base_url($employee['pic']);?>" width="80" style="margin-top:10px;"/>
										   <?php endif;?>
                                           <input type="file" name="pic" />
                                      </div>
                                      <div class="cl"></div>
                                  </div>
                                  <div class="form-group">
                                      <<label class="col-sm-2 col-sm-2 control-label">员工签名</label>
                                      <div class="col-sm-10">
                                      	   <p class="give_notice">jpg图片规格：268*90！</p>
                                           <?php if(!empty($employee['signature'])) :?>
										      <img src="<?php echo base_url($employee['signature']);?>" width="80" style="margin-top:10px;"/>
										   <?php endif;?>
                                           <input type="file" name="sign" />
                                      </div>
                                      <div class="cl"></div>
                                  </div>                                
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">座右铭</label>
                                      <div class="col-sm-10">
                                      <p class="give_notice">座右铭不超过120个字！</p>
                                          <textarea oninput="if(value.length>120) value=value.substr(0,120)" id="ue_content" name="ue_content" rows='5' cols='70'><?php echo $employee['motto'];?></textarea>
                                      </div>
                                      <div class="cl"></div>
                                  </div>
                                 
                                  <div class=" add-task-row page_html">
                                     <button onclick="return is_empty()" type="submit" class="btn btn-theme03 news_botton">提交</button>
                                      <button type="reset" class="btn btn-theme03 news_botton" onclick='window.location.reload();'>重置</button>
                                  </div>
                              </form>
                          </div>
                      </section>
                  </div><!--/col-md-12 -->
              </div><!-- /row -->
		</section> <!--/wrapper -->
      </section>
      <script type="text/javascript">
		  function is_empty(){
			var employee_name = $('#employee_name').val();
			if(employee_name ==""){
				alert("姓名不能为空！");
				return false;
			}
			var employee_id = $('#employee_id').val();
			if(employee_id ==""){
				alert("工号不能为空！");
				return false;
			}
			var employee_department = $('#employee_department').val();
			if(employee_department ==""){
				alert("所属部门不能为空！");
				return false;
			}
			if($('#ue_content').val() == ""){
				alert("座右铭不能为空！");
				return false;
			}				
		 }
    </script>
      <!--main content end-->
 <?php echo $this->load->view('admin/common/admin_footer'); ?>    