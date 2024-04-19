@extends('layouts.app_layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h5>The message has been sent and confirmed to the recipient</h5><strong>{{$email_adress}}</strong>
                <div class="my-5">
                    <a href="{{route('main_index')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection