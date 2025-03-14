<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function listOrders()
    {
        $listOrders = Orders::getListOrders();
        $listProducts = Products::getListProducts();
        return view('orders', compact('listOrders', 'listProducts'));
    }

    public function addOrders(Request $request)
    {
        Orders::setAddOrders($request);
        return redirect('orders');
    }

    public function order($id)
    {
        $order = '';
        $listOrders = Orders::getListOrders();
        foreach ($listOrders as $item)
            if ($item->id == $id){
                $order = $item;
            }
        return view('order', compact('order'));
    }

    public function updateOrderStatus($id)
    {
        $order = Orders::findOrFail($id);

        $order->status = ($order->status == 'новый') ? 'выполнен' : 'новый';
        $order->save();

        return redirect()->route('order', $id)->with('success', 'Статус заказа успешно изменен.');
    }
}
