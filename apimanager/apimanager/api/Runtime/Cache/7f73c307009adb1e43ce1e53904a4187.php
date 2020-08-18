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
            <li><a href="<?php echo U('project/index');?>?id=<?php echo ($data["id"]); ?>"><?php echo ($data["name"]); ?></a><span class="divider">/</span></li>
            <li><a href="<?php echo U('interface/index');?>?projectid=<?php echo ($data["id"]); ?>">接口列表</a><span class="divider">/</span></li>
            <li><a class="active"href="<?php echo U('interface/detail');?>?id=<?php echo ($interfaceData["id"]); ?>">
            	接口详情
            </a><span class="label label-info"><?php echo ($interfaceData["name"]); ?></span></li>
		</ul>
	</div>
</header>

<!-- body container -->
<div class="container">
	<div class="row">

		<!-- doc navi -->
		<div class="span3">
			<?php if($interfaceList): if(is_array($interfaceList)): foreach($interfaceList as $k=>$vo): ?><ul class="nav nav-list">
						<li class="nav-header"><?php echo ($k); ?></li>
						<?php if(is_array($vo)): foreach($vo as $key=>$v): ?><li>
								<div class="row-fluid" style="padding-top:5px">
									<div class="offset1">
										<a id="interface_<?php echo ($v["id"]); ?>" href="<?php echo U('interface/detail');?>?id=<?php echo ($v["id"]); ?>">
											<p><?php echo ($v["name"]); ?></p> 
										</a>
									</div>
									
								</div>
							</li><?php endforeach; endif; ?>
					</ul><?php endforeach; endif; ?>
			<?php else: endif; ?>
		</div>

		<div class="span9">
			<section id="overview">
    			<div class="page-header">
    				<h1><?php echo ($interfaceData["name"]); ?></h1>
    				<!-- 接口操作按钮 -->
    				<a href="<?php echo U('interface/edit');?>?id=<?php echo ($interfaceData["id"]); ?>" class="btn btn-primary btn-small">编辑接口</a>
    				<a href="#myModal" class="btn btn-danger btn-small" role="button" data-toggle="modal">删除接口</a>
				    <!-- 接口删除提醒模态框 -->
				    <div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h3 id="myModalLabel">接口删除确认</h3>
						</div>
						<div class="modal-body">
							<p>一旦删除该接口，就无法恢复!</p>
						</div>
						<div class="modal-footer">
							<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
							<button class="btn btn-danger" id="delete-comfirm">删除</button>
						</div>
					</div>
    			</div>

				<p class="lead">接口描述</p>

				<table class="table table-bordered table-striped center-header">
					<tbody>
						<tr>
							<td>接口类型</td>
							<td><?php echo ($httpStatus[$interfaceData['http_type']]); ?></td>
						</tr>
						<tr>
							<td>接口说明</td>
							<td><?php echo ($interfaceData["detail"]); ?></td>
						</tr>
						<tr>
							<td>正式服务器接口地址</td>
							<td><?php echo ($interfaceData["path_product"]); ?></td>
						</tr>
						<tr>
							<td>测试服务器接口地址</td>
							<td><?php echo ($interfaceData["path_develop"]); ?></td>
						</tr>
						<tr>
							<td>伪数据地址</td>
							<td><?php echo ($interfaceData["path_faker"]); ?></td>
						</tr>
					</tbody>
				</table>
			</section>

			<section id="input">
				<p class="lead">输入参数</p>
				<table class="table table-bordered table-striped center-header">
					<thead>
						<tr>
							<td>参数名称</td>
							<td>参数类型</td>
							<td>输入值实例</td>
							<td>说明</td>
						</tr>
					</thead>
					<tbody>
						<!-- 其他输入参数 -->
						<?php if(is_array($interfaceData["input_json"])): $i = 0; $__LIST__ = $interfaceData["input_json"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($vo["name"]); ?></td>
								<td>string</td>
								<td><?php echo ($vo["sample"]); ?></td>
								<td><?php echo ($vo["detail"]); ?></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>	
					</tbody>
				</table>
			</section>

			<section id="output-success">
				<legend>请求成功时输出数据</legend>
					<!-- 成功时返回值伪数据  -->
				<p style="margin-top:30px">
					<i class="icon-ok"></i>示例:
				</p>
				<pre class="code-pre" ><?php echo ($interfaceData["output_success"]); ?></pre>

					<!-- 参数说明 -->
				<p style="margin-top:30px">
					<i class="icon-ok"></i>参数说明:
				</p>
				<table class="table table-striped table-bordered center-header">
					<thead>
						<tr>
							<td>参数路径</td>
							<td>参数类型</td>
							<td>输出值实例</td>
							<td>说明</td>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($interfaceData["success_json"])): $i = 0; $__LIST__ = $interfaceData["success_json"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($vo["name"]); ?></td>
								<td><?php echo ($vo["type"]); ?></td>
								<td><?php echo ($vo["sample"]); ?></td>
								<td><?php echo ($vo["detail"]); ?></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</section>

			<section id="output-fail">
				<legend>请求失败时输出数据</legend>
					<!-- 成功时返回值伪数据  -->
				<p style="margin-top:30px">
					<i class="icon-ok"></i>示例:
				</p>
				<pre class="code-pre"><?php echo ($interfaceData["output_fail"]); ?></pre>

					<!-- 参数说明 -->
				<p style="margin-top:30px">
					<i class="icon-ok"></i>参数说明:
				</p>
				<table class="table table-striped table-bordered center-header">
					<thead>
						<tr>
							<td>参数路径</td>
							<td>参数类型</td>
							<td>输出值实例</td>
							<td>说明</td>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($interfaceData["fail_json"])): $i = 0; $__LIST__ = $interfaceData["fail_json"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($vo["name"]); ?></td>
								<td><?php echo ($vo["type"]); ?></td>
								<td><?php echo ($vo["sample"]); ?></td>
								<td><?php echo ($vo["detail"]); ?></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>	
					</tbody>
				</table>
			</section>


		</div> <!-- span9 -->
	</div> <!-- row -->
</div> <!-- body container -->

<script type="text/javascript" src="__ROOT__/res/js/google-code-prettify/prettify.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		// 使右边栏中当前项显示高亮
		$("#interface_<?php echo ($interfaceData["id"]); ?>").closest("div.row-fluid").addClass("active")

		// 输出的json数据显示高亮
	    $("pre").addClass("prettyprint");
	    prettyPrint();
		$("#delete-comfirm").click(function() {
			window.location.replace("<?php echo U('interface/del');?>?id=<?php echo ($interfaceData["id"]); ?>")
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