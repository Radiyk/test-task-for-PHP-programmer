<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;
    protected function getListProducts()
    {
//        return Products::select('products.id', 'products.name', 'products.description', 'products.price', 'categories.name as category', )
//            ->join('categories', 'products.category_id', '=', 'categories.id')
//            ->orderBy('products.name', 'desc')
//            ->get()
//            ->toArray();



        return DB::table('products')
            ->select(['products.id','products.name', 'products.description', 'products.price', DB::raw('C.name as category'), DB::raw('C.id as category_id')])
            ->join('categories as C', 'products.category_id', '=', 'C.id')
            ->orderBy('name', 'desc')
            ->get()
            ->toArray();
    }

    protected function getProductById()
    {
        return DB::table('products')
            ->select(['products.id','products.name', 'products.description', 'products.price', DB::raw('C.name as category')])
            ->where('id', )
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
        $products = new Products;

        $products->name = $data->name;
        $products->category_id = $data->category;
        $products->description = $data->description;
        $products->price = $data->price;

        $products->save();
    }

    protected function setEditProduct($data)
    {

        $products = Products::find($data->productId);

        $products->name = $data->name;
        $products->category_id = $data->category;
        $products->description = $data->description;
        $products->price = $data->price;

        $products->save();
    }

}
