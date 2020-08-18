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

		<!-- navigation bar -->
<header>
	<div class="container navi-breadcrumb">
		<ul class="breadcrumb">
			<li><a href="<?php echo U('/index/');?>">项目列表</a><span class="divider">/</span> </li>
        	<li><a href="<?php echo U('project/index');?>?id=<?php echo ($data["id"]); ?>"><?php echo ($data["name"]); ?></a><span class="divider">/</span> </li>
	        <li><a class="active" href="<?php echo U('project/edit');?>?id=<?php echo ($data["id"]); ?>">编辑项目</a></li>           
		</ul>
	</div>
</header>

<!-- body container -->
<div class="container">
	<form action="<?php echo U('project/edit');?>" method="POST">
		<!-- basic information	 -->
		<legend>基本信息</legend>
		<label for="">项目名称</label>
		<input type="text" name="name" placeholder="必填" value="<?php echo ($data["name"]); ?>">
		<label for="">项目状态</label>
		<select name="status" id="">
			<?php if(is_array($projectStatus)): foreach($projectStatus as $k=>$vo): ?><option value="<?php echo ($k); ?>"<?php if(($k) == $data["status"]): ?>selected<?php endif; ?>><?php echo ($vo); ?></option><?php endforeach; endif; ?>
		</select>

		<!-- server path -->
		<legend>服务器地址</legend>
		<label for="">正式服务器</label>
		<input type="text" name="host_product" class="input-xlarge" placeholder="选填" value="<?php echo ($data["host_product"]); ?>" >
		<label for="">测试服务器</label>
		<input type="text" name="host_develop" class="input-xlarge" placeholder="选填" value="<?php echo ($data["host_develop"]); ?>">
		<label for="">伪数据服务器</label>
		<input type="text" name="host_faker" class="input-xlarge" placeholder="选填" value="<?php echo ($data["host_faker"]); ?>">
		<p><i class="icon-exclamation-sign"></i>必须以http://开头, 可以包含API路径</p>

		

		<legend>项目说明</legend>
		<textarea name="detail"  rows="20"><?php echo ($data["detail"]); ?></textarea>
	

		<div class="row">
			<div class="span4 offset4">
				<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>"/> 
				<a href="javascript:void(0);" onclick="javascript:history.go(-1);"  class="btn btn-large interface-button" >取消并返回</a>
				<button class="btn btn-large btn-success interface-button"  type="submit">提交项目</button>
			</div>
		</div>
	</form>
</div> <!-- body container -->


		
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