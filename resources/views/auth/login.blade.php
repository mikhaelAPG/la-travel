@extends('layouts.app')

@section('content')
<div id="bg-login" class="view">
    <div class="mask rgba-black-strong">
		<div class="container-fluid d-flex align-items-center justify-content-center h-100">
			<div class="row justify-content-center text-center">
				<div class="col-md-20">
					<!-- Default form login -->
					<form class="text-center border border-light pad" method="POST" action="{{ route('login') }}">
						{{ csrf_field() }}
						<h1 class="mb-4 text-monospace text-white">LOGIN</h1>
						@if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif

						<!-- Email -->
						<label style="color:white;margin-right: 320px;">E-Mail</label>
						<input type="email" id="defaultLoginFormEmail" name="email" class="form-control mb-4 " placeholder="E-mail" autofocus required>

						<!-- Password -->
						<label style="color:white; margin-right: 300px;">Password</label>
						<input type="password" id="defaultLoginFormPassword" name="password" class="form-control mb-4" placeholder="Password" autofocus required>

						<!-- <div class="d-flex justify-content-around">
							<div>
								<div class="custom-control custom-checkbox mr-5 text-white">
									<input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
									<label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
								</div>
							</div>
							<div>
								<a href="/forgot">Forgot password?</a>
							</div>
						</div> -->

						<!-- Sign in button -->
						<button class="btn btn-info btn-block my-4" type="submit">Login</button>

						<!-- Register -->
						<p class="text-white">Not a member?
							<a href="/register">Register</a>
						</p>

					</form>
					<!-- Default form login -->
				</div>
			</div>
		</div>
	</div>
</div>
@include('sweetalert::alert')
