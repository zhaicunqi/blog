@extends('admin.layouts.app')

@section('content')
	<a class="btn btn-darkorange" href="{{url('/admin/article/add')}}" id="add-btn-option" style="margin-bottom: 10px;">添加文章</a>
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<div class="well with-header  with-footer">
				<div class="">
					<form action="{{url('/admin/article')}}" id="searchForm" method="get">
						<div class="form-inline" style="margin-bottom: 10px;">
							<div class="form-group" style="width: 173px;">
								<select id="parent-id" name="cate_id" style="width:100%;">
									@if(isset($cateList) && $cateList)
										@foreach($cateList as $one)
											<option value="{{$one['id']}}" {{(isset($params['cate_id']) && $params['cate_id'] == $one['id']) ? "selected" : ''}}>{{$one['name']}}</option>
											@if(isset($one['child']) && $one['child'])
												@foreach($one['child'] as $two)
													<option value="{{$two['id']}}" {{(isset($params['cate_id']) && $params['cate_id'] == $two['id']) ? "selected" : ''}}>&emsp;{{$two['name']}}</option>
													@if(isset($two['child']) && $two['child'])
														@foreach($two['child'] as $three)
															<option value="{{$three['id']}}" {{(isset($params['cate_id']) && $params['cate_id'] == $three['id']) ? "selected" : ''}}>&emsp;&emsp;{{$three['name']}}</option>
														@endforeach
													@endif
												@endforeach
											@endif
										@endforeach
									@endif
								</select>
							</div>
							<div class="form-group">
								<input type="email" name="title" value="{{isset($params['title']) ? $params['title'] : ''}}" class="form-control" id="exampleInputEmail2" placeholder="标题">
							</div>
							<div class="form-group">
								<input type="password" name="author" value="{{isset($params['author']) ? $params['author'] : ''}}" class="form-control" id="exampleInputPassword2" placeholder="作者">
							</div>
							<button type="button" class="btn btn-primary" onclick="doSearch('searchForm')">搜索</button>
						</div>
					</form>
				</div>
				<table class="table table-hover">
					<thead class="bordered-darkorange">
					<tr>
						<th>序号</th>
						<th>标题</th>
						<th>作者</th>
						<th>分类</th>
						<th>是否显示</th>
						<th>添加时间</th>
						<th>修改时间</th>
						<th width="180">操作</th>
					</tr>
					</thead>
					<tbody>
						@if(isset($list) && $list)
							@foreach($list as $one)
								<tr>
									<td>{{$one['id']}}</td>
									<td>{{$one['title']}}</td>
									<td>{{$one['author']}}</td>
									<td>{{$one['cate_name']}}</td>
									<td>{{$one['created_at']}}</td>
									<td>{{$one['updated_at']}}</td>
									<td>
										@if($one['display'] == 1)
											<a
												href="javascript:void(0);"
												title="点击隐藏"
												onclick="layerComfirm('确定隐藏？','{{url('/admin/article/toggle-display').'/'.$one['id'].'/2'}}', '{{csrf_token()}}')"
												class="btn btn-xs btn-primary"
											>显示</a>
										@else
											<a
												href="javascript:void(0);"
												title="点击显示"
												onclick="layerComfirm('确定显示？','{{url('/admin/article/toggle-display').'/'.$one['id'].'/1'}}', '{{csrf_token()}}')"
												class="btn btn-xs btn-maroon"
											>隐藏</a>
										@endif
									</td>
									<td>
										<a href="javascript:void(0);" onclick="layerOpen('查看','{{url('/admin/article/content').'/'.$one['id']}}')" class="btn btn-xs btn-primary">查看</a>
										<a href="{{url('/admin/article/edit').'/'.$one['id']}}" class="btn btn-xs btn-warning">编辑</a>
											<a href="javascript:void(0);" onclick="layerComfirm('确定删除？','{{url('/admin/article/delete').'/'.$one['id']}}', '{{csrf_token()}}')" class="btn btn-xs btn-danger">删除</a>
									</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="8">
									<h3 style="text-align: center;">Sorry, no data was found...</h3>
								</td>
							</tr>
						@endif
					</tbody>
				</table>
				<div class="footer">
					<code>分页</code>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('javascript')

	<script src="{{URL::asset('')}}static/admin/assets/js/select2/select2.js"></script>
	<script>
        $("#parent-id").select2();
	</script>

@endsection