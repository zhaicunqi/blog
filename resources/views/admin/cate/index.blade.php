@extends('admin.layouts.app')

@section('content')
	<button class="btn btn-darkorange" id="add-btn-option" onclick="layerOpen('添加菜单','{{url('/admin/cate/add')}}')" style="margin-bottom: 10px;">添加分类</button>
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<div class="well with-header  with-footer">
				<div class="">
					<form class="form-inline" role="form" style="margin-bottom: 10px;">
						<div class="form-group">
							<label class="sr-only" for="exampleInputEmail2">Email address</label>
							<input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
						</div>
						<div class="form-group">
							<label class="sr-only" for="exampleInputPassword2">Password</label>
							<input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
						</div>
						<div class="form-group">
							<label class="sr-only" for="exampleInputEmail2">Email address</label>
							<input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
						</div>
						<div class="form-group">
							<label class="sr-only" for="exampleInputPassword2">Password</label>
							<input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
						</div>
						<div class="form-group">
							<label class="sr-only" for="exampleInputEmail2">Email address</label>
							<input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
						</div>
						<div class="form-group">
							<label class="sr-only" for="exampleInputPassword2">Password</label>
							<input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
						</div>
					</form>
					<div class="form-inline" role="form" style="margin-bottom: 10px;">
						<div class="form-group">
							<label class="sr-only" for="exampleInputEmail2">Email address</label>
							<input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
						</div>
						<div class="form-group">
							<label class="sr-only" for="exampleInputPassword2">Password</label>
							<input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
						</div>
						<button type="submit" class="btn btn-primary">搜索</button>
					</div>
				</div>
				<table class="table table-hover">
					<thead class="bordered-darkorange">
					<tr>
						<th>序号</th>
						<th>名称</th>
						<th>是否显示</th>
						<th>排序</th>
						<th width="180">操作</th>
					</tr>
					</thead>
					<tbody>
						@if(isset($list) && $list)
							@foreach($list as $one)
								<tr style="color: #b92c28">
									<td>{{$one['id']}}</td>
									<td>{{$one['name']}}</td>
									<td>
										@if($one['display'] == 1)
											<a
												href="javascript:void(0);"
												title="点击隐藏"
												onclick="layerComfirm('确定隐藏？','{{url('/admin/cate/toggle-display').'/'.$one['id'].'/2'}}', '{{csrf_token()}}')"
												class="btn btn-xs btn-primary"
											>显示</a>
										@else
											<a
												href="javascript:void(0);"
												title="点击显示"
												onclick="layerComfirm('确定显示？','{{url('/admin/cate/toggle-display').'/'.$one['id'].'/1'}}', '{{csrf_token()}}')"
												class="btn btn-xs btn-maroon"
											>隐藏</a>
										@endif
									</td>
									<td>{{$one['sort']}}</td>
									<td>
										<a href="javascript:void(0);" onclick="layerOpen('添加菜单','{{url('/admin/cate/add').'/'.$one['id']}}')" class="btn btn-xs btn-primary">添加子类</a>
										<a href="javascript:void(0);" onclick="layerOpen('编辑菜单','{{url('/admin/cate/edit').'/'.$one['id']}}')" class="btn btn-xs btn-warning">编辑</a>
										@if(!isset($one['child']) || !$one['child'])
											<a href="javascript:void(0);" onclick="layerComfirm('确定删除？','{{url('/admin/cate/delete').'/'.$one['id']}}', '{{csrf_token()}}')" class="btn btn-xs btn-danger">删除</a>
										@endif
									</td>
								</tr>
								@if(isset($one['child']) && $one['child'])
									@foreach($one['child'] as $two)
										<tr style="color: #3e8f3e">
											<td>{{$two['id']}}</td>
											<td>&emsp;&emsp;|___{{$two['name']}}</td>
											<td>
												@if($two['display'] == 1)
													<a
														href="javascript:void(0);"
														title="点击隐藏"
														onclick="layerComfirm('确定隐藏？','{{url('/admin/cate/toggle-display').'/'.$two['id'].'/2'}}', '{{csrf_token()}}')"
														class="btn btn-xs btn-primary"
													>显示</a>
												@else
													<a
														href="javascript:void(0);"
														title="点击显示"
														onclick="layerComfirm('确定显示？','{{url('/admin/cate/toggle-display').'/'.$two['id'].'/1'}}', '{{csrf_token()}}')"
														class="btn btn-xs btn-maroon"
													>隐藏</a>
												@endif
											</td>
											<td>{{$two['sort']}}</td>
											<td>
												<a href="javascript:void(0);" onclick="layerOpen('添加菜单','{{url('/admin/cate/add').'/'.$two['id']}}')" class="btn btn-xs btn-primary">添加子类</a>
												<a href="javascript:void(0);" onclick="layerOpen('编辑菜单','{{url('/admin/cate/edit').'/'.$two['id']}}')" class="btn btn-xs btn-warning">编辑</a>
												@if(!isset($two['child']) || !$two['child'])
													<a href="javascript:void(0);" onclick="layerComfirm('确定删除？','{{url('/admin/cate/delete').'/'.$two['id']}}', '{{csrf_token()}}')" class="btn btn-xs btn-danger">删除</a>
												@endif
											</td>
										</tr>
										@if(isset($two['child']) && $two['child'])
											@foreach($two['child'] as $three)
												<tr style="color: #2d6ca2;">
													<td>{{$three['id']}}</td>
													<td>&emsp;&emsp;&emsp;&emsp;|___{{$three['name']}}</td>
													<td>
														@if($three['display'] == 1)
															<a
																href="javascript:void(0);"
																title="点击隐藏"
																onclick="layerComfirm('确定隐藏？','{{url('/admin/cate/toggle-display').'/'.$three['id'].'/2'}}', '{{csrf_token()}}')"
																class="btn btn-xs btn-primary"
															>显示</a>
														@else
															<a
																href="javascript:void(0);"
																title="点击显示"
																onclick="layerComfirm('确定显示？','{{url('/admin/cate/toggle-display').'/'.$three['id'].'/1'}}', '{{csrf_token()}}')"
																class="btn btn-xs btn-maroon"
															>隐藏</a>
														@endif
													</td>
													<td>{{$three['sort']}}</td>
													<td>
														<a href="javascript:void(0);" onclick="layerOpen('添加菜单','{{url('/admin/cate/add').'/'.$three['id']}}')" class="btn btn-xs btn-primary">添加子类</a>
														<a href="javascript:void(0);" onclick="layerOpen('编辑菜单','{{url('/admin/cate/edit').'/'.$three['id']}}')"  class="btn btn-xs btn-warning">编辑</a>
														@if(!isset($three['child']) || !$three['child'])
															<a href="javascript:void(0);" onclick="layerComfirm('确定删除？','{{url('/admin/cate/delete').'/'.$three['id']}}', '{{csrf_token()}}')" class="btn btn-xs btn-danger">删除</a>
														@endif
													</td>
												</tr>
											@endforeach
										@endif
									@endforeach
								@endif
							@endforeach
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

	<!--Page Related Scripts-->
	<script>

	</script>

@endsection