<div class="header">
    <div class="header_resize">
        <div class="logo">
            <h1><a href="javascript:;">BLOG<span>派克岛</span></a><small>记录点滴</small></h1>
        </div>
        <div class="clr"></div>
        <div class="menu_nav">
            <ul>
                @if(isset($navList) && $navList)
                    @foreach($navList as $item)
                        <li class="active"><a href="{{url($item['url'])}}">{{$item['name']}}</a></li>
                    @endforeach
                @else
                    <li class="active"><a href="{{url('/web')}}">首页</a></li>
                @endif
            </ul>
        </div>
        <div class="clr"></div>
    </div>
</div>
