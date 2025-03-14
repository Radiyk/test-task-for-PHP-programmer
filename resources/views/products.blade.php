@extends('common_tpl')

@section('content')
    <h4>
        Страница продуктов
    </h4>
    <div class="wrap">
        <div class="forBtn">
            <button onclick="openAddProductModal()">Добавить товар</button>
            <div id="popup-details" class="modal">
                <div class="modal__content">
                    <span class="modal__close">&times;</span> <!-- Кнопка закрытия -->
                    <h2 id="modal-title">Детали нового товара</h2>
                    <form action="/productAdd" id="productForm" method="post">
                        @csrf
                        <input type="text" name="name" id="productName" placeholder="Название товара">
                        <input type="text" name="category" id="productCategory" placeholder="Категория товара">
                        <input type="text" name="description" id="productDescription" placeholder="Описание товара">
                        <input type="text" name="price" id="productPrice" placeholder="Цена товара">
                        <input type="hidden" name="productId" id="productId" value="">
                        <!-- Скрытое поле для ID товара -->
                        <button type="submit" id="formSubmitButton">Создать</button>
                    </form>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">НАЗВАНИЕ</th>
                <th scope="col">ОПИСАНИЕ</th>
                <th scope="col">КАТЕГОРИЯ</th>
                <th scope="col">ЦЕНА</th>
                <th scope="col">ДЕЙСТВИЯ</th>
            </tr>
            </thead>
            <tbody>
            @forelse($listProducts ?? [] as $product)
                <tr>
                    <td>
                        <a href="product/{{ $product->id }}">{{ e($product->name) }}</a>
                    </td>
                    <td>{{ e($product->description) }}</td>
                    <td>{{ e($product->category) }}</td>
                    <td>{{ number_format($product->price, 2, ',', ' ') }} руб.</td>
                    <td class="forActions">
                        <a href="product_del/{{ $product->id }}" data-toggle="tooltip" data-placement="top"
                           title="Удалить товар">
                            <img src="{{ asset('images/delete.svg') }}" alt="Удалить" width="16" height="16">
                        </a>
                        <button
                            onclick="openEditProductModal({ id: {{ $product->id }}, name: '{{ e($product->name) }}', category: '{{ e($product->category) }}', description: '{{ e($product->description) }}', price: {{ $product->price }} })"
                            data-toggle="tooltip" data-placement="top" title="Редактировать товар">
                            <img src="{{ asset('images/edit.svg') }}" alt="Редактировать" width="16" height="16">
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Нет данных</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const popupOpen = document.querySelector('.js-popup-open');
        const modal = document.getElementById('popup-details');
        const closeModal = document.querySelector('.modal__close');

        popupOpen.addEventListener('click', function (event) {
            event.preventDefault();
            modal.style.display = 'block';
        });

        closeModal.addEventListener('click', function () {
            modal.style.display = 'none';
        });

        window.addEventListener('click', function (event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    });

    function openAddProductModal() {
        document.getElementById("modal-title").textContent = "Детали нового товара";
        document.getElementById("productForm").action = "/productAdd";
        document.getElementById("productName").value = "";
        document.getElementById("productCategory").value = "";
        document.getElementById("productDescription").value = "";
        document.getElementById("productPrice").value = "";
        document.getElementById("productId").value = ""; // очищаем ID
        document.getElementById("formSubmitButton").textContent = "Создать";
        document.getElementById("popup-details").style.display = "block";
    }

    function openEditProductModal(product) {
        document.getElementById("modal-title").textContent = "Редактирование товара";
        document.getElementById("productForm").action = "/productEdit";
        document.getElementById("productName").value = product.name;
        document.getElementById("productCategory").value = product.category;
        document.getElementById("productDescription").value = product.description;
        document.getElementById("productPrice").value = product.price;
        document.getElementById("productId").value = product.id;
        document.getElementById("formSubmitButton").textContent = "Сохранить";
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
    });
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
