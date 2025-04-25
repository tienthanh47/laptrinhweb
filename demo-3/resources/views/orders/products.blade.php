@extends('dashboard')

@section('content')
    <div class="container">
        <h2>Danh sách sản phẩm trong đơn hàng #{{ $order->id }}</h2>
        <p><strong>Địa chỉ giao hàng:</strong> {{ $order->address }}</p>
        <p><strong>Tổng tiền:</strong> {{ number_format($order->total_amount) }}₫</p>

        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Ghi chú</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderDetails as $detail)
                    <tr>
                        <td>{{ $detail->product->name }}</td>
                        <td>
                            <img src="{{ asset('images/' . $detail->product->image) }}" width="80">
                        </td>
                        <td>{{ number_format($detail->product->price) }}₫</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>{{ $detail->notes }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
