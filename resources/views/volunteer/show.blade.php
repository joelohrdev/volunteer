@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $event->event_name }}</div>

                    <div class="card-body">
                        <form action="{{ route('volunteerevents.update', $event->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="form-group">
                                <label for="division">Which Player would you like to sign up?</label>
                                <select name="player_id" class="custom-select">
                                    <option selected></option>
                                    @foreach($players as $player)
                                        <option value="{{ $player->id }}">{{ $player->first_name }} {{ $player->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="eventcategory_id" value="{{ $event->eventcategory_id }}">
                            <input type="hidden" name="event_name" value="{{ $event->event_name }}">
                            <input type="hidden" name="event_date" value="{{ \Carbon\Carbon::parse($event->event_date)->format('Y-d-m') }}">
                            <input type="hidden" name="event_time" value="{{ $event->event_time }}">
                            <input type="hidden" name="event_details" value="{{ $event->event_details }}">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
