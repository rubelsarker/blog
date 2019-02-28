<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use Session;


class PostController extends Controller
{


    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(5);

        return view('posts.index')->withPosts($posts);
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create',compact('categories','tags'));
    }

    public function store(Request $request)
    {
        //validate data
        $this->validate($request,array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255',
            'category_id' => 'required|integer',
            'body' => 'required'
        ));
        //Post::create($request->all());
        //return back();
        //store data
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;
        $post->save();
        $post->tags()->sync($request->tags,false);
        Session::flash('success','The blog post was successfully saved !');

        //dd($request->all());
        //redirect another page
        return redirect()->route('posts.show',$post->id);
    }


    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }


    public function edit($id)
    {
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category){
            $cats[$category->id] = $category->name;
        }
        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag){
            $tags2[$tag->id] = $tag->name;
        }
        $post = Post::find($id);
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
    }


    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if($request->input('slug')== $post->slug){
            $this->validate($request,array(
                'title' => 'required|max:255',
                'category_id' => 'required|integer',
                'body' => 'required'
            ));
        }
        else{
        //validate data
        $this->validate($request,array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'body' => 'required'
        ));
        }
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');
        $post->save();
        $post->tags()->sync($request->tags,false);
//        if(isset($request->tags)){
//            $post->tags()->sync($request->tags);
//        }
//        else{
//            $post->tags()->sync(array());
//        }


        Session::flash('success','The blog post Updated successfully !');

        //redirect another page
        return redirect()->route('posts.show',$post->id);
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success','The post Deleted successfully !');
        return redirect()->route('posts.index');
    }
}
