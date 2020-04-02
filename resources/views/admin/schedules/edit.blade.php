@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
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
    {{-- <link href="{{asset('/assets/node_modules/clockpicker/dist/jquery-clockpicker.min.css')}}" rel="stylesheet"> --}}
    <!-- Color picker plugins css -->
    {{-- <link href="{{asset('/assets/node_modules/jquery-asColorPicker-master/dist/css/asColorPicker.css')}}" rel="stylesheet"> --}}
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
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Edit Schedule</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.schedules.update')}}" class="form-horizontal form-bordered" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3" for="film_id">Select a film</label>
                                <div class="col-md-9">
                                    <select class="form-control @error('film_id') is-valid @enderror custom-select" name="film_id" id="film_id">
                                        @foreach ($film as $item)
                                            @if ($schedule->film_id == $item->id)
                                                <option value="{{$item->id}}" selected>{{$item->film_name}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->film_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                                <div class="invalid-feedback active">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('film_id') <span>{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3" for="room_id">Select a room</label>
                                <div class="col-md-9">
                                    <select class="form-control @error('room_id') is-valid @enderror custom-select" name="room_id" id="room_id">
                                        @foreach ($room as $item)
                                            @if ($schedule->room_id == $item->id)
                                                <option value="{{$item->id}}" selected>{{$item->room_name}} ({{$item->cluster->cluster_name}})</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->room_name}} ({{$item->cluster->cluster_name}})</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="invalid-feedback active">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('room_id') <span>{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Start Time</label>
                                <div class="col-md-9">
                                    <label for="schedule_time">Setting Time</label>
                                    <input type="text" class="form-control @error('schedule_time') is-valid @enderror datetime" name="schedule_time" id="schedule_time" datetime="{{ $schedule_time }}" value="{{ $schedule_time }}">
                                </div>
                                <div class="invalid-feedback active">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('schedule_time') <span>{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="offset-sm-3 col-md-9">
                                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>
                                            <a href="{{route('admin.schedules.index')}}" class="btn btn-inverse">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
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
    {{-- <script src="{{asset('/assets/node_modules/clockpicker/dist/jquery-clockpicker.min.js')}}"></script> --}}
    <!-- Color Picker Plugin JavaScript -->
    {{-- <script src="{{asset('/assets/node_modules/jquery-asColor/dist/jquery-asColor.js')}}"></script> --}}
    {{-- <script src="{{asset('/assets/node_modules/jquery-asGradient/dist/jquery-asGradient.js')}}"></script> --}}
    {{-- <script src="{{asset('/assets/node_modules/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js')}}"></script> --}}
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