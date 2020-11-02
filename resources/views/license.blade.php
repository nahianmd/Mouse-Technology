@extends('layouts_custom.master')

@section('title', "Home")

@section('head')

@endsection

@section('foot')
<script>
    $(function() { 
        $("#user_id").keyup(function() {
            user_id = this.value;
            if(user_id > 0){
                getUsers(user_id);
            }
        });

        $("#btn-generate").click(function(){
            var random = makeid(8);
            var uid = $("#user_id").val();
            var exp_month = $("#exp_month").val();
            var date_now = new Date();
            
            var exp_date = addMonths(date_now, exp_month);


            var month = exp_date.getMonth()+1;
            var day = exp_date.getDate();

            var exp_date_short = exp_date.getFullYear() +
            (month<10 ? '0' : '') + month +
            (day<10 ? '0' : '') + day;

            License_key = uid+random+exp_date_short;

            $("#license").val(License_key);
        })
    });

    function addMonths(date, months) {
        var d = date.getDate();
        date.setMonth(date.getMonth() + +months);
        if (date.getDate() != d) {
        date.setDate(0);
        }
        return date;
    }

    function makeid(length) {
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }



    function getUsers(user_id) {
        $.ajax({
            url: '/license/'+user_id,
            type: 'GET',
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data) {
                if(data.length>0){
                    $('.user-info').html(`<table class="table border mb-5">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Label</th>
                                                    <th scope="col">Info</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">First Name</th>
                                                    <td>`+data[0].first_name+`</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Last Name</th>
                                                    <td>`+data[0].last_name+`</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Organization</th>
                                                    <td>`+data[0].organization+`</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Phone</th>
                                                    <td>`+data[0].phone+`</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">E-mail</th>
                                                    <td>`+data[0].email+`</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">City</th>
                                                    <td>`+data[0].city+`</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Street</th>
                                                    <td>`+data[0].street+`</td>
                                                </tr>
                                            </tbody>
                                        </table><br>`)
                }
                
                console.log(data)
            }
        });
    }
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

                    <div class="user-info">
                        
                    </div>

                    <form class="mt-2" method="POST" action="">
                        @csrf

                
                        <div class="form-group row">
                            <label for="user_id" class="col-md-2 col-form-label">{{ __('User ID') }}</label>

                            <div class="col-md-6">
                                <input id="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ old('user_id') }}" required autocomplete="user_id">

                                @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_id" class="col-md-2 col-form-label">{{ __('License For') }}</label>

                            <div class="col-md-3">
                                <select class="custom-select" id="exp_month">
                                    <option disabled hidden selected>Month</option>
                                    {{-- <option value="1">1</option>
                                    <option value="2">2</option> --}}
                                    <option value="3">3</option>
                                    {{-- <option value="4">4</option>
                                    <option value="5">5</option> --}}
                                    <option value="6">6</option>
                                    {{-- <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option> --}}
                                    <option value="12">12</option>
                                </select>

                                @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="license" class="col-md-2 col-form-label">{{ __('License Key') }}</label>

                            <div class="col-md-6 input-group">
                                <input id="license" type="text" class="form-control @error('license') is-invalid @enderror" name="license" value="{{ old('license') }}" required autocomplete="license">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" id="btn-generate" type="button">Generate</button>
                                </div>
                                @error('license')
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
