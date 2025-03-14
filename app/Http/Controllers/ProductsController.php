<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function listProducts()
    {
        $listProducts = Products::getListProducts();

        return view('products', compact('listProducts'));
    }

    public function product($id)
    {
        $product = '';
        $listProducts = Products::getListProducts();
        foreach ($listProducts as $item)
            if ($item->id == $id){
                $product = $item;
            }
        return view('product', compact('product'));
    }

    public function productAdd(Request $request)
    {
        Products::setAddProduct($request);
        return redirect('products');
    }

    public function productEdit(Request $request)
    {
        Products::setEditProduct($request);
        return redirect('products');
    }

    public function deleteProduct($id)
    {
        Products::setDeleteProduct($id);
        return redirect('products');
    }

}
