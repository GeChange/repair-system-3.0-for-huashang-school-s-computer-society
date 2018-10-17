@extends("layout.backstage-same")

@section("content")

<div class="account-container register">

    <div class="content clearfix">

        <form ction="reset" method="post">

            <h1>修改密码</h1>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! csrf_field() !!}
            <div class="login-fields">

                <p>请牢记你的密码</p>

                <div class="field">
                    <label for="firstname">原始密码:</label>
                    <input  type="password" autocomplete="off" placeholder="请输入原密码" name="oldpassword" class="login">
                </div> <!-- /field -->

                <div class="field">
                    <label for="lastname">新密码:</label>
                    <input type="password" autocomplete="off" id="register_password" placeholder="请输入新的密码" name="password" class="login">
                </div> <!-- /field -->


                <div class="field">
                    <label for="email">重复密码:</label>
                    <input type="password" autocomplete="off" placeholder="重复输入新的密码" name="password_confirmation" class="login">
                </div> <!-- /field -->



            </div> <!-- /login-fields -->

            <div class="login-actions">

                <button type="submit" class="button btn btn-primary btn-large">确定</button>

            </div> <!-- .actions -->

        </form>

    </div> <!-- /content -->

</div>
@endsection