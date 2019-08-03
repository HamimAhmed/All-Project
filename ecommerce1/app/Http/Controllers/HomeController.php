<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $data = [''];
        $data['sidbar'] = true;
        $data['products'] = Product::select(['id', 'slug', 'name', 'description', 'price', 'image'])->get();

        return view('frontened.home', $data);
    }


    public function single()

    {
        $data = [];
        $data['sidbar'] = true;
        return view('frontened.single');
    }

    public function showcategorylist($slug)

    {
        $data = [''];
        $data['sidbar'] = true;
        $data['category'] = Category::select(['name', 'id'])
            ->where('slug', $slug)->first();
        $data['products'] = $data['category']->products;

        return view('frontened.category', $data);

    }

    public function showproduct($slug)
    {
        $data = [];
        $data['sidbar'] = true;
        $data['product'] = Product::with('category')
            ->select(['category_id', 'name', 'description', 'price', 'quantity', 'image'])
            ->where('slug', $slug)
            ->first();

        return view('frontened.single', $data);
    }

}
