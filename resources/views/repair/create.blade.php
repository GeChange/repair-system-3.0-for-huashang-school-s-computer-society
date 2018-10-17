@extends("layout.repair-same")

@section("content")
    <form action="/repair" method="POST" class="smart-green ">
        {{csrf_field()}}
        <h1>计协报修信息填写
            <span>请您认真地填写下面的信息！</span>
        </h1>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <label>
            <span>姓名:</span>
            <input type="text" name="user_name" placeholder="请输入你的名字" value="{{old('user_name')}}"></input>
        </label>
        <label>
            <span>联系方式:</span>
            <input type="text" name="user_phone" placeholder="请输入你的手机号码" value="{{old('user_phone')}}"></input>
        </label>

        <label>
            <span>宿舍号:</span>
            <input type="text" name="user_room" placeholder="宿舍号"value="{{old('user_room')}}"></input>
        </label>

        <label>
            <span>宿舍楼:</span>
            <select name="user_dormitory_id">
                @foreach($posts as $post)
                    <option>{{$post->user_dormitory}}</option>
                @endforeach
            </select>
        </label>

        <label>
            <label>
                <span>电脑故障详情:</span>
                <textarea name="user_message" placeholder="电脑故障详情" required></textarea>
            </label>

            <span>&nbsp;</span>
            <input type="submit" class="button" value="提交" />
        </label>
        <h5 align="center" >created by 华商计协@PeterChan</h5>
        <a style="color: #5E5E5E;" href="{{url('/suggest')}}">报修没人上门？点这!!</a><br><br>
        <a style="color: #5E5E5E;" href="{{url('/inquire')}}">想查看个人报修记录？点这!!</a>
    </form>

@endsection