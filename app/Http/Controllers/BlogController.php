<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Log;
use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paid = $request->paid;
        $blogs = Blog::where('paid', $paid)->get();
        return view('putmining.blog.index', ['blogs' => $blogs, 'paid' => $paid]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $paid = $request->paid;
        return view('putmining.blog.create', ['paid' => $paid]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paid = $request->paid;
        $notify = $request->notify;

        $blog = new Blog();
        $blog->paid = $paid;
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->save();

        if ($notify) {
            //Send NewBlogEmail to Users
            EmailController::sendNewBlogEmail($blog);          
        }

        return redirect(url("/blog?paid=$paid"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "show $id";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('putmining.blog.edit', ['blog' => $blog]);
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
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->save();

        return redirect(url("/blog?paid={$blog->paid}"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        return redirect(url("/blog?paid={$blog->paid}"));
    }
}
