<!--function:公共footer文件--> 
<!--author:lizzyphy-->     
    
    </div><!--主要内容层结束-->
    <div class="main_footer" id="main_contact"><!--footer开始-->
    	<div class="main_footer_left">
        	<div class="main_footer_tel">Brand Tel:&nbsp;4001-606-909</div>
            <div class="main_footer_address">
            	<div class="main_footer_address1">
                	晏钧设计/河北石家庄
                </div>
                <div class="main_footer_address2">
                	Add:河北省石家庄市广安大街16号美东国际C座2708</br>PC:050011&nbsp;&nbsp;&nbsp;&nbsp;Mail:777@yanjun.net
                </div>
                <div class="main_footer_address3">
                	<a href="<?php echo base_url('/index/map?type=1'); ?>"><input type="button" value="查看地图"/></a>
                </div>
                <div class="cl"></div>
            </div>
            <!--<div class="main_footer_address">
            	<div class="main_footer_address1">
                	晏钧设计/北京
                </div>
                <div class="main_footer_address2">
                	Add:北京市朝阳区东三环中39号建外SOHO2号楼0501</br>PC:100022
                </div>
                <div class="main_footer_address3">
                	<a href="<?php echo base_url('/index/map?type=2'); ?>"><input type="button" value="查看地图"/></a>
                </div>
                <div class="cl"></div>
            </div>-->
            <div class="main_footer_corp">
            	<div class="main_footer_corp1">
                	产业投资合作伙伴
                </div>
                <div class="main_footer_corp2">
                	<a href="<?php echo $partners[0]['content']; ?>"><?php echo $partners[0]['type']; ?></a>
                    <a href="<?php echo $partners[1]['content']; ?>"><?php echo $partners[1]['type']; ?></a>
                    <a href="<?php echo $partners[2]['content']; ?>"><?php echo $partners[2]['type']; ?></a>
                    <a href="<?php echo $partners[3]['content']; ?>"><?php echo $partners[3]['type']; ?></a>
                    <a href="<?php echo $partners[4]['content']; ?>"><?php echo $partners[4]['type']; ?></a>
                    
                
                </div>
                <div class="cl"></div>
            </div>
        </div>
        <div class="main_footer_right">
        	<div class="main_footer_er">
            	<img src="<?php echo base_url('static/image/footer2.png');?>" />
                <p><晏钧设计微信公众号></p>
            </div>
            <div class="main_footer_er">
            	<img src="<?php echo base_url('static/image/footer3.png');?>" />
                <p style="padding-left:5px;"><晏钧设计电子名片></p>
            </div>
            <div class="cl"></div>
            <div class="main_footer_copyright">
                <div>©1994-2012 YANJUN DESIGN.ALL Rights Reserved </div>
                <div style="padding-left:85px;">  冀ICP备0507081号</div>
            </div>
            <div class="cl"></div>
        </div>
        <div class="cl"></div>
    </div><!--footer结束-->
    
</body>
</html>