<?php $this->load->view('common/common_header'); ?>
	<div id="newsecond">
        <div class="pic_div">
        	<div id="pic">
                <ul>
                <?php foreach($imgs as $img): ?>
                	<li><img src="<?php echo base_url($img['path']);?>" width=986 height=410/></li>
            	<?php endforeach; ?>
                </ul>
            </div>
            <div id="tip">
                <a class="pic_left" onclick="change(1)"></a>
                <a class="pic_right" onclick="change(0)"></a>
            </div>
        </div>
        <div id="news_middle">
        <div class="news_left">
        	<?php 
				if(isset($test)){
					$title = $title;
					$content = $content;
				}else{
					$title = $news[0]['title'];
					$content = $news[0]['content'];
				}
			?>
        	<div class="news_title" id="news_title"><?php echo $title;?></div>
            <div class="news_content" id="news_content">
         		<?php echo $content;?>
				<!-- <img src="<?php echo base_url('static/image/news_detail.png');?>" width=528 height=334/>
	            <img src="<?php echo base_url('static/image/news_detail.png');?>" width=528 height=334/>
	            <img src="<?php echo base_url('static/image/news_detail.png');?>" width=528 height=334/> -->
            </div>
        </div>
        <div class="news_right">
        <?php foreach ($news as $new):?>
        	<div class="news_list">
				<div class="news_list_word">
                	<?php echo $new['title'];?>
                </div>
                <div class="news_list_img">
                	<img src="<?php echo base_url($new['images']);?>" width=200 height=190/>
                </div>
                <a href="javascript:void(0);" class="fade" onclick="get_single_news(<?php echo $new['id'];?>)"></a><br />
                <div class="share">
                	<img class="pic1" src="<?php echo base_url('static/image/pic1.png');?>" width='22' height='22'/>
                    <div class="share_1">
                        <div class="qq_share">
                            <script type="text/javascript">
                                (function(){
                                    var p = {
                                    url:location.href, /*获取URL，可加上来自分享到QQ标识，方便统计*/
                                    desc:'', /*分享理由(风格应模拟用户对话),支持多分享语随机展现（使用|分隔）*/
                                    title:'<?php echo $new['title'];?>', /*分享标题(可选)*/
                                    summary:'<?php echo mb_substr( strip_tags($new['content']),0,100,'utf-8');?>', /*分享摘要(可选)*/
                                    pics:'<?php echo base_url($new['images']);?>', /*分享图片(可选)*/
                                    flash: '', /*视频地址(可选)*/
                                    site:'', /*分享来源(可选) 如：QQ分享*/
                                    style:'102',
                                    width:63,
                                    height:24
                                    };
                                    var s = [];
                                    for(var i in p){
                                    s.push(i + '=' + encodeURIComponent(p[i]||''));
									//s.push(i + '=' + p[i]||'');
                                    }
                                    document.write(['<a class="qcShareQQDiv" href="http://connect.qq.com/widget/shareqq/index.html?',s.join('&'),'" 	target="_blank">分享到QQ</a>'].join(''));
                })();
                            </script>
                        </div>
                        <div class="weibo_share">
                            <wb:share-button appkey="4BD8Tl" addition="simple" type="button" size="big" width="63" height="26" title="<?php echo $new['title'];?>" pic="<?php echo base_url($new['images']);?>"></wb:share-button>
                        </div>
                        
                    </div>
                </div> 
            </div>
        <?php endforeach;?>
        </div>
        <div class="cl" style="height:0px"></div>
      </div>
    </div>
    <div class="main_page">
    	<?php echo $page_html;?>
    </div>
    
<?php $this->load->view('common/common_footer'); ?> 