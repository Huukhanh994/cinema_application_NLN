@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Simple Toastr Alerts</h4>
                    <h6 class="card-subtitle">You can use four different alert
                        <code>info, warning, success, and error</code> message.</h6>
                    <div class="button-box">
                        <button class="tst1 btn btn-info">Info Message</button>
                        <button class="tst2 btn btn-warning">Warning Message</button>
                        <button class="tst3 btn btn-success">Success Message</button>
                        <button class="tst4 btn btn-danger">Danger Message</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#add-contact">Add New Cluster</button>
                    <!-- Add Contact Popup Model -->        
                    <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Add New Cluster</h4> </div>
                                <div class="modal-body">
                                    <from class="form-horizontal form-material">
                                        <form action="{{ route('admin.clusters.store') }}" method="POST" role="form" enctype="multipart/form-data">
                                            @csrf
                                            <div class="tile-body">
                                                <div class="form-group">
                                                    <label class="control-label" for="cluster_name">Name <span class="m-l-5 text-danger"> *</span></label>
                                                    <input class="form-control @error('cluster_name') is-invalid @enderror" type="text" name="cluster_name" id="cluster_name" value="{{ old('cluster_name') }}"/>
                                                    @error('cluster_name') {{ $message }} @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="city_id">City</label>
                                                    <select name="city_id" id="city_id" class="form-control @error('city_id') is-invalid @enderror">
                                                        <option value="0">Select a city</option>
                                                        @foreach($cities as $city)
                                                            <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback active">
                                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('brand_id') <span>{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="address">Address</label>
                                                    <input
                                                        class="form-control @error('address') is-invalid @enderror"
                                                        type="text"
                                                        placeholder="Enter product address"
                                                        id="address"
                                                        name="address"
                                                    />
                                                    <div class="invalid-feedback active">
                                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('address') <span>{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="fax">Fax</label>
                                                    <input
                                                        class="form-control @error('fax') is-invalid @enderror"
                                                        type="tel"
                                                        placeholder="Enter product fax"
                                                        id="fax"
                                                        name="fax"
                                                    />
                                                    <div class="invalid-feedback active">
                                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('fax') <span>{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="hotline">Hotline</label>
                                                    <input
                                                        class="form-control @error('hotline') is-invalid @enderror"
                                                        type="text"
                                                        placeholder="Enter product hotline"
                                                        id="hotline"
                                                        name="hotline"
                                                    />
                                                    <div class="invalid-feedback active">
                                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('hotline') <span>{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tile-footer">
                                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Cluster</button>
                                                &nbsp;&nbsp;&nbsp;
                                                <a class="btn btn-secondary" href="{{ route('admin.clusters.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                                            </div>
                                        </form>
                                    </from>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    {{-- End Popup Model --}}
                    <div class="table-responsive">
                        <table class="table table-bordered m-t-30 table-hover contact-list" data-paging="true" data-paging-size="7" id="sampleTable">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Name </th>
                                    <th> City </th>
                                    <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clusters as $cluster)
                                    <tr>
                                        <td>{{ $cluster->cluster_id }}</td>
                                        <td>{{ $cluster->cluster_name }}</td>
                                        <td>
                                           {{$cluster->city['city_name']}}
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Second group">
                                                <a href="{{ route('admin.clusters.edit', $cluster->cluster_id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.clusters.delete', $cluster->cluster_id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom_script')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script src="{{asset('dist/js/pages/toastr.js')}}"></script>
@endpush