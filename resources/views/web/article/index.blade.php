@extends('web.layouts.app')

@section('content')
    <div class="mainbar">
            <div class="article" style="max-height: 5000px;">
                <h2>{{$item['title']}}</h2>
                <p>
                    作者：{{$item['author']}}
                    &emsp;发表时间：{{$item['created_at']}}
                    &emsp;阅读量：12312
                </p>
                <hr/>
                @if(isset($item['clover']) && $item['clover'])
                    <img src="{{URL::asset('')}}static/web/images/img_1.jpg" width="613" height="193" alt="image" />
                @endif
                <div>
                    <?php echo $item['content']; ?>
                </div>
            </div>
    </div>
@endsection

@section('javascript')
    <script>

    </script>
@endsection
