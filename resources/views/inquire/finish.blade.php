@extends("layout.repair-same")

@section("content")
    @foreach($posts as $post )
        {{--<form  class="smart-green">--}}
            {{--{{csrf_field()}}--}}
        <form  class="smart-green">
            <h1>报修记录
                <span>查看{{$post->user_name}}的报修记录呗！</span>
            </h1>
            <label>
            <dl style="border:1px solid #9DC45F;margin-top: 10px">
                <dt style="color:#19bc9c">问题描述：</dt>
                <dd>{{$post->user_message}}</dd>
                <dt style="color:#19bc9c">宿舍：</dt>
                <dd ><em class="icon-map-marker"></em>{{$post->user_dormitory_id}} {{$post->user_room}} </dd>
                <dt style="color:#19bc9c">联系方式：</dt>
                <dd><i class="icon-phone"></i>{{$post->user_phone}}&nbsp;&nbsp;<i class=" icon-user"></i>{{$post->user_name}}</dd>
                <dt style="color:#19bc9c">报修时间：</dt>
                <dd><i class=" icon-time"></i>{{$post->created_at}}</dd>
                <dt style="color:#19bc9c">报修状态：</dt>
                <dd><i class=" icon-time"></i>
                    @if ($post->status == 0)
                    已经报修
                    @elseif ($post->status == 1)
                    已经被维修员接单，请耐心等待
                    @else
                    报修已经结束
                    </dd>
                @endif

            </dl>
        </label>
        </form>
    @endforeach


@endsection