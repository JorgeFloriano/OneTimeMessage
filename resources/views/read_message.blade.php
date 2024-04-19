@extends('layouts.app_layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h5>This message was sent by </h5><strong>{{$sender}}</strong>
                <p class="alert alert-danger p-3 text-center mb-5">This message can only be read once!</p>
                <h4 class="alert alert-info p-5 text-center">{{$message}}</h4>
                <div class="my-5">
                    <a href="{{route('main_index')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection