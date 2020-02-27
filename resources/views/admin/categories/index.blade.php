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
                    <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#add-category">Add New Category</button>
                    <!-- Add Contact Popup Model -->        
                    <div id="add-category" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Add New Contact</h4> </div>
                                <div class="modal-body">
                                    <from class="form-horizontal form-material">
                                        <form action="{{ route('admin.categories.store') }}" method="POST" role="form" enctype="multipart/form-data">
                                            @csrf
                                            <div class="tile-body">
                                                <div class="form-group">
                                                    <label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}"/>
                                                    @error('name') {{ $message }} @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="description">Description</label>
                                                    <textarea class="form-control" rows="4" name="description" id="description">{{ old('description') }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="parent">Parent Category <span class="m-l-5 text-danger"> *</span></label>
                                                    <select id=parent class="form-control custom-select mt-15 @error('parent_id') is-invalid @enderror" name="parent_id">
                                                        <option value="0">Select a parent category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                                        @endforeach
                                                    </select>
                                                    @error('parent_id') {{ $message }} @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" id="featured" name="featured"/>Featured Category
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" id="menu" name="menu"/>Show in Menu
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Category Image</label>
                                                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                                                    @error('image') {{ $message }} @enderror
                                                </div>
                                            </div>
                                            <div class="tile-footer">
                                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Category</button>
                                                &nbsp;&nbsp;&nbsp;
                                                <a class="btn btn-secondary" href="{{ route('admin.categories.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
                                    <th> Slug </th>
                                    <th class="text-center"> Parent </th>
                                    <th class="text-center"> Featured </th>
                                    <th class="text-center"> Menu </th>
                                    <th class="text-center"> Order </th>
                                    <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    @if ($category->id != 1)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>{{ $category->parent->name }}</td>
                                            <td class="text-center">
                                                @if ($category->featured == 1)
                                                    <span class="badge badge-success">Yes</span>
                                                @else
                                                    <span class="badge badge-danger">No</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($category->menu == 1)
                                                    <span class="badge badge-success">Yes</span>
                                                @else
                                                    <span class="badge badge-danger">No</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                {{ $category->order }}
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-label="Second group">
                                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('admin.categories.delete', $category->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
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