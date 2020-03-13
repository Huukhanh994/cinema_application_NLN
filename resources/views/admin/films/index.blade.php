@extends('admin.app')
@section('title')
    {{$pageTitle}}
@endsection

@push('custom_css')
    <!-- page CSS -->
    {{-- <link href="{{asset('/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{asset('/assets/node_modules/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{asset('/assets/node_modules/switchery/dist/switchery.min.css')}}" rel="stylesheet" /> --}}
    {{-- <link href="{{asset('/assets/node_modules/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" /> --}}
    <link href="{{asset('/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link href="{{asset('/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
    {{-- <link href="{{asset('/assets/node_modules/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" /> --}}
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
        <div class="col-md-12">
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Contact Emplyee list</h4>
                    <h6 class="card-subtitle"></h6>
                    <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#add-contact">Add New Film</button>
                    <!-- Add Contact Popup Model -->        
                    <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Add New Film</h4> </div>
                                    <div class="modal-body">
                                        <from class="form-horizontal form-material">
                                            <form action="{{ route('admin.films.store') }}" method="POST" role="form">
                                                @csrf
                                                <h3 class="tile-title">Film Information</h3>
                                                <hr>
                                                <div class="tile-body">
                                                    <div class="form-group">
                                                        <label class="control-label" for="name">Name</label>
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            placeholder="Enter attribute name"
                                                            id="name"
                                                            name="name"
                                                            value="{{ old('name') }}"
                                                        />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="producer">Producer</label>
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            placeholder="Enter attribute producer"
                                                            id="producer"
                                                            name="producer"
                                                            value="{{ old('producer') }}"
                                                        />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="actor">Actor</label>
                                                        <div class="tags-default">
                                                            <input type="text" id="actor" name="actor" class="form-control" value="" data-role="tagsinput" placeholder="add tags" /> </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Duration set 90 </label>
                                                        <input id="duration" type="text" value="90" name="duration" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline"> </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="author">Author</label>
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            placeholder="Enter attribute author"
                                                            id="author"
                                                            name="author"
                                                            value="{{ old('author') }}"
                                                        />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="date_release">Date Realease</label>
                                                        <input
                                                            class="form-control"
                                                            type="date"
                                                            placeholder="Enter attribute date realease"
                                                            id="date_release"
                                                            name="date_release"
                                                            value="{{ old('date_release') }}"
                                                        />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="describe">Description</label>
                                                        <textarea name="describe" id="describe" rows="8" class="form-control"></textarea>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label" for="country">Country</label>
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            placeholder="Enter attribute country"
                                                            id="country"
                                                            name="country"
                                                            value="{{ old('country') }}"
                                                        />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="language">Language</label>
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            placeholder="Enter attribute language"
                                                            id="language"
                                                            name="language"
                                                            value="{{ old('language') }}"
                                                        />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="rates" class="form-control">Rate</label>
                                                        <select name="rates[]" id="rates" class="form-control" multiple>
                                                            @foreach ($rates as $rate)
                                                                <option value="{{$rate->id}}">{{$rate->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="brand_id" class="form-control">Brand</label>
                                                        <select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-valid @enderror" >
                                                            <option value="0">Select a brand</option>
                                                            @foreach ($brands as $brand)
                                                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback active">
                                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('brand_id') <span>{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="categories" class="form-control">Categories</label>
                                                        <select name="categories[]" id="categories" class="form-control" multiple>
                                                            @foreach ($categories as $category)
                                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="custom-control custom-checkbox m-b-0">
                                                            <input type="checkbox" class="custom-control-input" name="status">
                                                            <span class="custom-control-label">Status</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="tile-footer">
                                                    <div class="row d-print-none mt-2">
                                                        <div class="col-12 text-right">
                                                            <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Film</button>
                                                            <a class="btn btn-danger" href="{{ route('admin.films.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
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
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Producer</th>
                                    <th>Duration</th>
                                    <th>Author</th>
                                    <th>Actor</th>
                                    <th>Date Realease</th>
                                    <th>Describle</th>
                                    <th>Country</th>
                                    <th>Languge</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($films as $film)
                                    <tr>
                                        <td>{{$film->id}}</td>
                                        <td>{{$film->name}}</td>
                                        <td>{{$film->producer}}</td>
                                        <td>{{$film->actor}}</td>
                                        <td>{{$film->duration}}</td>
                                        <td>{{$film->author}}</td>
                                        <td>{{$film->date_release}}</td>
                                        <td>{{$film->excerpt(100)}}</td>
                                        <td>{{$film->country}}</td>
                                        <td>{{$film->language}}</td>
                                        <td>{{$film->status}}</td>
                                        <td>
                                            @foreach ($film->categories as $category)
                                                <span class="badge badge-info">{{ $category->name }}</span>
                                            @endforeach
                                        </td>
                                       
                                        <td>
                                            <a href="{{ route('admin.films.edit', $film->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.films.delete', $film->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
    <!-- This page plugins -->
    <!-- ============================================================== -->
    {{-- <script src="{{asset('/assets/node_modules/switchery/dist/switchery.min.js')}}"></script> --}}
    {{-- <script src="{{asset('/assets/node_modules/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script> --}}
    {{-- <script src="{{asset('/assets/node_modules/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script> --}}
    <script src="{{asset('/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
    {{-- <script src="{{asset('/assets/node_modules/dff/dff.js')}}" type="text/javascript"></script> --}}
    {{-- <script type="text/javascript" src="{{asset('/assets/node_modules/multiselect/js/jquery.multi-select.js')}}"></script> --}}

    <script>
        $(function () {
            $("input[name='duration']").TouchSpin();
            $("input[name='duration']").TouchSpin({
                initval: 40
            });
        });
    </script>
@endpush
