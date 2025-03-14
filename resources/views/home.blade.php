@extends('common_tpl')

@section('content')
    <div class="flex items-center justify-center ">
        <h1 class="mb-1 font-medium">управление товарами и заказами</h1>
    </div>
    <div class="flex items-center justify-start ">
        <p class="mb-1 font-medium">Если в таблицах нат данных, возможно необходимо <br>запустить миграции таблиц сиды для их наполнения.</p>
        <p class="mb-1 font-medium">php artisan migrate</p>
        <p class="mb-1 font-medium">php artisan db:seed</p>
    </div>
@endsection
