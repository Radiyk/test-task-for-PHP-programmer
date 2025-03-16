<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categories extends Model
{
    protected function getListCategories()
    {
        return DB::table('categories')
            ->select('id', 'name')
            ->orderBy('id', 'desc')
            ->get()
            ->toArray();
    }
}
