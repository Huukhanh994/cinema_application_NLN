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
    <p style="color:blue">{{$send_film_name}}</p>

    <h3>Thông tin khách hàng</h3>
    <p>Họ và tên: {{$send_first_name}} {{$send_last_name}}</p>
    <p>Email: {{$send_email}}</p>
    <p>Số điện thoại: {{$send_tel}}</p>
    <p>Địa chỉ: {{$send_address}}</p>
    <p>Tỉnh/thành phố: {{$send_city}}</p>
    <p>Khu vực: {{$send_country}}</p>
    
    <h3>Thông tin order</h3>
    <p>Số lượng vé đã đặt: {{$send_order_item_qty}}</p>
    <p>Tổng tiền: {{$send_order_item_price}}</p>
    <p>Số ghế đã đặt: </p>
    @forelse ($send_list_seats_name as $item)
        <p>{{$item}}</p>
    @empty
        Not found
    @endforelse
    <h4>Xin cảm ơn !</h4>
</body>

</html>