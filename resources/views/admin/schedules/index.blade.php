@extends('admin.app')

@section('title')
    {{$pageTitle}}
@endsection
@push('custom_css')
    <!-- Footable CSS -->
    <link href="{{asset('/assets/node_modules/footable/css/footable.bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">
    <!-- page css -->
    <link href="{{asset('dist/css/pages/footable-page.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/pages/other-pages.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="{{asset('/assets/node_modules/clockpicker/dist/jquery-clockpicker.min.css')}}" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="{{asset('/assets/node_modules/jquery-asColorPicker-master/dist/css/asColorPicker.css')}}" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="{{asset('/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="{{asset('/assets/node_modules/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/node_modules/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
@endpush
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
                <h6 class="card-subtitle"></h6>
                <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#add-contact">Add New Schedule</button>
                <!-- Add Contact Popup Model -->        
                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Add New Schedule</h4> </div>
                                <div class="modal-body">
                                    <from class="form-horizontal form-material">
                                        <form action="{{ route('admin.schedules.store') }}" method="POST" role="form">
                                            @csrf
                                            <h3 class="tile-title">Schedule Information</h3>
                                            <hr>
                                            <div class="tile-body">
                                                <div class="form-group">
                                                    <label for="film_id" class="form-control">Film</label>
                                                    <select name="film_id" id="film_id" class="form-control">
                                                        @foreach ($films as $film)
                                                            <option value="{{$film->id}}">{{$film->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="room_id" class="form-control">Room</label>
                                                    <select name="room_id" id="room_id" class="form-control" >
                                                        @foreach ($rooms as $room)
                                                            <option value="{{$room->id}}">{{$room->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="schedule_time">Setting Time</label>
                                                    <input type="datetime-local text" class="form-control datetime" name="schedule_time" id="schedule_time">
                                                </div>
                                            </div>
                                            <div class="tile-footer">
                                                <div class="row d-print-none mt-2">
                                                    <div class="col-12 text-right">
                                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Schedule</button>
                                                        <a class="btn btn-danger" href="{{ route('admin.schedules.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </from>
                                </div>
                           
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <div class="table-responsive">
                    <table id="demo-foo-addrow" class="table table-bordered m-t-30 table-hover contact-list" data-paging="true" data-paging-size="7">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Film</th>
                                <th>Room</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                                    <tr>
                                        <td>{{$schedule->id}}</td>
                                        <td>{{$schedule->start_time}}</td>
                                        <td>{{$schedule->end_time}}</td>
                                        <td>
                                            {{$schedule->film['name']}}
                                        </td>
                                        <td>
                                            {{$schedule->room['name']}}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.schedules.delete', $schedule->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
</div>
@endsection

@push('custom_script')
    <!-- Footable -->
    <script src="{{asset('/assets/node_modules/moment/moment.js')}}"></script>
    <script src="{{asset('/assets/node_modules/footable/js/footable.min.js')}}"></script>
    <!--FooTable init-->
    <script src="{{asset('dist/js/pages/footable-init.js')}}"></script>
    <!-- Plugins for this page -->
    <!-- ============================================================== -->
    <!-- Plugin JavaScript -->
    <script src="{{asset('/assets/node_modules/moment/moment.js')}}"></script>
    <script src="{{asset('/assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="{{asset('/assets/node_modules/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="{{asset('/assets/node_modules/jquery-asColor/dist/jquery-asColor.js')}}"></script>
    <script src="{{asset('/assets/node_modules/jquery-asGradient/dist/jquery-asGradient.js')}}"></script>
    <script src="{{asset('/assets/node_modules/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js')}}"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="{{asset('/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="{{asset('/assets/node_modules/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{asset('/assets/node_modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script>
        // Date & Time
        $('.datetime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY h:mm A'
            }
        });
    </script>
@endpush