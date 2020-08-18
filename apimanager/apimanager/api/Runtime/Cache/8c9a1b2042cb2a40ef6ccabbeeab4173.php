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
<header class="subhead homepage-subhead">
	<div class="container">
		<div class="subhead-content">			
			<h1>API管理工具</h1>
		</div>
	</div>
</header>

<!-- body container -->
<div class="container">
	<div class="row">
    	<a href="<?php echo U('project/create');?>" class="btn" style="margin-top:20px">新增项目</a>
	</div>
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="row border-table-row">
			<div class="span2 project-preview">
				<a href="<?php echo U('project/index');?>?id=<?php echo ($vo["id"]); ?>">
	    			<img src="__ROOT__/res/img/project.png" class="img-polaroid" alt="">
				</a>
			</div>
			<div class="span6 project-info">
				<p><span class="lead"><?php echo ($vo["name"]); ?></span>
					<a href="<?php echo U('project/index');?>?id=<?php echo ($vo["id"]); ?>" class=""><i class="icon-check"></i>查看</a>
					<a href="<?php echo U('project/edit');?>?id=<?php echo ($vo["id"]); ?>" class=""><i class="icon-edit"></i>编辑</a>
				</p>
				<p class="project-subinfo"><i class="icon-time"></i>创建时间: <?php echo (date("Y-m-d H:i:s",$vo['created_at'])); ?></p>
				<?php if($vo['updated_at']): ?><p class="project-subinfo"><i class="icon-time"></i>更新时间: <?php echo (date("Y-m-d H:i:s",$vo['updated_at'])); ?></p><?php endif; ?>
				<p class="project-subinfo"><i class="icon-eye-open"></i>项目状态: <?php echo ($projectStatus[$vo['status']]); ?></p>
				<p class="project-subinfo">
					<i class="icon-tag"></i>
					<?php if($vo['count']): ?>现有接口: <a href="<?php echo U('interface/index');?>?projectid=<?php echo ($vo["id"]); ?>"><?php echo ($vo['count']); ?></a> 
					<?php else: ?>
						暂无接口<?php endif; ?>
				</p>
			</div>
			<div class="span2" style="margin-top:140px">
				
			</div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>

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