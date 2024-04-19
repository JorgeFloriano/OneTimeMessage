@extends('layouts.app_layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h5>A confirmation email was sent to </h5><strong>{{$email_adress}}</strong>
                <p>Check your mailbox or spam box.</p>
                <div class="my-5">
                    <a href="{{route('main_index')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection