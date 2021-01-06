@extends('layouts.app')
@section('content')
<div id="bg-profile" class="view">
    <div class="mask rgba-black-strong">
        <div class="container-fluid d-flex align-items-center justify-content-center h-100">
            <div class="row justify-content-center text-center">
                <div class="col-md-20 border border-light">
                    <div class="m-5">
                        <h1 class="text-white mb-3">PERSONAL PROFILE </h1>
                        <div>
                            <h5 class="text-white"> Your Name : {{  Auth::user()->name }} </h5>
                            <h5 class="text-white"> Your Email : {{ Auth::user()->email }} </h5>
                            <a href="/edit"><button class="btn btn-info btn-block my-4"> Edit Profile </button></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>