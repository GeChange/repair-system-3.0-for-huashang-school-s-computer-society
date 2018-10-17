@extends("layout.repair-same")

@section("content")
<form action="/inquire/query" method="post" class="smart-green">
    {{csrf_field()}}
    <h1>查询报修
        <span>通过手机号码查询你的报修呗</span>
    </h1>
    <label>
        <span>手机号码:</span>
        <input id="name" type="text" name="name" placeholder="输入您的手机号码" />
    </label>
    <label>
        <span>&nbsp;</span>
        <input type="submit" class="button" value="Send" />
    </label>
</form>

@endsection