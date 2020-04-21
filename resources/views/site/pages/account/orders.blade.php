@extends('site.app2')

@section('content')
        <!-- Column -->
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="color: black">ORDER STATUS</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
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
                                    <td><a href="{{route('account.orders_details')}}" class="link"> Order #{{$order->order_number}}</a></td>
                                    <td>{{$order->order_first_name}}</td>
                                    <td><span class="text-muted">{{$order->order_last_name}}</span></td>
                                    <td>{{ config('settings.currency_symbol') }}{{ round($order->order_grand_total, 2) }}</td>
                                    <td class="text-center">
                                        <div class="label label-table label-success">{{ $order->order_item_count }}</div>
                                    </td>
                                    <td class="text-center">{{ strtoupper($order->order_status) }}</td>
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
@endsection