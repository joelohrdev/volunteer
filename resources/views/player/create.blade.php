@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Player</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form action="{{ route('player.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input name="first_name" type="text" class="form-control" id="first_name" aria-describedby="first_name">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input name="last_name" type="text" class="form-control" id="last_name" aria-describedby="last_name">
                                </div>
                                <div class="form-group">
                                    <label for="division">Division</label>
                                    <select name="division" class="custom-select">
                                        <option selected></option>
                                        <option value="6U">6U</option>
                                        <option value="8U">8U</option>
                                        <option value="10U">10U</option>
                                        <option value="12U">12U</option>
                                        <option value="14U">14U</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="team_name">Team Name</label>
                                    <input name="team_name" type="text" class="form-control" id="team_name" aria-describedby="team_name">
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input name="phone_number" type="tel" class="form-control" id="phone_number" aria-describedby="phone_number">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
