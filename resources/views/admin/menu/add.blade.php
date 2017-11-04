@extends('admin.layouts.page-content')

@section('content')
	<div class="row">
		<div class="col-lg-12 col-sm-12 col-xs-12">
			<div class="">
				<div class="widget-body" style="box-shadow:none">
					<div>
						<form class="form-horizontal form-bordered" id="dataForm" data-role="form">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label no-padding-right">父级菜单</label>
								<div class="col-sm-9">
									<select id="parent-id" name="parent_id" style="width:100%;">
										<option value="0">顶级分类</option>
										@if(isset($menuList) && $menuList)
											@foreach($menuList as $one)
												<option value="{{$one['id']}}" {{(isset($pid) && $pid == $one['id']) ? "selected" : ''}}>&emsp;&emsp;|___{{$one['name']}}</option>
												@if(isset($one['child']) && $one['child'])
													@foreach($one['child'] as $two)
														<option value="{{$two['id']}}" {{(isset($pid) && $pid == $two['id']) ? "selected" : ''}}>&emsp;&emsp;&emsp;&emsp;|___{{$two['name']}}</option>
														@if(isset($two['child']) && $two['child'])
															@foreach($two['child'] as $three)
																<option value="{{$three['id']}}" {{(isset($pid) && $pid == $three['id']) ? "selected" : ''}}>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;|___{{$three['name']}}</option>
															@endforeach
														@endif
													@endforeach
												@endif
											@endforeach
										@endif
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label no-padding-right">菜单名称</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="name" id="" placeholder="">
								</div>
							</div>

							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label no-padding-right">路由路径</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="url" id="" placeholder="">
								</div>
							</div>

							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label no-padding-right">icon图标</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="icon" id="" placeholder="">
								</div>
							</div>

							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label no-padding-right">排序</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="sort" id="" placeholder="">
								</div>
							</div>

							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label no-padding-right">是否显示</label>
								<div class="col-sm-9">
									<div class="radio">
										<label>
											<input name="display" type="radio" value="1">
											<span class="text">显示 </span>
										</label>
										<label>
											<input name="display" type="radio" value="2" checked="checked" class="inverted">
											<span class="text">隐藏</span>
										</label>
									</div>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('javascript')

	<!--Page Related Scripts-->
	<script src="{{URL::asset('')}}static/admin/assets/js/select2/select2.js"></script>
	<script>
        $("#parent-id").select2();

        function doSubmit(){
            var callback = arguments[0] ? arguments[0] : false;
            $.ajax({
				url:"{{url('/admin/menu/add')}}",
				type:"post",
				data:$("#dataForm").serialize(),
				success:function(data){
					if(data.status){
                        layerAlertSuccess(data.msg);
                        callback ? callback() : "";
                    }else{
                        layerAlertFail(data.msg);
					}
				},
				dataType:'json'
			});
		}

	</script>

@endsection