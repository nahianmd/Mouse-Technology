@extends('layouts_custom.master')

@section('title', "Home")

@section('head')

@endsection

@section('foot')
<script>
    

</script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">{{ __('Create License') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="mt-4" method="POST" action="">
                        @csrf

                
                        <div class="form-group row">
                            <label for="license_key" class="col-md-2 col-form-label">{{ __('Lisence key') }}</label>

                            <div class="col-md-6">
                                <input id="license_key" type="text" class="form-control @error('license_key') is-invalid @enderror" name="license_key" value="{{ old('license_key') }}" required autocomplete="license_key">

                                @error('license_key')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
