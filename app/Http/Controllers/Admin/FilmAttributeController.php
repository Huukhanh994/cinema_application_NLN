<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Film;
use App\Models\FilmAttribute;
use Illuminate\Http\Request;

class FilmAttributeController extends Controller
{
    public function loadAttributes()
    {
        $attributes = Attribute::all();

        return response()->json($attributes);
    }

    public function filmAttributes(Request $request) {
        $film = Film::findOrFail($request->Fid);

        return response()->json($film->attributes);     // attributes here is property on Model
    }

    public function loadValues(Request $request)
    {
        $attribute = Attribute::findOrFail($request->id);

        return response()->json($attribute->values);    // values here is property on Model
    }

    public function addAttribute(Request $request)
    {
        $filmAttribute = FilmAttribute::create($request->data);     // biến data từ bên vue gửi qua đây nhận đc thì create

        if($filmAttribute) {
            return response()->json(['message' => 'Film Attribute added successfully']);
        } else {
            return response()->json(['message' => 'Something went wrong while submitting film attribute']);
        }


    }

    public function deleteAttribute(Request $request)
    {
        $filmAttribute = FilmAttribute::findOrFail($request->id);

        $filmAttribute->delete();

        return response()->json(['status' => 'success','message' => 'Film attribute deleted!']);
    }

}
