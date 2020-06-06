@extends('site.app2')

@section('content')
        <!-- Column -->
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="color: black">ORDER STATUS</h5>
                </div>
                <div class="table-responsive" style="color: black">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Order No</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Order Amount</th>
                                <th>Qty</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td><a href="{{route('account.orders_details',$order->id)}}" class="link"> Order #{{$order->order_number}}</a></td>
                                    <td>{{$order->order_first_name}}</td>
                                    <td><span class="text-muted">{{$order->order_last_name}}</span></td>
                                    <td>{{ config('settings.currency_symbol') }}{{ round($order->order_grand_total, 2) }}</td>
                                    <td class="text-center">
                                        <div class="label label-table label-success">{{ $order->order_item_count }}</div>
                                    </td>
                                    <td class="text-center">
                                        @switch($order->order_status)
                                            @case('pending')
                                                <span class="badge badge-info">{{ strtoupper($order->order_status) }}</span>
                                                @break
                                            @case('processing')
                                                <span class="badge badge-success">{{ strtoupper($order->order_status) }}</span>
                                                @break
                                            @default
                                                <span class="badge badge-info">{{ strtoupper($order->order_status) }}</span>
                                        @endswitch
                                    </td>
                                </tr>
                            @empty
                                <p class="alert alert-warning">No orders to display.</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Column -->
        {{-- TODO: Use Vue follow kind of Global Vue in index.html --}}
        {{-- <div id="app">
            <tdc-component></tdc-component>
        </div>
       <script src="https://unpkg.com/vue@2.4.2" type="text/javascript"></script>
        <script type="text/javascript">
            Vue.component('tdc-component', {
                template: '<h1>Test</h1>'
            });
            var app = new Vue({
                el: '#app'
            })
        </script> --}}

        {{-- TODO: Use Vue follow kind of Local Vue in index.html --}}
        {{-- <div id="app">
           <hello-sir></hello-sir>
        </div>
        <script src="https://unpkg.com/vue@2.4.2" type="text/javascript"></script>
        <script type="text/javascript">
            var temp = {
                template: '<h1>Hello Vue on this page!</h1>'
            };
            var app = new Vue({
                el: '#app',
                components: {
                    'hello-sir': temp
                }
            })
        </script> --}}
@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">
    $('#sampleTable').DataTable();
</script>
@endpush