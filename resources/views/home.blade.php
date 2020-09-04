@extends('layouts.app')

@section('title')Home @endsection

@section('content')
<div class="container">
    <div class="row">
        <form action="{{ route('rooms.search') }}" method="post" value="">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">

                    <input list="cities" name="city" id="city" class="form-control" placeholder="Where are you going?"
                        select>
                    <datalist id="cities">
                        <option value="Ho Chi Minh">
                        <option value="Phu Quoc">
                        <option value="Ang Giang">
                        <option value="Vung Tau">
                        <option value="Bac Lieu">
                        <option value="Da Nang">
                        <option value="Quang Nam">
                        <option value="Hue">
                        <option value="Ha Noi">
                        <option value="Hai Phong">
                    </datalist>
                </div>

                <div class="col-md-2">
                    <input type="text" placeholder="Start Date" class="form-control" name="start_date" id="start_date">
                </div>
                <div class="col-md-2">
                    <input type="text" placeholder="End Date" class="form-control" name="end_date" id="end_date">
                </div>
                <div class="col-md-2">
                    <input type="submit" class="btn btn-primary" value="Search">
                </div>

            </div>
            <div class=row>
                <div class="col-md-2 select">
                    <div class="form-group">
                        <i class="fa fa-users "></i>
                        <label for="accommodate">Accommodate</label>
                        <select required id="accommodate" name="accommodate" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 select">
                    <div class="form-group">
                        <i class="fa fa-bed "></i>
                        <label for="bed_room">Bedrooms</label>
                        <select required id="bed_room" name="bed_room" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 select">
                    <div class="form-group">
                        <i class="fa fa-bath "></i>
                        <label for="bath_room">Bathrooms</label>
                        <select required id="bath_room" name="bath_room" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <hr>

    <div class="text-center">
        <h2>Just for the weekend</h2>
        <p>Discover new, inspiring places in Viet Nam.</p>
    </div>

    <br>


    <div class="row">
        @foreach($rooms as $room)
        <div class="col-md-4">
            <div class="panel panel-default" style="height: 320px">
                <div class="panel-heading preview">
                    <img src="{{ asset("images/rooms/".$room->photos[0]->name) }}" style="width:100%;height:200px">
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

    <br>

    <div class="text-center">
        <h2>Explore Viet Nam</h2>

    </div>

    <br>


</div>
</div>
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
<script>
    $(function () {
            
            $('#start_date').datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0,
                maxDate: '3m',
                onSelect: function (selected) {
                    $('#end_date').datepicker("option", "minDate", selected);
                }
            });

            $('#end_date').datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0,
                maxDate: '3m',
                onSelect: function (selected) {
                    $('#start_date').datepicker("option", "maxDate", selected);

                    var start_date = $('#start_date').datepicker('getDate');
                    var end_date = $(this).datepicker('getDate');
                    var days = (end_date - start_date) / 1000 / 60 / 60 / 24 + 1;
                    var total = days * price;
                    $('#preview').show();
                    $('#reservation_sum').text(total);
                    $('#reservation_days').text(days);
                    $('#reservation_total').val(total);
                }
            });
        })
</script>
@endsection