@extends('web.layouts.app')

@section('content')
    <div class="mainbar">
        @if($articleList)
            @foreach($articleList as $item)
                <div class="article">
                    <h2><a href="{{url('/web/article').'/'.$item['id']}}">{{$item['title']}}</a></h2>
                    <p>
                        作者：{{$item['author']}}
                        &emsp;发表时间：{{$item['created_at']}}
                        &emsp;阅读量：12312
                    </p>
                    @if(isset($item['clover']) && $item['clover'])
                        <img src="{{URL::asset('')}}static/web/images/img_1.jpg" width="613" height="193" alt="image" />
                    @endif
                </div>
            @endforeach
        @endif

        {{--<div class="article">--}}
            {{--<h2><span>Aliquam Risus</span> Justo</h2>--}}
            {{--<div class="clr"></div>--}}
            {{--<p>Posted on 18. Sep, 2015 by Sara in Filed under templates, internet,  with  Comments 18</p>--}}
            {{--<img src="{{URL::asset('')}}static/web/images/img_1.jpg" width="613" height="193" alt="image" />--}}
            {{--<div class="clr"></div>--}}
            {{--<p>This is a free CSS website template by CoolWebTemplates. This--}}
                {{--work is distributed under the Creative Commons Attribution 3.0 License,--}}
                {{--which means that you are free to use it for any personal or commercial purpose provided you credit me in the form of a link back to <a href="http://www.cssmoban.com/" title="模板之家">模板之家</a>.</p>--}}
            {{--<p>Maecenas dignissim mauris in arcu congue tincidunt. Vestibulum elit  nunc, accumsan vitae faucibus vel, scelerisque a quam. Aenean at metus id elit bibendum faucibus. Curabitur ultrices ante nec neque consectetur a aliquet libero lobortis. Ut nibh sem, pellentesque in dictum eu, convallis blandit erat. Cras vehicula tellus nec purus sagittis id scelerisque risus congue. Quisque sed semper massa. Donec id lacus mauris, vitae pretium risus. Fusce sed tempor erat. </p>--}}
            {{--<p><a href="#">Read more </a></p>--}}
        {{--</div>--}}
        <div class="article" style="padding:5px 20px 2px 20px; background:none; border:0;">
            <p><span class="butons"><a href="#">3</a><a href="#">2</a> <a href="#" class="active">1</a></span></p>
        </div>
    </div>
@endsection

@section('javascript')
    <script>

    </script>
@endsection
