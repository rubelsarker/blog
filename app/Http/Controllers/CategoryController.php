<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('categories.index')->withCategories($categories);
    }


//    public function create()
//    {
//        //
//    }

    public function store(Request $request)
    {
        $this->validate($request,array(
            'name' => 'required|max:255',
        ));
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        Session::flash('success','The category successfully saved !');

        return redirect()->route('categories.index');
    }


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
