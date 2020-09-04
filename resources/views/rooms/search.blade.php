@extends('layouts.app')

@section('title')Home @endsection

@section('content')
<div class="container">
    
        
    

    </div>
    <div class="row">
        <div class="col-md-4">
        <h2>Showing rooms from: {{$city}}</h2> 
    </div>
    <div class="col-md-2">
        Start Date:
    <input type="text" id="reservation_start_date" name="start_date" class="form-control" disabled value="{{ $start_date }}">
</div>
    <div class="col-md-2">
        End Date:
    <input type="text" id="reservation_end_date" name="end_date" class="form-control" disabled value="{{ $end_date }}">
    </div>
</div>
<br><br><br>
    <div class="row">

        @foreach($rooms as $room)
        <div class="col-md-4">
            <div class="panel panel-default" style="height: 300px">
                <div class="panel-heading preview">
                    <img src="{{ asset("images/rooms/".$room->photos[0]->name) }}" style="width:378px;height:200px">
                </div>
                <div class="panel-body">
                    <img class="img-circle avatar-small" src="{{ Gravatar::get($room->user->email) }}" alt="">
                    <a href='{{url("rooms/show/{$room->id}")}}'>{{ $room->listing_name }}</a>
                    <br>
                    <div class="row">

                        <div class="row text-center row-space-1">
                            <div class="col-sm-4">
                                <i class="fa fa-home "> </i> &nbsp{{$room->home_type}}
                            </div>
                            <div class="col-sm-2">
                                <i class="fa fa-users "> &nbsp </i>{{ $room->accommodate }}
                            </div>
                            <div class="col-sm-2">
                                <i class="fa fa-bed "> &nbsp </i>{{ $room->bed_room }}
                            </div>
                            <div class="col-sm-2">
                                <i class="fa fa-bath "> &nbsp </i>{{ $room->bath_room }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection