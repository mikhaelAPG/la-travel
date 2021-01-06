@extends('layouts.app')

@section('content')
<div id="bg-profile" class="view">
    <div class="mask rgba-black-strong">
		<div class="container-fluid d-flex align-items-center justify-content-center h-100">
			<div class="row justify-content-center text-center">
				<div class="col-md-20">
                        <form class="text-center border border-light pad" method="POST" action="">
						{{ csrf_field() }}

                        <h1 class="mb-4 text-monospace text-white">FORGOT PASSWORD</h1>

                         <!-- Password -->
                         <input type="password" id="defaultRegisterFormPassword" name="password" class="form-control mt-4 {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" autofocus required>
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                            <!-- Confirm Pass -->
                            <input type="password" id="defaultRegisterFormPassword" name="confirm_pass" class="form-control mt-4 {{ $errors->has('confirm_pass') ? 'is-invalid' : '' }}" placeholder="Confirm Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" autofocus required>
                            @if ($errors->has('confirm_pass'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('confirm_pass') }}
                                </div>
                            @endif

                             <!-- Sign up button -->
                             <button class="btn btn-info my-4 btn-block" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
