<?php

namespace App\Http\Controllers;

use App\Http\Requests\StartupRequest;
use App\Jobs\SetupDreamTeam;
use App\Models\Category;
use App\Models\Feature;
use App\Models\StartUp;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class StartUpController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index(Request $request)
    {
        $startups = StartUp::where('user_id', $request->user()->id)->with(['category'])->orderByDesc('created_at');
        $q = NULL;
        if ($request->q != null) {
            $q = $request->q;
            $startups = $startups->where('name', 'LIKE', '%' . $q . '%');
        }
        return view('startup.index', ['startups' => $startups->paginate(10), 'q' => $q]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('startup.wizard', ['categories' => Category::all()->sortBy('name')->pluck('name', 'id')->toArray(), 'features' => Feature::all()->sortBy('name')]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param StartUp $startUp
     * @return Application|Factory|View|Response
     */
    public function edit(StartUp $startUp)
    {
        return view('startup.form', ['startup' => $startUp, 'categories' => Category::all()->sortBy('name')->pluck('name', 'id')->toArray(), 'features' => Feature::all()->sortBy('name')->pluck('name', 'id')->toArray()]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StartupRequest $request
     * @return Response
     */
    public function store(StartupRequest $request)
    {
        return $this->update($request, new StartUp(), true);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StartupRequest $request
     * @param StartUp $startUp
     * @param bool $isCreate
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(StartupRequest $request, StartUp $startUp, $isCreate = false)
    {

        $validated = $request->validated();
        $features = Feature::findMany($validated['features']);
        $category = Category::find($validated['category']);

        $startUp->name = $validated['name'];
        $startUp->description = $validated['description'];
        $startUp->mvp_deadline = $validated['mvp_deadline'];
        $startUp->seed_capital = $validated['seed_capital'];
        $startUp->user_id = $request->user()->id;
        $startUp->features()->attach($features);
        $startUp->category_id = $category->id;

        $startUp->save();


        SetupDreamTeam::dispatch($startUp);

        return back();

    }


}
