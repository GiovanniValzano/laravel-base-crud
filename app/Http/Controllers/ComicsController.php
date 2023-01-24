<?php

namespace App\Http\Controllers;

use APP\Comics;
use Illuminate\Http\Request;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // chiedere la lista dei dati al db
        $comics = Comics::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $comics = new Comics();
        $comics->title = $data['title'];
        $comics->description = $data['description'];
        $comics->price = $data['price'];
        $comics->save();
        return redirect()->route('comics.show', $comics->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comics $comics)
    {
        return view('comics.show',[
            'comics' => $comics,
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comics $comics)
    {
        return view('comics.edit',[
            'comics' => $comics,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comics $comics)
    {
        $data = $request->all();
        $comics->city        = $data['title'];
        $comics->price       = $data['description'];
        $comics->is_rent     = $data['price'] ?? false;
        $comics->update();
        return redirect()->route('comics.show', ['comics' => $comics]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comics $comics)
    {
        $comics->delete();

        return redirect()->route('comics.index')->with('success_delete', $comics->id);
    }
}
