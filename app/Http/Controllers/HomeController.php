<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::inRandomOrder()->limit(6)->get();
        return view('home', compact('rooms'));
    }
}
