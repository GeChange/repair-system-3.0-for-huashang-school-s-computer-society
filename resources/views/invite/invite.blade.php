@extends("layout.admin-same")

@section("content")
    <div class="main">
        {!! csrf_field() !!}
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
                                        <div class="plan green">


                                            <div class="plan-actions">
                                                <a href="/invite/create" class="btn btn-warning">生成</a>
                                            </div> <!-- /plan-actions -->
                                            <div class="plan-actions" style="text-align: center">
                                                <span class="term"><a href="/invite/finish">邀请码列表</a></span>
                                            </div>
                                        </div> <!-- /plan -->
                                    </div> <!-- /plan-container -->




                                </div> <!-- /pricing-plans -->
                            </div> <!-- /widget-content -->


                        </div> <!-- /widget -->

                    </div> <!-- /span12 -->


                </div> <!-- /row -->

            </div> <!-- /container -->

        </div> <!-- /main-inner -->
    </div> <!-- /main -->

@endsection
