@extends('layouts_custom.master')

@section('title', "Home")

@section('head')

@endsection

@section('foot')

@endsection

@section('content')



{{-- ====================================
    Landing Page
======================================= --}}

<div class="jumbotron text-center align-items-center d-flex justify-content-center cover">
    <div>
        <h1>Welcome To Mouse Technology</h1>
        <p>Best Website & Software, SEO Agency in Bangladesh</p><br>
        <a class="btn btn-primary font-white" role="button" href="{{ route('register') }}">Join Us</a>
    </div>

</div>

@endsection

