@extends('layouts.app')

@section('content')
<div id="bg-profile" class="view">
    <div class="mask rgba-black-strong">
		<div class="container-fluid d-flex align-items-center justify-content-center h-100">
			<div class="row justify-content-center text-center">
				<div class="col-md-20">
                        <form class="text-center border border-light pad" method="POST" action="/forgot">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            @elseif(session('failed'))
                                <div class="alert alert-danger">
                                    {{session('failed')}}
                                </div>
                            @endif
                            
                            {{ csrf_field() }}

                            <h1 class="mb-4 text-monospace text-white">FORGOT PASSWORD</h1>
                            <input type="email" id="defaultLoginFormEmail" name="email" class="form-control mb-4" placeholder="E-mail" autofocus required>
                            <button class="btn btn-info btn-block my-4" type="submit">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
