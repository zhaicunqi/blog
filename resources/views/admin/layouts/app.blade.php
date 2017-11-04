<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>首页</title>

		<meta name="description" content="Dashboard" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" href="{{URL::asset('')}}zeus/assets/img/favicon.png" type="image/x-icon">

		<!--Basic Styles-->
		<link href="{{URL::asset('')}}static/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="{{URL::asset('')}}static/admin/assets/css/font-awesome.min.css" rel="stylesheet" />
		<link href="{{URL::asset('')}}static/admin/assets/css/weather-icons.min.css" rel="stylesheet" />

		<!--Beyond styles-->
		<link href="{{URL::asset('')}}static/admin/assets/css/beyond.min.css" rel="stylesheet" type="text/css" />
		<link href="{{URL::asset('')}}static/admin/assets/css/demo.min.css" rel="stylesheet" />
		<link href="{{URL::asset('')}}static/admin/assets/css/typicons.min.css" rel="stylesheet" />
		<link href="{{URL::asset('')}}static/admin/assets/css/animate.min.css" rel="stylesheet" />

		<!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
		<script src="{{URL::asset('')}}static/admin/assets/js/skins.min.js"></script>
	</head>
	<body>
		@include('admin.layouts.navbar')
		<div class="main-container container-fluid">
			<div class="page-container">
				@include('admin.layouts.sidebar')
				<div class="page-content">
					<div class="page-breadcrumbs breadcrumbs-fixed">
						<ul class="breadcrumb">
							<li>
								<i class="fa fa-home"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul>
					</div>
					<div class="page-body">
						@yield('content')
					</div>
				</div>
			</div>
		</div>

		<!--Basic Scripts-->
		<script src="{{URL::asset('')}}static/admin/assets/js/jquery-2.0.3.min.js"></script>
		<script src="{{URL::asset('')}}static/admin/assets/js/bootstrap.min.js"></script>
		<script src="{{URL::asset('')}}js/common.js"></script>

		<!--Beyond Scripts-->
		<script src="{{URL::asset('')}}static/admin/assets/js/beyond.min.js"></script>

		{{--layer--}}
		<script src="{{URL::asset('')}}plugins/layer-v3.1.0/layer/layer.js"></script>

		<script>
			$(window).bind("load", function () {
			    // 侧边栏选中效果  start
				var pathname = window.location.pathname;
				var objs = $(".nav.sidebar-menu a");
				var len = objs.length;
				if(len){
					objs.each(function(i,o){
					    var o = $(o);
					    var url = o.attr('data-url');
					    var level = parseInt(o.attr('data-level'));
					    if(pathname === url){
                            o.attr('href','#'); // 当前页的选项不可点击
                            if(level === 1){
								o.parent(".one-menu").addClass("active");
							}else if(level === 2){
                                o.parent(".two-menu").addClass("active");
                                o.parents(".one-menu").addClass("open");
							}else{
                                o.parent(".three-menu").addClass("active");
                                o.parents(".two-menu").addClass("open");
                                o.parents(".one-menu").addClass("open");
							}
						}
					});
				}
				// end
			});
		</script>

		@yield('javascript')
	</body>
</html>
