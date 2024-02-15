<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index ()
    {
        $product = Product::all();
        return response()->json([
            'status' => 'succes',
            'data' => $product
        ], 200);
    }
}
