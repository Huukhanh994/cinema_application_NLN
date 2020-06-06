<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Food;
use App\Models\Order;
use App\Models\Room;
use App\Models\Seat;
use DB;
use Response;

class BookTicketsController extends BaseController
{
    public function getBookTickets(Request $request, $id, $filmID, $today)
    {
        $list_times = Film::withAndWhereHas('schedule_film', function ($query) use ($filmID) {             // withAndWhereHas from Room Model function
            $query->where('film_id', $filmID);
        })->get();

        // dd($list_times);
        $info_film = Room::withCount('seats')
            ->withAndWhereHas('seats', function ($query) {
                $query->with('categoryseat');
            })
            ->withAndWhereHas('film_using_pivot_schedules', function ($query) use ($filmID) {             // withAndWhereHas from Room Model function
                $query->where('films.id', $filmID);
            })
            ->where('id', $id)
            ->get();

        // dd($info_film);

        $seat_couple = Room::withCount('seats')
            ->withAndWhereHas('seats', function ($query) {
                $query->withAndWhereHas('categoryseat', function ($q) {
                    $q->select(\DB::raw('count(*) as couple_seat, cos_name'))
                        ->where('cos_name', '=', 'Couple Seat')
                        ->groupBy('cos_name');
                })
                    ->with('categoryseat');
            })
            ->withAndWhereHas('film_using_pivot_schedules', function ($query) use ($filmID) {             // withAndWhereHas from Room Model function
                $query->where('films.id', $filmID);
            })
            ->where('id', $id)
            ->get();

        $dateToday = $today;

        $roomID = $id;

        $foods = Food::with(['categoryfood', 'combos'])->get();

        return view('site.pages.movies.book_tickets', compact('info_film', 'dateToday', 'list_times', 'seat_couple', 'roomID', 'foods'));
    }


    // TODO: Dont use
    public function addMovieFood(Request $request)
    {
        $this->setPageTitle('Movie Food', 'Movie Food');

        $totalPrice = $request->get('totalPrice');

        $list_seatname = $request->input('seat');
        // dd(count(collect($request->input('seat'))));
        $filmID = $request->get('filmID');

        $roomID = $request->get('roomID');

        $today = $request->get('dateToday');

        $list_times = Film::withAndWhereHas('schedule_film', function ($query) use ($filmID) {             // withAndWhereHas from Room Model function
            $query->where('film_id', $filmID);
        })->get();


        $info_film = Room::withCount('seats')
            ->withAndWhereHas('seats', function ($query) {
                $query->with('categoryseat');
            })
            ->withAndWhereHas('film_using_pivot_schedules', function ($query) use ($filmID) {             // withAndWhereHas from Room Model function
                $query->with('brand')
                    ->where('films.id', $filmID);
            })
            ->where('id', $roomID)
            ->get();


        $foods = Food::with(['categoryfood', 'combos'])->get();


        return view('site.pages.movies.movie_food', compact('totalPrice', 'list_seatname', 'info_film', 'roomID', 'list_times', 'today', 'foods'));
    }

    public function postBookTickets(Request $request)
    {
        $this->setPageTitle('Movie Checkout', 'Movie Checkout');

        # tổng giá của các vé phim
        $totalPrice = $request->get('totalPrice');
        
        # id thức ăn đã chọn
        $food_id = $request->input('foodID');
        
        # tổng giá sau khi nhân với số lượng suất của món ăn đó
        $totalPriceFood = $request->get('total_price_food');
        
        # tên của 1 or Many thức ăn nc uống
        $food_names = $request->input('foodName');

        $foods = Food::with(['categoryfood', 'combos'])->where('f_id', $food_id)->get();
        
        # Đếm số lượng thức ăn đã đặt
        $qty_food = $request->get('qty_food');
        
        # danh sách tên số vé đã đặt
        $list_seatname = $request->input('seat');
        // dd($list_seatname);
        // dd(count(collect($request->input('seat'))));
        $filmID = $request->get('filmID');

        $roomID = $request->get('roomID');

        # ngày đã đặt là ngày mấy
        $today = $request->get('dateToday');

        $list_times = Film::withAndWhereHas('schedule_film', function ($query) use ($filmID) {             // withAndWhereHas from Room Model function
            $query->where('film_id', $filmID);
        })->get();

        $info_film = Room::withCount('seats')
            ->withAndWhereHas('seats', function ($query) {
                $query->with('categoryseat');
            })
            ->withAndWhereHas('film_using_pivot_schedules', function ($query) use ($filmID) {             // withAndWhereHas from Room Model function
                $query->with('brand')
                    ->where('films.id', $filmID);
            })
            ->where('id', $roomID)
            ->get();

        return view('site.pages.movies.reservation_form', compact('totalPrice', 'list_seatname', 'info_film', 'list_times', 'today', 'qty_food', 'food_names', 'foods', 'totalPriceFood','roomID'));
    }
}
