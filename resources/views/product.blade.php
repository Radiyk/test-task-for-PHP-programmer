@extends('common_tpl')

@section('content')

    <h4>
        Страница продукта
    </h4>
    <div class="wrap">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">НАЗВАНИЕ</th>
                    <th scope="col">КАТЕГОРИЯ</th>
                    <th scope="col">ЦЕНА</th>
                    <th scope="col">ОПИСАНИЕ</th>
                </tr>
                </thead>
                @if($product)
                    <tbody>
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->description}}</td>
                    </tr>
                    @else
                        <tr>
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
