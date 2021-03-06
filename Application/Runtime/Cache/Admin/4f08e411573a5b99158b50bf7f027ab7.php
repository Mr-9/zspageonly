<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/public/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/public/Public/Admin/css/info-mgt.css" />
<link rel="stylesheet" href="/public/Public/Admin/css/WdatePicker.css" />
<title>移动办公自动化系统</title>
</head>

<body>
<div class="title"><h2>信息管理</h2></div>
<div class="table-operate ue-clear">
	<a href="javascript:;" class="add">添加</a>
    <a href="javascript:;" class="del">删除</a>
    <a href="javascript:;" class="edit">编辑</a>
    <a href="javascript:;" class="count">统计</a>
    <a href="javascript:;" class="check">审核</a>
</div>
<div class="table-box">
	<table>
    	<thead>
        	<tr>
            	<th class="num">序号</th>
                <th class="name">姓名</th>
                <th class="process">电话</th>
                <th class="node">所属队列</th>
                <th class="time">备注</th>
                <th class="operate">修改</th>
                <!-- <th class="operate">删除</th> -->
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
            	<td class="num"><?php echo ($vol["id"]); ?></td>
                <td class="name"><?php echo (str_repeat('&emsp;',$vol["level"])); echo ($vol["name"]); ?></td>
                <td class="process"><?php echo ($vol["tel"]); ?></td>
                <td class="node"><?php echo ($vol["sort"]); ?></td>
                <td class="time"><?php echo ($vol["remark"]); ?></td>
                <td class="operate">
                    <a href="/public/index.php/Admin/Dept/edit/id/<?php echo ($vol["id"]); ?>">编辑</a>
                </td>
                <!-- <td class="operate">
                    <input type="checkbox" class="deptid" value="<?php echo ($vol["id"]); ?>"/>
                </td> -->
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>    
    </table>
</div>
<div class="pagination ue-clear">
    <?php echo ($show); ?>
</div>
</body>
<script type="text/javascript" src="/public/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/public/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/public/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript" src="/public/Public/Admin/js/jquery.pagination.js"></script>
<script type="text/javascript">
$(".select-title").on("click",function(){
	$(".select-list").hide();
	$(this).siblings($(".select-list")).show();
	return false;
})
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(this).parent($(".select-list")).siblings($(".select-title")).find("span").text(txt);
})

// $('.pagination').pagination(100,{
// 	callback: function(page){
// 		alert(page);	
// 	},
// 	display_msg: true,
// 	setPageNo: true
// });

$("tbody").find("tr:odd").css("backgroundColor","#eff6fa");

showRemind('input[type=text], textarea','placeholder');

$(function(){
    //给删除元素绑定点击事件
    $('.del').on('click',function(){
    //事件处理程序
        var idObj = $(':checkbox:checked');
        var id = '';    //接收处理后的部门id值。。。
        //循环遍历idObj对象，获取其中的每一个值
        for(var i = 0;i<idObj.length;i++){
            id += idObj[i].value+',';
        }
        //去掉最后的逗号
        id = id.substring(0,id.length-1);
        // console.log(id);
        //带着参数跳转到del方法
        window.location.href = '/public/index.php/Admin/Dept/del/id/'+id;
    })

})
</script>
</html>