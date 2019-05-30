<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Character;
use App\Category;

class PageController extends Controller
{
    public function index(){
        $characters = Character::OrderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);
        return view('web.characters', compact('characters'));
    }

    public function category($slug){
        $category = category::where('slug', $slug)->pluck('id')->first();
        $characters = character::where('category_id', $category)
                    ->OrderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

        return view('web.characters', compact('characters'));
    }

    public function season($slug){
        $characters = Character::whereHas('seasons', function($query) use($slug){
            $query->where('slug',$slug);
    })
        ->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

        return view('web.characters', compact('characters'));
    }

    public function character($slug){
        $character = character::where('slug', $slug)->first();

        return view('web.character', compact('character'));
    }
}
