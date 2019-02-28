<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::all();
        return view('tags.index')->withTags($tags);
    }


    public function store(Request $request)
    {
        $this->validate($request,array('name' =>'required|max:255'));
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();
        Session::flash('success','The Tag successfully saved !');

        return redirect()->route('tags.index');
    }


    public function show($id)
    {
        $tag = Tag::find($id);
        return view('tags.show',compact('tag'));
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
