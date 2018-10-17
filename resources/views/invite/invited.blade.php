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
                                <h3>邀请码</h3>
                            </div> <!-- /widget-header -->

                            <div class="widget-content">

                                <div class="pricing-plans plans-3">

                                    <div class="plan-container">
                                        @foreach($posts as $post)
                                        <div class="plan green">
                                            <div class="plan-header">


                                                <div class="plan-price">
                                                    <span>{{$post->code}}</span><span class="term">你生成的邀请码</span>
                                                </div> <!-- /plan-price -->


                                            </div> <!-- /plan-header -->


                                            <div class="plan-actions" style="text-align: center">
                                                <span class="term">总次数：300 已使用</span><span>{{$post->uses}}</span>
                                            </div> <!-- /plan-actions -->


                                        </div> <!-- /plan -->
                                        @endforeach
                                    </div> <!-- /plan-container -->


                                </div> <!-- /pricing-plans -->

                            </div> <!-- /widget-content -->
                            {{--{{$posts->links()}}--}}

                        </div> <!-- /widget -->

                    </div> <!-- /span12 -->


                </div> <!-- /row -->

            </div> <!-- /container -->

        </div> <!-- /main-inner -->
    </div> <!-- /main -->

@endsection
