<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomCreateRequest;
use App\Photo;
use App\Room;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class RoomController extends Controller
{
    private $room, $photo;

    function __construct(Room $room, Photo $photo)
    {
        $this->room = $room;
        $this->photo = $photo;
    }

    public function index()
    {
        $rooms = Auth::user()->rooms;

        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(RoomCreateRequest $request)
    {
        $this->room->user_id = Auth::id();
        $this->room->home_type = $request->home_type;
        $this->room->room_type = $request->room_type;
        $this->room->accommodate = $request->accommodate;
        $this->room->bed_room = $request->bed_room;
        $this->room->bath_room = $request->bath_room;
        $this->room->listing_name = $request->listing_name;
        $this->room->slug = str_slug($request->listing_name);
        $this->room->summary = $request->summary;
        $this->room->city = $request->city;
        $this->room->address = $request->address;
        $this->room->is_tv = $request->get('is_tv') ? true : false;
        $this->room->address = $request->address;
        $this->room->is_kitchen = $request->is_kitchen ? true : false;
        $this->room->is_heating = $request->is_heating ? true : false;
        $this->room->is_internet = $request->is_internet ? true : false;
        $this->room->is_air = $request->is_air ? true : false;
        $this->room->active = $request->active ? true : false;
        $this->room->price = $request->price;

        if ($request->hasFile('images')) {
            $this->room->save();
            $room_id = $this->room->id;
            foreach ($request->images as $image) {
                $filename = $image->getClientOriginalName();
                $location = public_path('images/rooms/' . $filename);
                Image::make($image)->resize(800, 400)->save($location);
                $photo = new Photo;
                $photo->name = $filename;
                $photo->room_id = $room_id;
                $photo->save();
            }
        }
        return redirect()->route('home');
    }

    public function show($id)
    {
        $room = Room::find($id);
        return view('rooms.show', compact('room'));
    }

    public function search(Request $request)
    {
        
        $start_date = $request ->input('start_date');
        $end_date = $request ->input('end_date');
        
        $check = Reservation::whereNotBetween('start_date',  [$start_date, $end_date ])->whereNotBetween('end_date',  [$start_date, $end_date ])->value('room_id');
        $rooms = Room::where('id', $check)->where('city', $request ->input('city'))->get();
        return view('rooms.search', compact('rooms'));
    }
}
