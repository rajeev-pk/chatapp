@extends('layouts.base')

@section('main')
    <a id="unset" class="btn btn-primary">Unset session</a>
    <form method="POST" id="unsetUserSession" action="{{ route('unsetUserSession') }}">
        @csrf
    </form>
    <h1>{{ session('user')['username'] }}</h1>
    <div class="w-100 chat-container">
        <div class="h-75 p-5" id="chatroom">

        </div>
        <div class="h-25 d-flex justify-content-center align-items-end">
            <input type="text" class="from-comtrol w-100">
            <input type="submit" class="btn btn-primary" value="send message">
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('unset').addEventListener("click", (e) => {
            e.preventDefault();
            document.getElementById("unsetUserSession").submit();
        })
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

