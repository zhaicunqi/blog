@extends('admin.layouts.app')

@section('content')
	<form action="{{url('/admin/article/edit').'/'.$row['id']}}" id="dataForm">
		<div class="row">
			<div class="col-lg-12 col-sm-12 col-xs-12">
				<div class="row">
					<div class="col-lg-12 col-sm-12 col-xs-12">
						<div class="widget">
							<div class="widget-header bordered-left bordered-darkorange">
								<span class="widget-caption">
									编辑文章
								</span>
							</div>
							<div class="widget-body bordered-left bordered-warning">
								{{ csrf_field() }}
								<div class="form-group">
									<select id="parent-id" name="cate_id" style="width:100%;">
										@if(isset($cateList) && $cateList)
											@foreach($cateList as $one)
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
								<div class="form-group">
									<label class="sr-only" for="exampleInputEmail2">Email address</label>
									<input type="text" name="title" value="{{$row['title']}}"  class="form-control" id="exampleInputEmail2" placeholder="标题">
								</div>
								<div class="form-group">
									<label class="sr-only" for="exampleInputPassword2">Password</label>
									<input type="text" name="author" value="{{$row['author']}}" class="form-control" id="exampleInputPassword2" placeholder="作者">
								</div>
								<button type="button" class="btn btn-primary" onclick="doSubmitPost(this)">保存</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-sm-12 col-xs-12">
				<script id="editor" name="content" type="text/plain" style="width:100%;height:500px;"><?php echo $row['content'];?></script>
			</div>
		</div>
	</form>
@endsection

@section('javascript')
	<script type="text/javascript" charset="utf-8" src="{{URL::asset('')}}plugins/UEditor/ueditor.config.js"></script>
	<script type="text/javascript" charset="utf-8" src="{{URL::asset('')}}plugins/UEditor/ueditor.all.min.js"> </script>
	<script src="{{URL::asset('')}}static/admin/assets/js/select2/select2.js"></script>
	<script>

        var ue = UE.getEditor('editor');
        $("#parent-id").select2();
	</script>

@endsection