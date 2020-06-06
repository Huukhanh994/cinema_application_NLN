@extends('admin.app')
@push('custom_css')
    <link href="{{asset('assets/node_modules/datatables/media/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endpush
@section('content')

    <div class="row">
        <!-- Column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">ORDER STATUS</h5>
                </div>
                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th>Invoice</th>
                                <th>User</th>
                                <th>Order date</th>
                                <th>Amount</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Payment Method</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td><a href="{{route('admin.orders.show',$order->order_number)}}" class="link"> Order #{{$order->order_number}}</a></td>
                                    <td>{{$order->user->fullName}}</td>
                                    <td><span class="text-muted"><i class="fa fa-clock-o"></i> {{date("d/m/Y H:i:s",strtotime($order->created_at))}}</span></td>
                                    <td>${{number_format($order->order_grand_total, 2, '.', ',')}}</td>
                                    <td class="text-center">
                                    @switch($order->order_status)
                                        @case('pending')
                                            <div class="label label-table label-info">{{$order->order_status}}</div>
                                            @break
                                        @case('processing')
                                            <div class="label label-table label-success">{{$order->order_status}}</div>
                                            @break
                                        @case('paid')
                                            <div class="label label-table label-success">{{$order->order_status}}</div>
                                            @break
                                        @case('refunded')
                                            <div class="label label-table label-danger">{{$order->order_status}}</div>
                                            @break
                                        @case('unpaid')
                                            <div class="label label-table label-warning">{{$order->order_status}}</div>
                                            @break
                                        @default
                                            <div class="label label-table label-success">{{$order->order_status}}</div>
                                    @endswitch
                                    </td>
                                    <td class="text-center">
                                        @if (empty($order->order_payment_method))
                                            <i>Not payment</i>
                                        @else
                                            {{$order->order_payment_method}}
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>

@endsection

@push('custom_script')
    <!-- This is data table -->
    <script src="{{asset('assets/node_modules/datatables/datatables.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
        $(function() {
            $('#myTable').DataTable();
            $(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
    </script>
@endpush