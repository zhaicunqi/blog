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

		<div>
			@yield('content')
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

			});
		</script>

		@yield('javascript')
	</body>
</html>
