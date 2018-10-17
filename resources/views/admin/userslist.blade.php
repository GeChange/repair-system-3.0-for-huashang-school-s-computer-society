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
                                <h3>维修员列表</h3>
                            </div> <!-- /widget-header -->

                            <div class="widget-content">
                                @foreach($users as $user)
                                    <div class="pricing-plans plans-3">
                                        <div class="plan-container">
                                            <div class="plan">
                                                <div class="plan-features">
                                                    <dl>
                                                        <dt style="color:#19bc9c">维修员：</dt>
                                                        <dd><i class=" icon-time"></i>{{$user->name}}</dd>
                                                        <dt style="color:#19bc9c">已经完成单子数：</dt>
                                                        <dd>{{$user->repairs_count}}</dd>
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
