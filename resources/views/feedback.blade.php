@extends('layouts_custom.master')

@section('title', "Message")

@section('head')

@endsection

@section('foot')
    
@endsection

@section('content')

@if ($status)
    <div class="align-items-center container alert alert-success mt-3" role="alert">
        “Congratulations!! Your License Has Been activated. It will work till {{$expire_date}}”
    </div>
@else
    <div class="align-items-center container alert alert-danger mt-3" role="alert">
        Oops!! Your attempt to activate the license was not successful”
    </div>
@endif

@endsection
