@extends("layout.admin-same")
@section('title')
    <title>前台公告</title>
@endsection
@section('content')
    <ul class="breadcrumb">
        <li>
            更改公告
        </li>
    </ul>
    <div class="box col-md-3">
        <div class="box-inner">
            <form action='{{url('admin/notice')}}' method="post">
                {{csrf_field()}}
                <div class="row-bin excerpt" style="border: 1px solid #EAEAEA;padding:5px;background-color: #F9F9F9">
                    <h4>请填写前台公告:</h4>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" style="width: 300px" name="notice">{{config('web.webshow')}}</textarea>
                    </div>
                </div>

                <div style="text-align: right; margin-right: 10%" >
                    <input type="submit" class="btn btn-warning" value="提交">
                </div>
            </form>
        </div>
    </div>
@endsection

