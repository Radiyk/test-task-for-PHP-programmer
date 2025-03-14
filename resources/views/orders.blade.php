@extends('common_tpl')

@section('content')
    <h4>
        Страница заказы
    </h4>
    <div class="forBtn">

        <button onclick="openAddOrderModal()">Добавить заказ</button>

        <div id="popup-details" class="modal">
            <div class="modal__content col-sm-4">
                <span class="modal__close">&times;</span> <!-- Кнопка закрытия -->
                <h2 id="modal-title">Детали нового заказа</h2>
                <div class="container mt-5">
                    <form action="/orderAdd" id="orderForm" method="post" class="col-sm-7">
                        @csrf
                        <label for="productName" class="form-label">Название товара</label>
                        <div class="mb-3">
                            <select class="form-select form-select-lg mb-3" aria-label="Large select example"
                                    name="productId" id="productName" required>
                                <option selected disabled value="">Сначала выберите товар</option>
                                @foreach($listProducts as $product)
                                    <option value="{{ $product->id }}">{{ $product->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="fio" class="form-label">ФИО покупателя</label>
                            <input class="form-control" type="text" name="fio" id="fio" required>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Статус заказа</label>
                            <div class="mb-3">
                                <select class="form-select form-select-lg mb-3" aria-label="Large select example"
                                        id="status" name="status">
                                    <option selected>Новый</option>
                                    <option>выполнен</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="count" class="form-label">Количество товара</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-danger" id="decrease-btn">-</button>
                                </div>
                                <input type="text" id="quantity" name="quantity" class="form-control text-center"
                                       value="1" readonly>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-success" id="increase-btn">+</button>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="orderComment" class="form-label">Комментарий покупателя</label>
                            <textarea form="orderForm" name="comment" id="orderComment" class="form-control"
                                      rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <button type="submit" id="formSubmitButton" class="btn btn-primary">Создать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


        <table class="table">
            <thead>
            <tr>
                <th scope="col">НОМЕН ЗАКАЗА</th>
                <th scope="col">СТАТУС</th>
                <th scope="col">Дата ЗАКАЗА</th>
                <th scope="col">ФИО</th>
                <th scope="col">ЦЕНА</th>
            </tr>
            </thead>
            @if($listOrders)

                @forelse($listOrders as $orders)
                    <tbody>
                    <tr>
                        <td>{{ $orders->id }}</td>
                        <td><a href="order/{{$orders->id}}">{{$orders->status}}</a></td>
                        <td>{{ date('Y.m.d', strtotime($orders->date)) }}</td>
                        <td>{{ e($orders->fio) }}</td>
                        <td>{{ e($orders->total_price) }}</td>
                    </tr>
                    </tbody>
                @empty
                    <tbody>
                    <tr>
                        <td colspan="9">Нет данных</td>
                    </tr>
                    </tbody>
                @endforelse
            @else
                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            @endif
        </table>

@endsection
<script>

    function openAddOrderModal() {
        document.getElementById("popup-details").style.display = "block";
    }

    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('popup-details');
        const closeModal = document.querySelector('.modal__close');

        closeModal.addEventListener('click', function () {
            modal.style.display = 'none';
        });

        window.addEventListener('click', function (event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });

        const quantityInput = document.getElementById('quantity');
        const increaseBtn = document.getElementById('increase-btn');
        const decreaseBtn = document.getElementById('decrease-btn');

        increaseBtn.addEventListener('click', function () {
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        });

        decreaseBtn.addEventListener('click', function () {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        document.getElementById('orderForm').addEventListener('submit', function (event) {
            const productName = document.getElementById('productName');
            if (productName.value === '') {
                event.preventDefault();
                alert('Пожалуйста, выберите товар.');
            }
        });
    });

</script>

