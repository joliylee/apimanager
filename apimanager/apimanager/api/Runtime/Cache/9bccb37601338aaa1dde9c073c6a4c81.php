<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>api manager tool</title>
		<meta name="description" content="">
	    <meta name="author" content="">

		<link rel="stylesheet" href="__ROOT__/res/css/bootstrap.css">
		<link rel="stylesheet" href="__ROOT__/res/css/bootstrap-responsive.css">
		<link rel="stylesheet" href="__ROOT__/res/css/jquery-linedtextarea.css">
		<link rel="stylesheet" href="__ROOT__/res/css/prettify.css">
		
		<link rel="stylesheet" href="__ROOT__/res/css/global.css">

		<script type="text/javascript" src="__ROOT__/res/js/jquery-1.8.2.js"></script>
		<script type="text/javascript" src="__ROOT__/res/js/bootstrap.js"></script>
		<script type="text/javascript" src="__ROOT__/res/js/jquery-linedtextarea.js"></script>
		<script type="text/javascript" src="__ROOT__/res/js/jQuery.md5.js"></script>
		<script type="text/javascript" src="__ROOT__/res/js/jsl.format.js"></script>
		
		<script type="text/javascript" src="__ROOT__/res/js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="__ROOT__/res/js/global.js"></script>
	</head>

	<body>
		<!-- navi bar
		==================================================== -->
		<div class="navbar navbar-inverse navbar-fixed-top">
		  <div class="navbar-inner">
		    <div class="container">
		        <ul class="nav">
		        	<li class="active"><a href="<?php echo U('/index/');?>">项目列表</a></li>
		           <!--  <li><a href="/">首页</a></li>
		            <li class="active"><a href="/">项目列表</a></li>
		            <li><a href="/online_test">接口测试工具</a></li>
		            <li><a href="/">json工具</a></li>
		            <li><a href="/">推送工具</a></li>
		            <li><a href="/">文档</a></li> -->
		        </ul>
		    </div>
		  </div>
		</div>

		<!-- sub header -->
<header>
	<div class="container navi-breadcrumb">
		<ul class="breadcrumb">
			<li> <a href="<?php echo U('/index/');?>">项目列表</a> <span class="divider">/</span> </li>
			<li> <a class="active" href="<?php echo U('project/index');?>?id=<?php echo ($data["id"]); ?>"><?php echo ($data["name"]); ?></a> </li>
		</ul>
	</div>
</header>

<!-- body container -->
<div class="container">
	<div class="page-header">
		<h1>项目详情</h1>
		<!-- 接口操作按钮 -->
		<a href="<?php echo U('project/edit');?>?id=<?php echo ($data["id"]); ?>" class="btn btn-primary btn-small">编辑项目</a>
		<a href="#myModal" class="btn btn-danger btn-small" role="button" data-toggle="modal">删除项目</a>
		<a href="<?php echo U('project/createcategory');?>?projectid=<?php echo ($data["id"]); ?>" class="btn btn-primary btn-small">新增分类</a>
	    <!-- 接口删除提醒模态框 -->
	    <div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">项目删除确认</h3>
			</div>
			<div class="modal-body">
				<p>一旦删除该项目，就无法恢复!</p>
			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
				<button class="btn btn-danger" id="confirm_delete_button">删除</button>
			</div>
		</div>
	</div>

	<p class="lead">基本信息</p>
	<table class="table table-bordered">
		<tr>
			<td>项目名称</td>
			<td><?php echo ($data["name"]); ?></td>
		</tr>
		<tr>
			<td>项目状态</td>
			<td><?php echo ($projectStatus[$data['status']]); ?></td>
		</tr>
		<tr>
			<td>正式服务器地址</td>
			<td><?php echo ($data["host_product"]); ?></td>
		</tr>
		<tr>
			<td>测试服务器地址</td>
			<td><?php echo ($data["host_develop"]); ?></td>
		</tr>
		<tr>
			<td>伪数据服务器地址</td>
			<td><?php echo ($data["host_faker"]); ?></td>
		</tr>
	</table>

	<p class="lead">项目说明</p>
	<pre><?php echo ($data["detail"]); ?></pre>

	
	<p class="lead">所有接口</p>
	<table class="table table-bordered">
		<tr>
			<td>
				<?php if($count): ?>共有<?php echo ($count); ?>个接口
				<?php else: ?>
					暂无接口<?php endif; ?>				
			</td>
			<td>
				<?php if($count): ?><a href="<?php echo U('interface/index');?>?projectid=<?php echo ($data["id"]); ?>" class="btn">接口列表</a><?php endif; ?>
				<a href="<?php echo U('interface/create');?>?projectid=<?php echo ($data["id"]); ?>" class="btn"><i class="icon-plus inside"></i>新建接口</a>
			</td>
		</tr>

	</table>
</div> <!-- body container -->

<script type="text/javascript">
	$(document).ready(function() {
		$("#confirm_delete_button").click(function() {
			window.location.replace("<?php echo U('project/del');?>?id=<?php echo ($data["id"]); ?>")
		}) 
	})
</script>

		
		<footer class="footer">
	      <div class="container">
	        <p class="pull-right"><a href="#">回到顶部</a></p>
	        <!-- <p>UliAPI致力于API管理. create by <a href="mailto:#">hujian2009@gamil.com</a>.</p>
	        <p>powered by <a href="http://twitter.github.com/bootstrap">bootstrap</a>, <a href="http://jquery.com/">jquery</a>, 
	        	<a href="www.ruby-lang.org">ruby</a> 和 <a href="http://www.sinatrarb.com">sinatrarb</a> </p> -->
	      </div>
	    </footer>
	</body>
</html>