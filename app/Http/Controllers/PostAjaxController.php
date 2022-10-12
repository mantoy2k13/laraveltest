<?php
         
namespace App\Http\Controllers;
        
use App\Models\Post;
use Illuminate\Http\Request;
use DataTables;
        
class PostAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {           
        $post = Post::latest()->get();
        return view('postAjax',compact('post'));
       
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Post::updateOrCreate(['id' => $request->id],
                ['title' => $request->title, 'description' => $request->description]);        
   
        return response()->json(['success'=>'Post saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
     
        return response()->json(['success'=>'Post deleted successfully.']);
    }
}