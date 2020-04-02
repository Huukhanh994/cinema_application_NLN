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
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#add-contact">Add New Room</button>
                    <!-- Add Contact Popup Model -->        
                    <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Add New Brand</h4> </div>
                                <div class="modal-body">
                                    <from class="form-horizontal form-material">
                                        <form action="{{ route('admin.rooms.store') }}" method="POST" role="form" enctype="multipart/form-data">
                                            @csrf
                                            <div class="tile-body">
                                                <div class="form-group">
                                                    <label class="control-label" for="room_name">Name <span class="m-l-5 text-danger"> *</span></label>
                                                    <input class="form-control @error('room_name') is-invalid @enderror" type="text" name="room_name" id="room_name" value="{{ old('room_name') }}"/>
                                                    @error('room_name') {{ $message }} @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="cluster_id">Cluster</label>
                                                    <select name="cluster_id" id="cluster_id" class="form-control @error('cluster_id') is-invalid @enderror">
                                                        <option value="0">Select a cluster</option>
                                                        @foreach($clusters as $cluster)
                                                            <option value="{{ $cluster->cluster_id }}">{{ $cluster->cluster_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback active">
                                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('cluster_id') <span>{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="qty">Quantity</label>
                                                    <input
                                                        class="form-control @error('qty') is-invalid @enderror"
                                                        type="number"
                                                        placeholder="Enter product quantity"
                                                        id="qty"
                                                        name="qty"
                                                        value="100"
                                                    />
                                                    <div class="invalid-feedback active">
                                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('qty') <span>{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tile-footer">
                                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Room</button>
                                                &nbsp;&nbsp;&nbsp;
                                                <a class="btn btn-secondary" href="{{ route('admin.rooms.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
                                    <th> Cluster </th>
                                    <th> Quantity </th>
                                    <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rooms as $room)
                                    <tr>
                                        <td>{{ $room->id }}</td>
                                        <td>{{ $room->room_name }}</td>
                                        <td>
                                           {{$room->cluster->cluster_name}}
                                        </td>
                                        <td>{{ $room->qty}}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Second group">
                                                <a href="{{ route('admin.rooms.edit', $room->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.rooms.delete', $room->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
@endpush