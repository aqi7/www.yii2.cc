<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
table.hovertable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #999999;
	border-collapse: collapse;
}
table.hovertable th {
	background-color:#c3dde0;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.hovertable tr {
	background-color:#d4e3e5;
}
table.hovertable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
</style>

<!-- Table goes in the document BODY -->
<table class="hovertable">

<tr>
	<th>账号</th>
	<th>电话</th>
	<th>问题</th>
	<th>地址</th>
	<th>时间</th>
	<th>操作人</th>
	<th>状态</th>
	<th>任务等级</th>
</tr>
<?php foreach($query as $vo) { ?>
<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	<td><?= $vo['u_name']?></td>
	<td><?= $vo['u_call']?></td>
	<td><?= $vo['u_wt']?></td>
	<td><?= $vo['u_dz']?></td>
	<td><?= $vo['u_time']?></td>
	<td><?= $vo['caozuo']['c_name']?></td>
	<td><?= $vo['type']['type']?></td>
	<td><?= $vo['u_rw']?></td>
</tr>
<?php  } ?>
</table>

<style type="text/css">
#winpop {
 width:200px;
 height:0px;
 position:absolute;
 right:0;
 bottom:0;
 border:1px solid #666;
 margin:0;
 padding:1px;
 overflow:hidden;
 display:none;
}
#winpop .title{
 width:100%;
 height:22px;
 line-height:20px;
 background:#FFCC00;
 font-weight:bold;
 text-align:center;
 font-size:12px;
}
#winpop .con{
 width:100%;
 height:90px;
 line-height:80px;
 font-weight:bold;
 font-size:12px;
 color:#FF0000;
 text-decoration:underline;
 text-align:center
}
#silu{
 font-size:12px;
 color:#666;
 position:absolute;
 right:0;
 text-decoration:underline;
 line-height:22px;
}
.close{
 position:absolute;
 right:4px;
 top:-1px;
 color:#FFF;
 cursor:pointer
}
</style>
<script type="text/javascript">
function tips_pop(){
 var MsgPop=document.getElementById("winpop");
 var popH=parseInt(MsgPop.style.height);//将对象的高度转化为数字
 if(popH==0){
 MsgPop.style.display="block";//显示隐藏的窗口
 show=setInterval("changeH('up')",2);
 }
 else{ 
 hide=setInterval("changeH('down')",2);
 }
}
function changeH(str){
 var MsgPop=document.getElementById("winpop");
 var popH=parseInt(MsgPop.style.height);
 if(str=="up"){
 if(popH<=100){
 MsgPop.style.height=(popH+4).toString()+"px";
 }
 else{ 
 clearInterval(show);
 }
 }
 if(str=="down"){ 
 if(popH>=4){ 
 MsgPop.style.height=(popH-4).toString()+"px";
 }
 else{ 
 clearInterval(hide); 
 MsgPop.style.display="none"; //隐藏DIV
 }
 }
}
window.onload=function(){
 var oclose=document.getElementById("close");
 var bt=document.getElementById("bt");
 document.getElementById('winpop').style.height='0px';
 setTimeout("tips_pop()",3000);
 oclose.onclick=function(){tips_pop()}
 bt.onclick=function(){tips_pop()}
}
</script>

<div id="winpop">
 <div class="title">您有新的短消息！<span class="close" id="close">X</span></div>
 <div class="con">您有未读消息</div>
</div>

