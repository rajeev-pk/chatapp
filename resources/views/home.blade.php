@extends('layouts.base')

@section('main')
    <div class="w-100 d-flex align-items-center justify-content-center" style="height: 800px">
        <div class="card card-style">
            <form action="{{ route('setUserSession') }}" method="POST" class="card-body">
                @csrf
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input name="username" type="text" class="form-control mt-1">
                </div>
                <div class="form-group mt-3">
                    <input name="submit" type="submit" class="btn btn-primary w-100" value="Submit">
                </div>
            </form>
        </div>
    </div>
@endsection
