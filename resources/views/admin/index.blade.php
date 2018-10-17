@extends("layout.admin-same")

@section("content")
    <div class="main">

        <div class="main-inner">

            <div class="container">

                <div class="row">

                    <div class="span12">

                        <div class="widget">

                            <div class="widget-header">
                                <i class="icon-th-large"></i>
                                <h3>所有已接单子</h3>
                            </div> <!-- /widget-header -->

                            <div class="widget-content">
                                @foreach($users as $user)
                                    <div class="pricing-plans plans-3">
                                        <div class="plan-container">
                                            <div class="plan">
                                                <div class="plan-header">

                                                    <div class="plan-title">
                                                        {{--<div class="dropdown pull-right" style="width:53px;height:26px;background:#e5912d;"><a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown"> <em class=" icon-caret-down"></em></a>--}}
                                                        {{--<ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">--}}
                                                        {{--<li><a href="/backstage/{{$post->id}}/finish"><i class=" icon-arrow-up icon-large"></i>&nbsp;确认完成</a></li>--}}
                                                        {{--</ul>--}}
                                                        {{--</div>--}}
                                                        <h4 >已接单子{{$user->id}}</h4>
                                                    </div> <!-- /plan-title -->

                                                </div> <!-- /plan-header -->

                                                <div class="plan-features">
                                                    <dl>
                                                        <dt style="color:#19bc9c">维修状态：</dt>
                                                        <dd><i class=" icon-time"></i>已经接单</dd>
                                                        <dt style="color:#19bc9c">接单时间：</dt>
                                                        <dd><i class=" icon-time"></i>{{$user->updated_at}}</dd>
                                                        <dt style="color:#19bc9c">接单人：</dt>
                                                        <dd>{{$user->name}}</dd>
                                                        <dt style="color:#19bc9c">投诉意见：</dt>
                                                        <dd>{{$user->suggest_message}}</dd>
                                                        <dt style="color:#19bc9c">报修人：</dt>
                                                        <dd>{{$user->user_name}}</dd>
                                                        <dt style="color:#19bc9c">问题描述：</dt>
                                                        <dd>{{$user->user_message}}</dd>
                                                        <dt style="color:#19bc9c">宿舍：</dt>
                                                        <dd ><em class="icon-map-marker"></em>{{$user->user_dormitory_id}} {{$user->user_room}} </dd>
                                                        <dt style="color:#19bc9c">联系方式：</dt>
                                                        <dd><i class="icon-phone"></i>{{$user->user_phone}}&nbsp;&nbsp;<i class=" icon-user"></i>{{$user->user_name}}</dd>

                                                    </dl>
                                                </div> <!-- /plan-features -->
                                            </div> <!-- /plan -->
                                        </div> <!-- /plan-container -->
                                    </div> <!-- /pricing-plans -->
                                @endforeach


                            </div> <!-- /widget-content -->

                        </div> <!-- /widget -->

                    </div> <!-- /span12 -->


                </div> <!-- /row -->

            </div> <!-- /container -->

            <div style="margin:0 auto;width:300px;">
                {{$users->links()}}
            </div>

        </div> <!-- /main-inner -->

    </div> <!-- /main -->
@endsection
