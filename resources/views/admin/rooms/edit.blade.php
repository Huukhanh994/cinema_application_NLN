@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
{{-- <style>
    body
    {
      font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    }

    #Username
    {
      border:none;
      border-bottom:1px solid;
    }

    .screen
    {
      width:100%;
      height:20px;
      background:#4388cc;
      color:#fff;
      line-height:20px;
      font-size:15px;
    }

    .smallBox::before
    {
      content:".";
      width:15px;
      height:15px;
      float:left;
      margin-right:10px;
    }
    .greenBox::before
    {
      content:"";
      background:Green;
    }
    .redBox::before
    {
      content:"";
      background:Red;
    }
    .emptyBox::before
    {
      content="";
      box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
        background-color:#ccc;
    }

    .seats
    {
      border:1px solid red;background:yellow;
    } 



    .seatGap
    {
      width:40px;
    }

    .seatVGap
    {
      height:40px;
    }

    table
    {
      text-align:center;
    }


    .Displaytable
    {
      text-align:center;
    }
    .Displaytable td, .Displaytable th {
        border: 1px solid;
        text-align: left;
    }

    textarea
    {
      border:none;
      background:transparent;
    }



    input[type=checkbox] {
        width:0px;
        margin-right:18px;
    }

    input[type=checkbox]:before {
        content: "";
        width: 15px;
        height: 15px;
        display: inline-block;
        vertical-align:middle;
        text-align: center;
        box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
        background-color:#ccc;
    }

    input[type=checkbox]:checked:before {
        background-color:Green;
        font-size: 15px;
    }

</style> --}}
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-briefcase"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                  <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                  <li class="nav-item"><a class="nav-link" href="#add-seat" data-toggle="tab">Add Seat in this room</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <h3 class="tile-title">{{ $subTitle }}</h3>
                    <form action="{{ route('admin.rooms.update') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="tile-body">
                            <div class="form-group">
                                <label class="control-label" for="room_name">Name <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control @error('room_name') is-invalid @enderror" type="text" name="room_name" id="room_name" value="{{ old('room_name', $room->room_name) }}"/>
                                <input type="hidden" name="room_id" value="{{ $room->id }}">
                                @error('room_name') {{ $message }} @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="cluster_id">Cluster</label>
                                <select name="cluster_id" id="cluster_id" class="form-control @error('cluster_id') is-invalid @enderror">
                                    <option value="0">Select a Cluster</option>
                                    @foreach($clusters as $cluster)
                                        @if ($room->cluster_id == $cluster->cluster_id)
                                            <option value="{{ $cluster->cluster_id }}" selected>{{ $cluster->cluster_name }}</option>
                                        @else
                                            <option value="{{ $cluster->cluster_id }}">{{ $cluster->cluster_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="invalid-feedback active">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('cluster_id') <span>{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Quantity </label>
                                <input class="form-control @error('qty') is-invalid @enderror" id="qty" type="text" value="{{ old('qty',$room->qty) }}" name="qty" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline"> 
                                @error('qty') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Room</button>
                            &nbsp;&nbsp;&nbsp;
                            <a class="btn btn-secondary" href="{{ route('admin.rooms.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="add-seat">
                    {{-- <table id="seatsBlock">
                            <p id="notification"></p>
                        <tr>
                            <td colspan="14"><div class="screen">SCREEN</div></td>
                            <td rowspan="20">
                                <div class="smallBox greenBox">Selected Seat</div> <br/>
                                <div class="smallBox redBox">Reserved Seat</div><br/>
                                <div class="smallBox emptyBox">Empty Seat</div><br/>
                            </td>
                            
                            <br/>
                        </tr>
                            
                        <tr>
                            <td></td>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                            <td>9</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                        </tr> --}}
                        
                        {{-- Row A --}}
                        
                        {{-- @foreach ($rows as $row)
                        <tr>
                            @if ($row->row === 'A')
                            <td>{{$row->row}}</td>
                            @foreach ($seats as $seat)
                                @if ($seat->row === $row->row)
                                    <td><input type="checkbox" name="{{$seat->name}}" id="{{$seat->name}}" value="{{$seat->name}}"></td>
                                @endif
                            @endforeach
                            @endif
                        </tr>
                        @endforeach --}}
                        
                        {{-- @foreach ($rows as $row)
                        <tr>
                            @if ($row->row === 'B')
                            <td>{{$row->row}}</td>
                            @foreach ($seats as $seat)
                                @if ($seat->row === $row->row)
                                    <td><input type="checkbox" name="{{$seat->name}}" id="{{$seat->name}}" value="{{$seat->name}}"></td>
                                @endif
                            @endforeach
                            @endif
                        </tr>
                        @endforeach

                        @foreach ($rows as $row)
                        <tr>
                            @if ($row->row === 'J')
                            <td>{{$row->row}}</td>
                            @foreach ($seats as $seat)
                                @if ($seat->row === $row->row)
                                    <td><input type="checkbox" name="{{$seat->name}}" id="{{$seat->name}}" value="{{$seat->name}}"></td>
                                @endif
                            @endforeach
                            @endif
                        </tr>
                        @endforeach --}}

                        
                    {{-- </table> --}}
                    <br>
                    <div class="card">
                        <add-seat :roomid="{{$room->id}}"></add-seat>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts_vue')
    <script type="text/javascript" src="{{ asset('backend/js/app.js') }}"></script>
@endpush
