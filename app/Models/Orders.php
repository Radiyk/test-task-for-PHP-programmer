<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Orders extends Model
{
    use HasFactory;
    protected function getListOrders()
    {
        return DB::table('orders')
            ->select([
                'status',
                'fio',
                'orders.id',
                'comment',
                'orders.created_at as date',
                'count',
                DB::raw('P.name as name'),
                DB::raw('SUM(P.price * orders.count) as total_price'),
                DB::raw('C.name as category')])
            ->join('products as P', 'orders.product_id', '=', 'P.id')
            ->join('categories as C', 'P.category_id', '=', 'C.id')
            ->groupBy('orders.id', 'status', 'fio', 'comment', 'orders.created_at', 'C.name')
            ->orderBy('orders.id', 'desc')
            ->get()
            ->toArray();
    }

    protected function setAddOrders($data)
    {
        $orders = new Orders;

        $orders->product_id = $data->productId;
        $orders->status = $data->status;
        $orders->fio = $data->fio;
        $orders->comment = $data->comment !== null ? $data->comment : '';
        $orders->count = $data->quantity;

        $orders->save();
    }
}
