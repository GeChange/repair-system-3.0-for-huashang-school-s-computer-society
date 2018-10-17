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
                                <h3>投诉单子</h3>
                            </div> <!-- /widget-header -->

                            <div class="widget-content">
                                @foreach($posts as $post)
                                    <div class="pricing-plans plans-3">
                                        <div class="plan-container">
                                            <div class="plan">
                                                <div class="plan-header">

                                                    <div class="plan-title">

                                                        <h4 >投诉或建议</h4>
                                                    </div> <!-- /plan-title -->

                                                </div> <!-- /plan-header -->

                                                <div class="plan-features">
                                                    <dl>
                                                        <dt style="color:#19bc9c">投诉或建议：</dt>
                                                        <dd>{{$post->suggest_message}}</dd>
                                                        <dt style="color:#19bc9c">联系方式：</dt>
                                                        <dd><i class="icon-phone"></i>{{$post->user_phone}}&nbsp;&nbsp;<i class=" icon-user"></i>{{$post->user_name}}</dd>
                                                        <dt style="color:#19bc9c">投诉时间：</dt>
                                                        <dd><i class=" icon-time"></i>{{$post->updated_at}}</dd>
                                                        <dt style="color:#19bc9c">接单人：</dt>
                                                        <dd><i class=" icon-time"></i>{{$post->name}}</dd>
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
                {{$posts->links()}}
            </div>

        </div> <!-- /main-inner -->

    </div> <!-- /main -->
@endsection
