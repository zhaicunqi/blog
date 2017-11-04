<div class="page-sidebar sidebar-fixed" id="sidebar">
	<!-- Page Sidebar Header-->
	<div class="sidebar-header-wrapper">
		<input type="text" class="searchinput" />
		<i class="searchicon fa fa-search"></i>
		<div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
	</div>
	<!-- /Page Sidebar Header -->
	<!-- Sidebar Menu -->
	<ul class="nav sidebar-menu">
		@if($admin_menu)
		@foreach($admin_menu as $one)
			<li class="one-menu">
				<a href="{{$one['child'] ? '#' : url($one['url'])}}" data-url="{{$one['child'] ? '#' : $one['url']}}" data-level=1 class="menu-dropdown">
					<i class="menu-icon fa fa-desktop"></i>
					<span class="menu-text"> {{$one['name']}} </span>
					@if($one['child'])<i class="menu-expand"></i>@endif
				</a>
				@if($one['child'])
					<ul class="submenu">
						@foreach($one['child'] as $two)
							<li class="two-menu">
								<a href="{{$two['child'] ? '#' : url($two['url'])}}" data-url="{{$two['child'] ? '#' : $two['url']}}" data-level=2 class="menu-dropdown">
									<span class="menu-text">{{$two['name']}}</span>
									@if($two['child'])<i class="menu-expand"></i>@endif
								</a>
								@if($two['child'])
									<ul class="submenu">
										@foreach($two['child'] as $three)
											<li class="three-menu">
												<a href="{{url($three['url'])}}" data-url="{{$three['url']}}" data-level=3>
													<i class="menu-icon fa fa-rocket"></i>
													<span class="menu-text">{{$three['name']}}</span>
												</a>
											</li>
										@endforeach
									</ul>
								@endif
							</li>
						@endforeach
					</ul>
				@endif
			</li>
		@endforeach
		@endif
	</ul>
	<!-- /Sidebar Menu -->
</div>
