<?php

namespace App\Http\Controllers;

use App\PCategory;
use Illuminate\Http\Request;

class PCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('allcreate.profilecategories');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PCategory  $pCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PCategory $pCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PCategory  $pCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PCategory $pCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PCategory  $pCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PCategory $pCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PCategory  $pCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PCategory $pCategory)
    {
        //
    }
}
