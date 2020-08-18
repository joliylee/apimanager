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
            <li><a href="<?php echo U('project/index');?>?id=<?php echo ($projectData["id"]); ?>"><?php echo ($projectData["name"]); ?></a><span class="divider">/</span></li>
            <li><a href="<?php echo U('interface/index');?>?projectid=<?php echo ($projectData["id"]); ?>">接口列表</a><span class="divider">/</span></li>
	        <li><a href="<?php echo U('interface/detail');?>?id=<?php echo ($data["id"]); ?>"><?php echo ($data["name"]); ?></a><span class="divider">/</span></li>
	        
	        <li><a class="active" href="<?php echo U('interface/edit');?>?id=<?php echo ($data["id"]); ?>">编辑接口</a></li>

		</ul>
	</div>
</header>

<div class="container">
	<form id="editinterface" action="<?php echo U('interface/edit');?>" method="post">

		<!-- basic information -->
		<legend>接口基本信息</legend>
		<label for="">接口名称</label>
		<input type="text" placeholder="必填" name="name" value="<?php echo ($data["name"]); ?>">
		<label for="">http类型</label>
		<select id="http-type-select" name="http_type">
			<?php if(is_array($httpStatus)): foreach($httpStatus as $k=>$vo): ?><option value="<?php echo ($k); ?>"<?php if(($k) == $data["http_type"]): ?>selected<?php endif; ?>><?php echo ($vo); ?></option><?php endforeach; endif; ?>
		</select>
		<label for="">所属类别</label>
		<select name="category_id">
			<?php if(is_array($categoryData)): foreach($categoryData as $k=>$vo): ?><option value="<?php echo ($k); ?>"<?php if(($k) == $data["category_id"]): ?>selected<?php endif; ?>><?php echo ($vo); ?></option><?php endforeach; endif; ?>
			<option value="0"<?php if(($data["category_id"]) == "0"): ?>selected<?php endif; ?>>其他</option>
		</select>

		<label for="">接口说明</label>
		<textarea name="detail" id="" rows="10"><?php echo ($data["detail"]); ?></textarea>

		<legend>接口地址</legend>
		<label for="">正式服务器接口地址</label>
		<input type="text" placeholder="选填" name="path_product" value="<?php echo ($data["path_product"]); ?>" >
		<label for="">测试服务器接口地址</label>
		<input type="text" placeholder="选填" name="path_develop" value="<?php echo ($data["path_develop"]); ?>">
		<label for="">伪数据服务器接口地址</label>
		<input type="text" placeholder="选填" name="path_faker" value="<?php echo ($data["path_faker"]); ?>">
		<span class="help-block"><i class="icon-exclamation-sign"></i> 接口地址如果不包含http，则自动和project host合并成该接口的path</span>

		

		<!-- input parameters -->
		<legend>输入参数</legend>
			<!-- refresh data -->
		<p> <i class="icon-globe"></i>输入实例:</p>
		<div>
			<input type="text" style="margin-top:9px" class="span4" name="input_url" value="<?php echo ($data["input_url"]); ?>" /> 
			<a class="btn" id="refresh-input-params-button"><i class="icon-refresh inside"></i></a>
		</div>
		<table class="table" id="input_params_table">
			<thead>
				<tr>
					<td>参数名称</td>
					<td>输入值实例</td>
					<td>说明</td>
					<td>类型</td>
					<td>
						<a class="add_input_param_button"><i class="icon-plus"></i></a>
					</td>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($data["input_json"])): $i = 0; $__LIST__ = $data["input_json"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td><input type="text" placeholder="必填" name="input_name[]" value="<?php echo ($vo["name"]); ?>"></td>
						<td><input type="text" placeholder="选填" name="input_sample[]" value="<?php echo ($vo["sample"]); ?>"></td>
						<td><input type="text" placeholder="选填" name="input_detail[]" value="<?php echo ($vo["detail"]); ?>"></td>
						<td>string</td>
						<td>
							<a class="delete_param_button"><i class="icon-minus"></i></a>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>

		<div id="output-success">
			<!-- 输出成功参数 -->
			<legend>请求成功时输出数据</legend>

				<!-- refresh data -->
			<p> <i class="icon-ok"></i>在线获取数据:</p>
			<div>
				<input type="text" style="margin-top:9px" class="span4" name="success_url" value="<?php echo ($data["success_url"]); ?>" /> 
				<a class="btn refresh-output-button"><i class="icon-refresh inside"></i></a>
			</div>

			<p style="margin-top:30px">
				<!-- 成功时返回值伪数据  -->
				<i class="icon-ok"></i>示例:
				<a class="btn format-output-button" style="margin-left:20px">格式化数据</a> 
			</p>
			<textarea name="output_success" rows="40" class="lined"><?php echo ($data["output_success"]); ?></textarea>

				<!-- 参数说明 -->
			<p style="margin-top:30px">
				<i class="icon-ok"></i>参数说明:
				<a class="btn output-gen-button" style="margin-left:20px">从示例生成</a> 
			</p>
			<table class="table output-success-table">
				<thead>
					<tr>
						<td>参数路径</td>
						<td>输入值实例</td>
						<td>说明</td>
						<td>类型</td>
						<td>
							<a class="add_success_out_param_button" ><i class="icon-plus"></i></a>
						</td>
					</tr>
				</thead>
				<tbody>
				
				<?php if(is_array($data["success_json"])): $i = 0; $__LIST__ = $data["success_json"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td><input type="text" placeholder="必填" name="output_success_name[]" value="<?php echo ($vo["name"]); ?>"></td>
						<td><input type="text" placeholder="选填" name="output_success_sample[]" value="<?php echo ($vo["sample"]); ?>"></td>
						<td><input type="text" placeholder="选填" name="output_success_detail[]" value="<?php echo ($vo["detail"]); ?>"></td>
						<td><input type="text" placeholder="选填" name="output_success_type[]" value="<?php echo ($vo["type"]); ?>"></td>
						<td>
							<a class="delete_param_button"><i class="icon-minus"></i></a>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					
				</tbody>
			</table>
		</div>

		<!-- 输出失败数据 -->
		<div id="output-fail">
			<!-- 输出成功参数 -->
			<legend>请求失败时输出数据</legend>

				<!-- refresh data -->
			<p> <i class="icon-remove"></i>在线获取数据:</p>
			<div>
				<input type="text" style="margin-top:9px" class="span4" name="fail_url" value="<?php echo ($data["fail_url"]); ?>" /> 
				<a class="btn refresh-output-button"><i class="icon-refresh inside"></i></a>
			</div>

			<p style="margin-top:30px">
				<!-- 成功时返回值伪数据  -->
				<i class="icon-remove"></i>示例:
				<a class="btn format-output-button" style="margin-left:20px">格式化数据</a> 
			</p>
			<textarea name="output_fail" rows="25" class="lined"><?php echo ($data["output_fail"]); ?></textarea>

				<!-- 参数说明 -->
			<p style="margin-top:30px">
				<i class="icon-remove"></i>参数说明:
				<a class="btn output-gen-button" style="margin-left:20px">从示例生成</a> 
			</p>
			<table class="table output-fail-table">
				<thead>
					<tr>
						<td>参数路径</td>
						<td>输入值实例</td>
						<td>说明</td>
						<td>类型</td>
						<td>
							<a class="add_fail_out_param_button" ><i class="icon-plus"></i></a>
						</td>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($data["fail_json"])): $i = 0; $__LIST__ = $data["fail_json"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td><input type="text" placeholder="必填" name="output_fail_name[]" value="<?php echo ($vo["name"]); ?>"></td>
							<td><input type="text" placeholder="选填" name="output_fail_sample[]" value="<?php echo ($vo["sample"]); ?>"></td>
							<td><input type="text" placeholder="选填" name="output_fail_detail[]" value="<?php echo ($vo["detail"]); ?>"></td>
							<td><input type="text" placeholder="选填" name="output_fail_type[]" value="<?php echo ($vo["type"]); ?>"></td>
							<td>
								<a class="delete_param_button"><i class="icon-minus"></i></a>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>	
		
				</tbody>
			</table>
		</div>
	

		<div class="row center-div">
			<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />
			<input type="hidden" id="isreturn" name="isreturn" value="0" />
			<a href="<?php echo U('interface/detail');?>?id=<?php echo ($data["id"]); ?>" class="btn btn-large interface-button" >取消并返回</a>
			<button class="btn btn-large btn-success interface-button"  type="submit">提交接口</button>
			<button id="subreturn" class="btn btn-large btn-primary interface-button"  type="submit">提交接口并返回</button>
		</div>
	</form>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("#editinterface").validate({
			rules:{
				name:{required:true}
			},
			messages:{
				name:{required:"接口名称必填"}
			}
		}); 
		
		$("#subreturn").click(function(){
			$("#isreturn").val(1);
			$("#editinterface").submit();
			
		})
		
		// 获取输出参数row string
		function getOutputSuccessParamRowString(id) {
			var str = "<tr id='" + id + "'>" +
						  "<td><input type='text' placeholder='必填' name='output_success_name[]'></td>" + 
						  "<td><input type='text' placeholder='选填' name='output_success_sample[]'></td>" + 
						  "<td><input type='text' placeholder='选填' name='output_success_detail[]'></td>" + 
						  "<td><input type='text' placeholder='选填' name='output_success_type[]'></td>" +
						  "<td>" + 
						  "	 <a class='delete_param_button'><i class='icon-minus'></i></a>" + 
						  "</td>" + 
				      "</tr>";
			return str;
		}
		function getOutputFailParamRowString(id) {
			var str = "<tr id='" + id + "'>" +
						  "<td><input type='text' placeholder='必填' name='output_fail_name[]'></td>" + 
						  "<td><input type='text' placeholder='选填' name='output_fail_sample[]'></td>" + 
						  "<td><input type='text' placeholder='选填' name='output_fail_detail[]'></td>" + 
						  "<td><input type='text' placeholder='选填' name='output_fail_type[]'></td>" +
						  "<td>" + 
						  "	 <a class='delete_param_button'><i class='icon-minus'></i></a>" + 
						  "</td>" + 
				      "</tr>";
			return str;
		}

		// 获取代码生成映射表row string
		function getMapRowString(id) {
			var str = "<tr id='" + id + "'>" +
						  "<td><input type='text' placeholder='必填' name='orgin_key[]'></td>" + 
						  "<td><input type='text' placeholder='选填' name='new_key[]'></td>" + 
						  "<td>" + 
						  "	 <a class='delete_param_button'><i class='icon-minus'></i></a>" + 
						  "</td>" + 
				      "</tr>";
			return str;
		}

		// 设置伪数据框
		$(function() {
			$(".lined").linedtextarea(
				{selectedLine: 1}
			);
		});


		// 添加参数表事件
		$("table td a").click(function() {
			var row = $(this).parents("tr");
			if ($(this).hasClass("delete_param_button")) {
				row.remove();
			} else {
				var table = $(this).parents("table");
				if ($(this).hasClass("add_model_param_button")) {
					addTableRow(table, getMapRowString);
				} else if ($(this).hasClass("add_input_param_button")) {
					addTableRow(table, getInputParamRowString);
				} else if ($(this).hasClass("add_success_out_param_button")) {
					addTableRow(table, getOutputSuccessParamRowString);
				} else if ($(this).hasClass("add_fail_out_param_button")) {
					addTableRow(table, getOutputFailParamRowString);
				}
			}
		});


		// 刷新输出参数
		function refreshOutputParams(table, data) {
			table.find("tbody tr").each(function() {
				$(this).remove();
			})
			var func;
			if (table.hasClass("output-success-table")) {
				func = getOutputSuccessParamRowString;
			} else {
				func = getOutputFailParamRowString;
			}
			var jsonObject = $.parseJSON(data);
			parseKeyPath(table, jsonObject, "", func, false);
		}

		function parseKeyPath(table, object, keyPath, rowFunc, isArray) {
			if (object != null && object != undefined) {
				if (object.constructor == Array) {
					if (keyPath != "") {
						var row = addTableRow(table, rowFunc);
						row.find("td:first input").val(keyPath.substring(0, keyPath.length-1));
						row.find("td:eq(3) input").val("Array");
						parseKeyPath(table, object[0], keyPath, rowFunc, true);
					}
				} else {
					if (object.constructor == Object) {
						if (keyPath != "") {
							if (!isArray) {
								var row = addTableRow(table, rowFunc);
								row.find("td:first input").val(keyPath.substring(0, keyPath.length-1));
								row.find("td:eq(3) input").val("Dictonary");
							}
							parseKeyPath(table, object[0], keyPath, rowFunc);
						}
						for (var key in object) {
							if (object.hasOwnProperty(key)) {
								var value = object[key];
								if (value.constructor == String || value.constructor == Number) {
									var row = addTableRow(table, rowFunc);
									row.find("td:first input").val(keyPath + key);
									row.find("td:eq(1) input").val(object[key]);
									row.find("td:eq(3) input").val(classType(object[key]));
								} else {
									parseKeyPath(table, value, keyPath + key + '.', rowFunc, false);
								}
							}
						}
					}
				}
			}

		}



		$("#refresh-input-params-button").click(function() {
			var url = $(this).prev("input").val();

			params = paramsFromURL(url);
			if (Object.size(params) > 0) {
				var table = $("#input_params_table");
				// remove old params
				table.find("tbody tr").each(function() {
					$(this).remove();
				})
				// add new ones
				for (name in params) {
					var row = addTableRow(table, getInputParamRowString);
					row.find("td:first input").val(name);
					row.find("td:eq(1) input").val(params[name]);
				}
			}
		})

		// 刷新output数据事件
		$(".refresh-output-button").click(function() {
			// refresh input params
			var parent_div = $(this).parent().parent();
			var url = $(this).prev("input").val();

			var output_table = parent_div.children("table");
			var textarea = parent_div.find("textarea");
			// refresh output
			$.get("<?php echo U('interface/refresh');?>", {"url": url}, function(data, status) {
				// set output to textarea
				textarea.val(format(data));

				// set output params
				refreshOutputParams(output_table, data);
			})
		})

		// 格式化成功时的伪数据
		$(".format-output-button").click(function() {
			var textarea = $(this).parent().parent().find("textarea");
			textarea.val(format(textarea.val()))
		})

		//
		$(".output-gen-button").click(function() {
			var output_table = $(this).parent().parent().children("table");
			var textarea = $(this).parent().parent().find("textarea");

			refreshOutputParams(output_table, deformatJson(textarea.val()));
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