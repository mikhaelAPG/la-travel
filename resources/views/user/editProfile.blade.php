@extends('layouts.app')
@section('content')

<div id="bg-profile" class="view">
    <div class="mask rgba-black-strong">
        <div class="container-fluid d-flex align-items-center justify-content-center h-100">
            <div class="row justify-content-center text-center">
                <div class="m-5">
                    <form class="text-center border border-light p-5 mt-7" method="POST" action="/edit">
                        @method('patch')
                        {{ csrf_field() }}

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @elseif(session('failed'))
                            <div class="alert alert-danger">
                                {{session('failed')}}
                            </div>
                        @endif

                        <input type = "hidden" name = "old_email" value = "{{ Auth::user()->email }}">
                        <h1 class="text-white mb-3">EDIT PROFILE </h1>
                            <!-- Name -->
                            <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Name" value="{{  Auth::user()->name }}" autofocus required>
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif

                            <!-- Email -->
                            <input type="email" name="email" class="form-control mt-4 @error('email') is-invalid @enderror" placeholder="New E-mail" value="{{ Auth::user()->email }}">
                            @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            
                            <!-- Old Password -->
                            <input type="password" name="old_password" class="form-control mt-4 @error('old_password') is-invalid @enderror" placeholder="Old Password">
                            @error('old_password')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror

                            <!-- New Password -->
                            <input type="password" name="new_password" class="form-control mt-4 @error('new_password') is-invalid @enderror" placeholder="New Password">
                            @error('new_password')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            <!-- Confirm New Pass -->
                            <input type="password" name="password_confirmation" class="form-control mt-4 @error('password_confirmation') is-invalid @enderror" placeholder="Confirm New Password">
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            <button class="btn btn-info btn-block my-4"> Update </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>