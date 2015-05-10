// JavaScript Document
$(function() {
	//$( "#sort2" ).sortable();
});

$(document).ready(function() {
    $(".btn").each(function() {
		$(this).mouseenter(function(){
			$(this).children('.g_hid').css("display","block");
		});
	});
});

function is_empty() {
	if($('#order').val() == '') {
		alert('请填入顺序');
		return false;
	}
}
function up_img(order,id,tid) {
	$("#order").val(order);
	$("#pid").val(id);
	$("#type_select option").each(function() {
		if($(this).val() == tid) {
			$(this).attr('selected','selected');
		}
	});
	$("#img_up").show();
}
function close_button() {
	$("#img_up").hide();
	return false;
}

//删除提醒函数
function del_alert(){
	return confirm('删除操作不可恢复，确定删除么？');
}
//侧边栏保持
$(document).ready(function(){
    var pn = location.pathname;
	var ty = getUrlParm("type");
	$("#nav-accordion a").each(function(n) {
		var b = $(this).attr("id");
		if (pn.indexOf(b) != -1){
			$(this)[0].className = 'active';
		}	
    });
	$("#nav-accordion li ul a").each(function(n) {
		var b = $(this).attr("id");
		if (pn.indexOf(b) != -1){
			$(this)[0].className = 'focus1';
			$(this).parent('li').parent('.sub').css('display','block');
			$(this).parent('li').parent('.sub').prev(".dcjq-parent").addClass("active");            
		}
    });
	if(pn.indexOf('general') != -1) {
		$("#general ul a").each(function(n) {
			var tn = $(this).attr('type');
			if( ty == tn) {
				$(this)[0].className = 'focus1';
				$(this).parent('li').parent('.sub').css('display','block');
				$(this).parent('li').parent('.sub').prev(".dcjq-parent").addClass("active");   
			}
		});
	}
	if(pn.indexOf('type') != -1) {
		$("#type ul a").each(function(n) {
			var tn = $(this).attr('type');
			if( ty == tn) {
				$(this)[0].className = 'focus1';
				$(this).parent('li').parent('.sub').css('display','block');
				$(this).parent('li').parent('.sub').prev(".dcjq-parent").addClass("active");   
			}
		});
	}
});

/*
 * 加参数搜索
 */
function getUrlParm(name){
	var regexS = "[\\?&]"+name+"=([^&#]*)" ;
	var regex = new RegExp( regexS ) ;
	var tmpURL = window.location.href ;
	var results = regex.exec( tmpURL ) ;
	if( results == null )
	{
	  return "" ;
	}
	else
	{
	  return results[1] ; 
	}	
}