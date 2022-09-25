<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\Categorypost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorypost::latest() -> get();
        return view('admin.pages.post.category.index', [
            'form_type' => 'create',
            'categories'    => $categories
        ]);
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
        // validate
        $this -> validate($request, [
            'name'      => 'required|unique:categoryposts'
        ]); 

        // store 
        Categorypost::create([
            'name'      => $request -> name,
            'slug'      => Str::slug($request -> name)
        ]);
        // return 
        return back() -> with('success' , 'Post Category Added successful');
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
