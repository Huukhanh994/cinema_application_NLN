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
                    <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#add-contact">Add New Attribute</button>
                    <!-- Add Contact Popup Model -->        
                    <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Add New Attribute</h4> </div>
                                <div class="modal-body">
                                    <from class="form-horizontal form-material">
                                        <form action="{{ route('admin.attributes.store') }}" method="POST" role="form">
                                            @csrf
                                            <h3 class="tile-title">Attribute Information</h3>
                                            <hr>
                                            <div class="tile-body">
                                                <div class="form-group">
                                                    <label class="control-label" for="code">Code</label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        placeholder="Enter attribute code"
                                                        id="code"
                                                        name="code"
                                                        value="{{ old('code') }}"
                                                    />
                                                </div>
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
                                                    <label class="control-label" for="frontend_type">Frontend Type</label>
                                                    @php $types = ['select' => 'Select Box', 'radio' => 'Radio Button', 'text' => 'Text Field', 'text_area' => 'Text Area']; @endphp
                                                    <select name="frontend_type" id="frontend_type" class="form-control">
                                                        @foreach($types as $key => $label)
                                                            <option value="{{ $key }}">{{ $label }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" id="is_filterable" name="is_filterable"/>Filterable
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" id="is_required" name="is_required"/>Required
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tile-footer">
                                                <div class="row d-print-none mt-2">
                                                    <div class="col-12 text-right">
                                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Attribute</button>
                                                        <a class="btn btn-danger" href="{{ route('admin.attributes.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
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
                    {{-- End Popup Model --}}
                    <div class="table-responsive">
                        <table class="table table-bordered m-t-30 table-hover contact-list" data-paging="true" data-paging-size="7" id="sampleTable">
                            <thead>
                                <tr>
                                    <th> Code </th>
                                    <th> Name </th>
                                    <th class="text-center"> Frontend Type </th>
                                    <th class="text-center"> Filterable </th>
                                    <th class="text-center"> Required </th>
                                    <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($attributes as $attribute)
                                        <tr>
                                            <td>{{ $attribute->code }}</td>
                                            <td>{{ $attribute->name }}</td>
                                            <td>{{ $attribute->frontend_type }}</td>
                                            <td class="text-center">
                                                @if ($attribute->is_filterable == 1)
                                                    <span class="badge badge-success">Yes</span>
                                                @else
                                                    <span class="badge badge-danger">No</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($attribute->is_required == 1)
                                                    <span class="badge badge-success">Yes</span>
                                                @else
                                                    <span class="badge badge-danger">No</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-label="Second group">
                                                    <a href="{{ route('admin.attributes.edit', $attribute->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('admin.attributes.delete', $attribute->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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