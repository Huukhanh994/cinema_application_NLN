@extends('admin.app')

@section('title') {{ $pageTitle }} @endsection

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-cogs"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Customtab vertical Tab</h4>
                    <h6 class="card-subtitle">Use default tab with class <code>vtabs, tabs-vertical & customvtab</code></h6>
                    <!-- Nav tabs -->
                    <div class="vtabs customvtab">
                        <ul class="nav nav-tabs tabs-vertical" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#general" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">General</span> </a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#site-logo" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Site Logo</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#footer-seo" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Footer &amp; SEO</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#social-links" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Social Links</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#analytics" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Analytics</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#payments" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Payments</span></a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="general">
                                @include('admin.settings.includes.general')
                            </div>
                            <div class="tab-pane fade" id="site-logo">
                                @include('admin.settings.includes.logo')
                            </div>
                            <div class="tab-pane fade" id="footer-seo">
                                @include('admin.settings.includes.footer_seo')
                            </div>
                            <div class="tab-pane fade" id="social-links">
                                @include('admin.settings.includes.social_links')
                            </div>
                            <div class="tab-pane fade" id="analytics">
                                @include('admin.settings.includes.analytics')
                            </div>
                            <div class="tab-pane fade" id="payments">
                                @include('admin.settings.includes.payments')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection