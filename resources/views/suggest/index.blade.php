@extends("layout.repair-same")

@section("content")
<form action="/suggesting" method="post" class="smart-green">
    {{csrf_field()}}
    <h1>催单或建议
        <span>你的小小建议是我们进步的动力！</span>
    </h1>
    <label>
        <span>你的名字:</span>
        <input id="name" type="text" name="user_name" placeholder="请输入你的名字" />
    </label>
    <label>
        <span>你的手机号码 :</span>
        <input id="name" type="text" name="user_phone" placeholder="请输入你报修时的号码" />
    </label>
    <label>
        <span>催单或建议:</span>
        <textarea id="message" name="suggest_message" placeholder="你的建议或吐槽"></textarea>
    </label>
    <label>
        <span>&nbsp;</span>
        <input type="submit"  class="button" value="提交" />
    </label>

</form>
@endsection