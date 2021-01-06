@extends('layouts.app')

@section('content')
<div id="bg-login" class="view">
    <div class="mask rgba-black-strong">
        <div class="container-fluid d-flex align-items-center justify-content-center h-100">
			<div class="row justify-content-center text-center">
                <div class="col-md-20">
                    <!-- Default form register -->
                    <form class="text-center border border-light p-5 mt-7" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <h1 class="mb-4 text-monospace text-white">REGISTER</h1>

                        <div class="form-row mb-4 login-form">
                            <!-- First name -->
                            <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Name" value="{{ old('name') }}" autofocus required>
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                           
                            <!-- E-mail -->
                            <input type="email" id="defaultRegisterFormEmail" name="email" class="form-control mt-4 {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="E-mail" value="{{ old('email') }}" autofocus required>
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            
                            <!-- Gender -->
                            <div class="card-body" style="margin-top: 17px; background:white;">
                                <p class="col-form-label col-sm-2 pt-0">Gender</p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_male" value="M" checked>
                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_female" value="F">
                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div>
                            </div>

                            <!-- Password -->
                            <input type="password" id="defaultRegisterFormPassword" name="password" class="form-control mt-4 {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" autofocus required>
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                            <!-- Confirm Pass -->
                            <input type="password" id="defaultRegisterFormPassword" name="password_confirmation" class="form-control mt-4 {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" placeholder="Confirm Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" autofocus required>
                            @if ($errors->has('password_confirmation'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password_confirmation') }}
                                </div>
                            @endif

                            <!-- Sign up button -->
                            <button class="btn btn-info my-4 btn-block" type="submit">Register</button>

                            <p class="text-white">Already have account?
                                <a href="/login">Login</a>
                            </p>
                        </div>

                        <!-- Default form register -->
                    </form>
            
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')