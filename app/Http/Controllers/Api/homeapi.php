<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class homeapi extends Controller
{
    public function home(){
        $category = Category::take(8)->latest()->get();
        $product = Category::take(3)->with(['product'=>function($q){
            $q->take(6);
        }])->get();

        return response()->json([
            'category' => $category,
            'product' => $product
        ]);
    }

}
