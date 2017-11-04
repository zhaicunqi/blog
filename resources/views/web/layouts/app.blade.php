<!DOCTYPE html>
<html>
<head>
	<title>派克岛</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href="{{URL::asset('')}}static/web/style.css" rel="stylesheet" type="text/css" />
	<script src="{{URL::asset('')}}static/admin/assets/js/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="{{URL::asset('')}}static/web/js/cufon-yui.js"></script>
	<script type="text/javascript" src="{{URL::asset('')}}static/web/js/arial.js"></script>
	{{--<script type="text/javascript" src="{{URL::asset('')}}static/web/js/cuf_run.js"></script>--}}
	<!-- CuFon ends -->
</head>
<body>
<div class="main">
    @include('web.layouts.header')
	<div class="clr"></div>
	<div class="content">
		<div class="content_resize">
			@yield('content')
			@include('web.layouts.sidebar')
			<div class="clr"></div>
		</div>
	</div>
	{{--@include('web.layouts.footer')--}}
</div>
</body>
{{--layer--}}
<script src="{{URL::asset('')}}js/common.js"></script>
<script src="{{URL::asset('')}}plugins/layer-v3.1.0/layer/layer.js"></script>
@yield('javascript')
</html>
