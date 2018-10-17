<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>单子列表</title>

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
            <a class="brand">计协报修系统</a>

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
                {{--@if (Auth::check())--}}
                    <li><a href="/backstage"><i class="icon-eye-open"></i><span>查看所有未接单子</span> </a> </li>
                    <li><a href="/backstage/accepted"><i class="icon-hand-down"></i><span>查看个人已接单子</span> </a> </li>
                    <li><a href="/backstage/finished"><i class="icon-hand-down"></i><span>个人已完成单子</span> </a> </li>
                    {{--<li><a href="missed-list.html"><i class="icon-eye-close"></i><span>查看所有未接单子</span> </a> </li>--}}
                    <li><a href="/backstage/bydormitory"><i class="icon-map-marker"></i><span>按宿舍查找单子</span> </a> </li>
                    <li><a href="/reset"><i class="icon-edit"></i><span>修改密码</span> </a> </li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" ><i class="icon-off"></i><span>注销</span> </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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




