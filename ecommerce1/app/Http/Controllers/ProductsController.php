<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[''];
        $data['categories'] = Category::select('id','name')->get();
        return view ('backend.products.add',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =[
            'name' => 'required|unique:products,name',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'photo' => 'required|image',
            'status' => 'required',
        ];

        $validator = validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $photo = $request->file('photo');
        $file_name = uniqid('photo_',true).str_random(10).'.'.$photo->getClientOriginalExtension();
         if($photo->isValid()){
             $photo->storeAs('images',$file_name);
         }

        try{
            Product::create([
                'name' => strtolower(trim($request->input('name'))),
                'category_id'=> $request->input('category'),
                'price' =>(trim($request->input('price'))),
                'description' =>(trim($request->input('description'))),
                'quantity' =>(trim($request->input('quantity'))),
                'slug'=> str_slug(trim($request->input('name'))),
                'active'=> $request->input('status'),
                'image' => $file_name,

            ]);
            session()->flash('type', 'success');
            session()->flash('message', 'Product Added Successfully');
            return redirect()->back();
        } catch (\Exception $e){

            session()->flash('type', 'danger');
            session()->flash('message', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
