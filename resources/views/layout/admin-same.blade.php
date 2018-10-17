<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>系统后台</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-responsive.min.css" rel="stylesheet">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="/css/font-awesome.css" rel="stylesheet">

    <link href="/css/style.css" rel="stylesheet">

    <link href="css/pages/signin.css" rel="stylesheet" type="text/css">

    <link href="/css/pages/plans.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" >计协报修系统</a>

            <button type="button" class="btn btn-default " data-toggle="collapse"
                    data-target="#demo"  style="float:right;">
                管理
            </button>
            <!--/.nav-collapse -->
        </div>

        <!-- /container -->
    </div>
    <!-- /navbar-inner -->
</div> <!-- /navbar -->


<div class="subnavbar collapse" id="demo">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
			    <li><a  href="{{url('admin/showlist')}}"><i class=" icon-home"></i><span>所有未接单子</span> </a> </li>
                <li><a  href="{{url('admin/showaccept')}}"><i class=" icon-home"></i><span>所有已接单子</span> </a> </li>
                <li><a  href="{{url('admin/showfinish')}}"><i class=" icon-list"></i><span>所有已完成单子</span> </a> </li>
                <li><a  href="{{url('admin/showusers')}}"><i class=" icon-list"></i><span>维修员完成单子数</span> </a> </li>
                <li><a  href="{{url('admin/changestate')}}"><i class="icon-lock"></i><span>关闭或打开网站</span> </a> </li>
                <li><a href="{{url('admin/notice')}}"><i class="icon-bullhorn"></i><span>前台公告</span> </a> </li>
                <li><a href="/invite"><i class="icon-bullhorn"></i><span>邀请码</span> </a> </li>
                <li><a href="/look_suggested"><i class=" icon-comment"></i><span>投诉意见</span> </a> </li>
                <li><a href="#" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" ><i class="icon-off"></i><span>注销</span> </a>
                    <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>

            </ul>
        </div>
        <!-- /container -->
    </div>
    <!-- /subnavbar-inner -->
</div> <!-- /subnavbar -->


@yield("content")



<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/jquery-1.7.2.min.js"></script>

<script src="/js/bootstrap.js"></script>
<script src="/js/base.js"></script>
<!-- Scripts -->
{{--<script src="{{ asset('js/app.js') }}"></script>--}}

</body>

</html>




