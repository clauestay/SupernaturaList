<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Season;
use App\Http\Requests\SeasonStoreRequest;
use App\Http\Requests\SeasonUpdateRequest;

class SeasonController extends Controller
{

    public function __construc()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasons = Season::orderBy('id', 'DESC')->paginate(4);
        //dd($seasons);
       
        return view('admin.seasons.index', compact('seasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seasons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeasonStoreRequest $request)
    {
        $season = Season::create($request->all());

        return redirect()->route('seasons.edit', $season->id)
        ->with('info', 'Temporada creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $season = Season::find($id);

        return view('admin.seasons.show', compact('season'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $season = Season::find($id);

        return view('admin.seasons.edit', compact('season'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SeasonUpdateRequest $request, $id)
    {
        $season = Season::find($id);

        $season->fill($request->all())->save();

        return redirect()->route('seasons.edit', $season->id)
        ->with('info', 'Temporada actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Season::find($id)->delete();

        return back()->with('info', 'Temporada Eliminada correctamente');
    }
}
