@extends('layouts.app')

@section('title')Home @endsection

@section('content')
    <div class="container">       
                <div class="row">
                    <b>xd</b>
                    @foreach($rooms as $room)
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading preview">
                                    <img src="{{ asset("images/rooms/".$room->photos[0]->name) }}">
                                </div>
                                <div class="panel-body">
                                    <img class="img-circle avatar-small" src="{{ Gravatar::get($room->user->email) }}" alt="">
                                    <a href='{{url("rooms/show/{$room->id}")}}'>{{ $room->listing_name }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>           
    </div>
@endsection
