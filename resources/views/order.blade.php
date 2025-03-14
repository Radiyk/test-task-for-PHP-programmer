@extends('common_tpl')

@section('content')
    <h4>
        Страница заказа
    </h4>
    <div class="wrap">
        <div class="forBtn">
            <a href="{{ route('updateOrderStatus', $order->id) }}" class="btn btn-primary">Поменять статус</a>
        </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">НОМЕН ЗАКАЗА</th>
                    <th scope="col">СТАТУС</th>
                    <th scope="col">Дата ЗАКАЗА</th>
                    <th scope="col">НАЗВАНИЕ</th>
                    <th scope="col">КАТЕГОРИЯ</th>
                    <th scope="col">КОЛИЧЕСТВА</th>
                    <th scope="col">ФИО</th>
                    <th scope="col">ЦЕНА</th>
                    <th scope="col">КОМЕНТАРИЙ</th>
                </tr>
                </thead>
                @if($order)
                <tbody>
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{ e($order->status) }}</td>
                    <td>{{ date('Y.m.d', strtotime($order->date)) }}</td>
                    <td>{{ e($order->name) }}</td>
                    <td>{{ e($order->category) }}</td>
                    <td>{{ e($order->count) }}</td>
                    <td>{{ e($order->fio) }}</td>
                    <td>{{ number_format($order->total_price, 2, ',', ' ') }} руб.</td>
                    <td>{{ e($order->comment) }}</td>
                </tr>
                @else
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    </tbody>
                @endif
            </table>
    </div>
@endsection

<script>

</script>
