<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Character;
use App\Category;
use App\Season;
use App\Http\Requests\CharacterStoreRequest;
use App\Http\Requests\CharacterUpdateRequest;

use Illuminate\Support\Facades\Storage;

class CharacterController extends Controller
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
        $characters = Character::orderBy('id', 'DESC')
        ->where('user_id', auth()->user()->id)
        ->paginate();
        //dd($Categories); ->listar
       
        return view('admin.characters.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $seasons = Season::orderBy('name', 'ASC')->get();
        //$seasons = Season::all();
        //dd($seasons);
        return view('admin.characters.create', compact('categories', 'seasons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CharacterStoreRequest $request)
    {
        $character= Character::create($request->all());

        //imagen
        if($request->hasFile('file')){
            $file = $request->file('file');
            $nombre = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $nombre);

            $character->file = $nombre;
            $character->save();
        }
        //if($request->file('file')){
            //$path = Storage::disk('public')->put('image', $request->file('file'));
            //$character->fill(['file' => asset($path)])->save();
        //}

        //seasons
        $character->seasons()->attach($request->get('seasons'));

        return redirect()->route('characters.index', $character->id)
        ->with('info', 'Personaje creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $character= Character::find($id);
        $this->authorize('pass', $character);

        return view('admin.characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $seasons = Season::orderBy('name', 'ASC')->get();

        //dueño del personaje?
        $character = Character::find($id);
        $this->authorize('pass', $character);

        return view('admin.characters.edit', compact('character', 'categories', 'seasons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CharacterUpdateRequest $request, $id)
    {
        $character= Character::find($id);

        //seleccionando imagen anterior
        $ImageToDelete = $character->file;

        $this->authorize('pass', $character);

        $character->fill($request->all())->save();

        if($request->hasFile('file')){
            $file = $request->file('file');
            $nombre = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $nombre);

            //asignando imagen a la ruta donde esta almacenada para eliminarla
            $file_path = public_path().'/images/'.$ImageToDelete;
            \File::delete($file_path);

            $character->file = $nombre;
            $character->save();
        }

        //imagen
        // if($request->file('file')){
        //     $path = Storage::disk('public')->put('image', $request->file('file'));
        //     $character->fill(['file' => asset($path)])->save();
        // }

        //seasons
        $character->seasons()->sync($request->get('seasons'));

        return redirect()->route('characters.edit', $character->id)
        ->with('info', 'Personaje actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Character::find($id)->delete();
        $character = Character::find($id);
        $file_path = public_path().'/images/'.$character->file;
        \File::delete($file_path);
        $character->delete();

        
        $this->authorize('pass', $character);

        return back()->with('info', 'Personaje Eliminado correctamente');
    }
}
