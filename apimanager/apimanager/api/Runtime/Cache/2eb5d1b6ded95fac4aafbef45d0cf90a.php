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
			<li><a href="<?php echo U('/index/');?>">项目列表</a> <span class="divider">/</span> </li>
            <li><a href="<?php echo U('project/index');?>?id=<?php echo ($data["id"]); ?>"><?php echo ($data["name"]); ?></a><span class="divider">/</span></li>
            <li><a class="active" href="<?php echo U('interface/index');?>?projectid=<?php echo ($data["id"]); ?>">接口列表</a><span class="divider">/</span></li>
		</ul>
	</div>
</header>

<!-- body container -->
<div class="container">
	<a href="<?php echo U('interface/create');?>?projectid=<?php echo ($data["id"]); ?>" class="btn" style="margin-top:20px">新增接口</a>
	<?php if($interfaceList): ?><table class="table table-bordered" style="margin-top:20px">
			<?php if(is_array($interfaceList)): foreach($interfaceList as $k=>$vo): ?><tr class="info"><td><?php echo ($k); ?></td></tr>
				<?php if(is_array($vo)): foreach($vo as $key=>$v): ?><tr>
						<td>
							<p class="interface-info">
								<a href="<?php echo U('interface/detail');?>?id=<?php echo ($v["id"]); ?>">
									<?php echo ($v["name"]); ?>
								</a>
							</p>
							<p class="interface-subinfo">
								<i class="icon-time"> </i>
								更新时间: <?php echo (date("Y-m-d H:i:s",$v['updated_at'])); ?>
							</p>
						</td>
					</tr><?php endforeach; endif; endforeach; endif; ?>
		</table><?php endif; ?>
</div>
		
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