@extends("layout.backstage-same")
@section("content")


    <div class="box-content">
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">请选择宿舍
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                @foreach($posts as $post)
                <li>
                    <a href="/backstage/bydormitory/{{$post->user_dormitory}}">{{$post->user_dormitory}}</a>
                </li>
                @endforeach
            </ul>

            {{--<form action="/backstage/bydormitory/{post}" method="POST">--}}
                {{--{{csrf_field()}}--}}
                {{--<select name="user_dormitory_id" class="form-control">--}}
                    {{--@foreach($posts as $post)--}}
                        {{--<option>{{$post->user_dormitory}}</option>--}}
                    {{--@endforeach--}}
                {{--</select>--}}
                {{--<label class="hvr-rectangle-out">--}}
                    {{--<input type="submit" ></input>--}}
                {{--</label>--}}
            {{--</form>--}}
        </div>
    </div>
@endsection
