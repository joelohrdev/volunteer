<?php

namespace App\Http\Controllers;

use App\Player;
use App\VolunteerEvent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bookedEvents = VolunteerEvent::orderBy('event_date', 'ASC')->whereDate('event_date', '>=', Carbon::now())->get()->where('user_id', '=', Auth::user()->id);
        $pastBookedEvents = VolunteerEvent::orderBy('event_date', 'ASC')->whereDate('event_date', '<', Carbon::now())->get()->where('user_id', '=', Auth::user()->id);
        $players = Player::get()->where('user_id', '=', Auth::user()->id);

        return view('home', compact('players', 'volunteerevents', 'bookedEvents', 'pastBookedEvents'));
    }
}
