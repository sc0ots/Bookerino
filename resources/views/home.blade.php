@extends('layouts.app')

@section('title')Home @endsection

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('rooms.search') }}" method="post" value="">    
                {{ csrf_field() }}   
                <div class="row">
                    <div class="col-md-6">
                                            
                            <input list="cities" name="city" id="city" class="form-control" placeholder="Where are you going?">
                            <datalist id="cities">
                              <option value="Ho Chi Minh">
                              <option value="Phu Quoc">
                              <option value="Ang Giang">                       
                            </datalist>                                  
                    </div>
                    
                    <div class="col-md-2">
                        <input type="text" placeholder="Start Date" class="form-control" name="start_date">
                    </div>
                    <div class="col-md-2">
                        <input type="text" placeholder="End Date" class="form-control" name="end_date">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-primary" value="Search">
                    </div>
                </div>
            </form>

            <hr>

            <div class="text-center">
                <h2>Just for the weekend</h2>
                <p>Discover new, inspiring places close to home.</p>
            </div>

            <br>

            <div class="row">
                <div class="col-md-4 col-sm-12">
                <a href='{{url("rooms/city/")}}'>
                        <div class="discovery-card" style="background-image: url({{ asset('/images/New_York.jpeg') }})">
                            <div class="va-container">
                                <div class="va-middle text-center">
                                    <h2><strong>Ho Chi Minh</strong></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href='{{url("rooms/city/Phu Quoc")}}'>
                        <div class="discovery-card" style="background-image: url({{ asset('/images/San_Francisco.jpeg') }})">
                            <div class="va-container">
                                <div class="va-middle text-center">
                                    <h2><strong>San Francisco</strong></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="">
                        <div class="discovery-card" style="background-image: url({{ asset('/images/Chicago.jpeg') }})">
                            <div class="va-container">
                                <div class="va-middle text-center">
                                    <h2><strong>Chicago</strong></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <br>

                <div class="text-center">
                    <h2>Explore the world</h2>
                    <p>See where people are travelling, all around the world.</p>
                </div>

                <br>

                <div class="row">
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
        </div>
    </div>
@endsection
