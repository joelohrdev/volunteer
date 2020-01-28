@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Players -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Players</div>
                <div class="card-body">
                    <ul>
                        @foreach($players as $player)
                            <li>{{ $player->first_name }} {{ $player->last_name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Upcoming Events -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Upcoming Volunteer Events</div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row row-cols-4">
                                @foreach($bookedEvents as $bookedEvent)
                                    <div class="col">
                                        <div class="card text-white bg-primary text-center my-3">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $bookedEvent->player->first_name }}</h5>
                                                <p class="card-text">
                                                    {{ $bookedEvent->event_name }}<br>
                                                    {{ \Carbon\Carbon::parse($bookedEvent->event_date)->format('l F jS Y') }}<br>
                                                    {{ \Carbon\Carbon::parse($bookedEvent->event_time)->format('h:i A') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Past Events -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Past Volunteer Events</div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row row-cols-4">
                                @foreach($pastBookedEvents as $pastBookedEvent)
                                    <div class="col">
                                        <div class="card text-white bg-dark text-center">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $pastBookedEvent->player->first_name }}</h5>
                                                <p class="card-text">
                                                    {{ $pastBookedEvent->event_name }}<br>
                                                    {{ \Carbon\Carbon::parse($pastBookedEvent->event_date)->format('l F jS Y') }}<br>
                                                    {{ \Carbon\Carbon::parse($pastBookedEvent->event_time)->format('h:i A') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
@endsection
