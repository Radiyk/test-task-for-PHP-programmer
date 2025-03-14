<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    protected function getListProducts()
    {
        return DB::table('products')
            ->select(['products.id','products.name', 'products.description', 'products.price', DB::raw('C.name as category')])
            ->join('categories as C', 'products.category_id', '=', 'C.id')
            ->orderBy('name', 'desc')
            ->get()
            ->toArray();
    }
    protected function setDeleteProduct($IdFromDel)
    {
        return DB::table('products')
            ->delete(id: $IdFromDel);
    }

    protected function setAddProduct($data)
    {
        $category_id = DB::table('categories')
            ->select('id')
            ->where('name', $data->category)
            ->first();

        $products = new Products;

        $products->name = $data->name;
        $products->category_id = $category_id->id;
        $products->description = $data->description;
        $products->price = $data->price;

        $products->save();
    }

    protected function setEditProduct($data)
    {
        $category_id = DB::table('categories')
            ->select('id')
            ->where('name', $data->category)
            ->first();

        $products = Products::find($data->productId);

        $products->name = $data->name;
        $products->category_id = $category_id->id;
        $products->description = $data->description;
        $products->price = $data->price;

        $products->save();
    }

}
