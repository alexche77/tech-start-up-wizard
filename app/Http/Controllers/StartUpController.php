<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Feature;
use App\Models\StartUp;
use Illuminate\Http\Request;

class StartUpController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('startup.wizard', ['categories' => Category::all()->sortBy('name')->pluck('name', 'id')->toArray(), 'features' => Feature::all()->sortBy('name')]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\StartUp $startUp
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(StartUp $startUp)
    {
        return view('startup.form', ['startup' => $startUp, 'categories' => Category::all()->sortBy('name')->pluck('name', 'id')->toArray(), 'features' => Feature::all()->sortBy('name')->pluck('name', 'id')->toArray()]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->update($request, new StartUp(), true);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StartUp $startUp
     * @param bool $isCreate
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, StartUp $startUp, $isCreate = false)
    {
        dd($request->all());
    }


}
