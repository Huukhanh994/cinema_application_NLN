@extends('admin.app')
@section('title')
    {{$pageTitle}}
@endsection
@push('custom_css')
    <!-- page CSS -->
    <link href="{{asset('/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    {{-- <link href="{{asset('/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" /> --}}
    <!-- Dropzone css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/js/plugins/dropzone.min.css') }}"/>
@endpush
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
    </div>
    @include('admin.partials.flash')

    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                    <li class="nav-item"><a class="nav-link" href="#images" data-toggle="tab">Images</a></li>
                    <li class="nav-item"><a class="nav-link" href="#attributes" data-toggle="tab">Attributes</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Edit Information</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.films.update')}}" class="form-horizontal form-bordered" method="POST">
                                    @csrf
                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3" for="name">Name</label>
                                            <div class="col-md-9">
                                                <input type="text" 
                                                name="name" 
                                                id="name" class="form-control @error('name') is-valid @enderror" 
                                                placeholder="Enter attribute name" 
                                                value="{{old('name',$film->film_name)}}">
                                            </div>
                                            <input type="hidden" name="film_id" value="{{ $film->id }}">
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3" for="actor">Actor</label>
                                            <div class="col-md-9">
                                                <div class="tags-default">
                                                    <input type="text" name="actor" id="actor" value="{{$film->actor}}" data-role="tagsinput" placeholder="add tags" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3" for="producer">Producer</label>
                                            <div class="col-md-9">
                                                <input type="text" name="producer" id="producer" placeholder="Enter film producer" class="form-control @error('producer') is-valid @enderror" value="{{old('producer',$film->producer)}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3" for="duration">Duration</label>
                                            <div class="col-md-9">
                                                <input id="duration" type="number" value="90" maxlength="200" name="duration" placeholder="Enter film duration" class="form-control @error('duration') is-valid @enderror" value="{{old('duration',$film->duration)}}">
                                                {{-- <input type="number" name="duration" maxlength="200" id="duration" > --}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3" for="author">Author</label>
                                            <div class="col-md-9">
                                                <input type="text" name="author" id="author" placeholder="Enter film author" class="form-control @error('author') is-valid @enderror" value="{{old('author',$film->author)}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3" for="date_release">Date Release</label>
                                            <div class="col-md-9">
                                                <input type="date" name="date_release" id="date_release" class="form-control @error('date_release') is-valid @enderror" placeholder="dd/mm/yyyy" value="{{old('date_release',$film->date_release)}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3" for="describe">Describe</label>
                                            <div class="col-md-9">
                                                <textarea name="describe" id="describe" rows="8" class="form-control">{{ old('describe', $film->describe) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3" for="brand_id">Brand</label>
                                            <div class="col-md-9">
                                                <select class="form-control @error('brand_id') is-valid @enderror custom-select" name="brand_id" id="brand_id">
                                                    <option value="0">Select a brand</option>
                                                    @foreach ($brands as $brand)
                                                        @if ($film->brand_id == $brand->id)
                                                            <option value="{{$brand->id}}" selected>{{$brand->name}}</option>
                                                        @else
                                                            <option value="{{$brand->id}}">{{$brand->name}}</option>        
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3" id="categories">Category</label>
                                            <div class="col-md-9">
                                                <select class="form-control @error('categories') is-valid @enderror custom-select" name="categories[]" id="categories" multiple>
                                                    <option value="0">Select a category</option>
                                                    @foreach ($categories as $category)
                                                        @php $check = in_array($category->id, $film->categories->pluck('id')->toArray()) ? 'selected' : ''  @endphp
                                                        <option value="{{$category->id}}" {{$check}}>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3" id="rates">Rated</label>
                                            <div class="col-md-9">
                                                <select class="form-control @error('rates') is-valid @enderror custom-select" name="rates[]" id="rates" multiple>
                                                    <option value="0">Select a rates</option>
                                                    @foreach ($rates as $rate)
                                                        @php $check = in_array($rate->id, $film->rates->pluck('id')->toArray()) ? 'selected' : ''  @endphp
                                                        <option value="{{$rate->id}}" {{$check}}>{{$rate->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3" for="country">Country</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control @error('country') is-valid @enderror" name="country" id="country" value="{{old('country',$film->country)}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3" for="language">Language</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control @error('language') is-valid @enderror" name="language" id="language" value="{{old('language',$film->language)}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="custom-control custom-checkbox col-md-3">
                                                <input type="checkbox" class="custom-control-input @error('status') is-valid @enderror" name="status" id="status" {{$film->status == 1 ? 'checked' : ''}}>
                                                <span class="custom-control-label">Status</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="offset-sm-3 col-md-9">
                                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>
                                                        <a href="{{route('admin.films.index')}}" class="btn btn-inverse">Cancel</a>
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
                <div class="tab-pane" id="images">
                    <div class="tile">
                        <h3 class="tile-title">Upload Image</h3>
                        <hr>
                        <div class="tile-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" class="dropzone" id="dropzone" style="border: 2px dashed rgba(0,0,0,0.3)">
                                        <input type="hidden" name="film_id" value="{{ $film->id }}">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <button class="btn btn-success" type="button" id="uploadButton">
                                        <i class="fa fa-fw fa-lg fa-upload"></i>Upload Images
                                    </button>
                                </div>
                            </div>
                            @if ($film->images)
                                <hr>
                                <div class="row">
                                    @foreach($film->images as $image)
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <img src="{{ asset('storage/'.$image->full) }}" id="brandLogo" class="img-fluid" alt="img">
                                                    <a class="card-link float-right text-danger" href="{{ route('admin.films.images.delete', $image->id) }}">
                                                        <i class="fa fa-fw fa-lg fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="attributes">
                    <film-attribute :filmid="{{$film->id}}"></film-attribute>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@push('custom_script')
    <!-- This page plugins -->
    <script src="{{asset('/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    {{-- <script src="{{asset('/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script> --}}
    <!-- Dropzone Plugin JavaScript -->
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dropzone.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap-notify.min.js') }}"></script>
    <script>
        Dropzone.autoDiscover = false;
        $(document).ready(function() {
            var myDropzone = new Dropzone("#dropzone", {
                paramName: "image",
                addRemoveLinks: false,
                maxFilesize: 4,
                parallelUploads: 2,
                uploadMultiple: false,
                url: "{{ route('admin.films.images.upload') }}",
                autoProcessQueue: false,
            });
            myDropzone.on("queuecomplete", function (file) {
                window.location.reload();
                showNotification('Completed', 'All product images uploaded', 'success', 'fa-check');
            });
            $('#uploadButton').click(function(){
                if (myDropzone.files.length === 0) {
                    showNotification('Error', 'Please select files to upload.', 'danger', 'fa-close');
                } else {
                    myDropzone.processQueue();
                }
            });
            function showNotification(title, message, type, icon)
            {
                $.notify({
                    title: title + ' : ',
                    message: message,
                    icon: 'fa ' + icon
                },{
                    type: type,
                    allow_dismiss: true,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                });
            }
        });
    </script>
@endpush

@push('scripts_vue')
    <script type="text/javascript" src="{{ asset('backend/js/app.js') }}"></script>
@endpush