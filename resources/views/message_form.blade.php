@extends('layouts.app_layout')

@section('content')
    <div class="row">
        <div class="col-sm-4 offset-sm-4">
            
            <form action="{{route('main_init')}}" method="post">
                @csrf

                <div class="form-group my-2">
                    <label for="idFrom">From:</label>
                    <input type="email" name="txtFrom" id="idFrom" class="form-control" value="{{old('txtFrom')}}">
                </div>

                <div class="form-group my-2">
                    <label for="idFrom">To:</label>
                    <input type="email" name="txtTo" id="idTo" class="form-control" value="{{old('txtTo')}}">
                </div>

                <div class="form-group my-2">
                    <label for="idMessage">Message:</label>
                    <textarea name="txtMessage" id="idMessage" rows="5" class="form-control">{{old('txtMessage')}}</textarea>
                </div>

                <div class="text-center form-group my-2">
                    <input type="submit" value="Send one time message" class="btn btn-primary">
                </div>
            </form>

            @if ($errors->any())
                <div class="alert alert-danger p-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>
@endsection