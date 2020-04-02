@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-briefcase"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <form action="{{ route('admin.clusters.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="cluster_name">Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('cluster_name') is-invalid @enderror" type="text" name="cluster_name" id="cluster_name" value="{{ old('cluster_name', $cluster->cluster_name) }}"/>
                            <input type="hidden" name="cluster_id" value="{{ $cluster->cluster_id }}">
                            @error('cluster_name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="address">Address <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{ old('address', $cluster->address) }}"/>
                            @error('address') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="city_id">City</label>
                            <select name="city_id" id="city_id" class="form-control @error('city_id') is-invalid @enderror">
                                <option value="0">Select a City</option>
                                @foreach($city as $item)
                                    @if ($cluster->cluster_id == $item->id)
                                        <option value="{{ $item->id }}" selected>{{ $item->city_name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->city_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="invalid-feedback active">
                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('city_id') <span>{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="fax">Fax <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('fax') is-invalid @enderror" type="text" name="fax" id="fax" value="{{ old('fax', $cluster->fax) }}"/>
                            @error('fax') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="hotline">Hotline <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('hotline') is-invalid @enderror" type="text" name="hotline" id="hotline" value="{{ old('hotline', $cluster->hotline) }}"/>
                            @error('hotline') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Cluster</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.clusters.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection