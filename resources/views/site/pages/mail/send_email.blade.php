<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send email</title>
    <style>
       
    </style>
</head>

<body>
    <h1>Thông báo đặt vé xem phim tại cụm rạp CGV</h1>
    <p>CGV của chúng tôi trân trọng thông báo với quý khách</p>
    <h3>Thông tin của phim</h3>
    <p style="color:blue">Tên Phim: {{$send_film_name}}</p>
    <p>Ngày đăt: {{$send_dateChoosen}}</p>
    @foreach ($send_clusterName as $item)
        <p>Phòng chiếu: {{$item->room_name}}</p>
        <p>Rạp chiếu: {{$item->cluster['cluster_name']}}</p>
    @endforeach


    <h3>Thông tin khách hàng</h3>
    <table border="1">
        <thead>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Tỉnh/Thành phố</th>
            <th>Khu vực</th>
        </thead>
        <tbody>
        <td>{{$send_first_name}} {{$send_last_name}}</td>
        <td>{{$send_email}}</td>
        <td>{{$send_tel}}</td>
        <td>{{$send_address}}</td>
        <td>{{$send_city}}</td>
        <td>{{$send_country}}</td>
        </tbody>
    </table>
    <h3>Thông tin order</h3>
    <table border="1">
        <thead>
            <th>Số lượng vé đã đặt</th>
            <th>Số ghế đã đặt</th>
            <th>Tổng tiền</th>
        </thead>
        <tbody>
            <td>{{$send_order_item_qty}}</td>
            <td>
                @forelse ($send_list_seats_name as $item)
                    <p>{{$item}}</p>
                @empty
                    Not found
                @endforelse
            </td>
            <td>{{$send_order_item_price}}</td>
        </tbody>
    </table>
    <h4>Xin cảm ơn !</h4>
</body>

</html>