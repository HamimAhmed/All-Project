<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::select('id','name','slug','active')->paginate(4);
        return view('backend.category.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.add');
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
            'name' => 'required|unique:categories,name',
            'status' => 'required',
        ];

       $validator = validator::make($request->all(), $rules);

       if ($validator->fails()){
           return redirect()->back()->withErrors($validator)->withInput();
       }

        try{
            Category::create([
               'name' => strtolower(trim($request->input('name'))),
                'slug'=> str_slug(trim($request->input('name'))),
                'active'=> $request->input('status'),

            ]);
            session()->flash('type', 'success');
            session()->flash('message', 'Category Added Successfully');
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
        $data['category'] = Category:: select('id','name','slug','active')->find($id);
        return view('backend.category.edit', $data);
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
        $rules =[
            'name' => 'required|unique:categories,name,'.$id,
            'status' => 'required',
        ];

        $validator = validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $category = Category::find($id);
            $category->update([
                'name' => strtolower(trim($request->input('name'))),
                'slug'=> str_slug(trim($request->input('name'))),
                'active'=> $request->input('status'),

            ]);
            session()->flash('type', 'success');
            session()->flash('message', 'Category updated Successfully');
            return redirect()->back();
        } catch (\Exception $e){

            session()->flash('type', 'danger');
            session()->flash('message', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();
        session()->flash('type', 'success');
        session()->flash('message', 'Category deleted Successfully');
        return redirect()->back();
    }
}
