<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;

class BookTicketsController extends BaseController
{
    public function getBookTickets($id)
    {
        $info_film = Film::with(['brand','images','attributes','categories','rates','schedule_film'])->where('id',$id)->get();

        return view('site.pages.movies.book_tickets',compact('info_film'));
    }
}
