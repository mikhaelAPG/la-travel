@extends('layouts.appAdmin')

@section('content')
<div id="bg-admin" class="view">
    <div class="mask rgba-black-strong">
        <div class="container-fluid d-flex align-items-center justify-content-center h-100">
			<div class="row justify-content-center text-center">
                <div class="col-md-20">
                    <h1 class="mb-4 text-monospace text-white">Hi, Admin Latravel!</h1>

                    <!-- edit destination -- on development @VinAlbertus -->
                    <a href="/admin/createData"><button class="btn btn-info my-4 btn-block"> Upload New Data</button></a>

                    <!-- edit destination -->
                    <a href="/admin/editDestination"><button class="btn btn-info my-4 btn-block"> Edit Destination</button></a>

                    <!-- edit culinary -->
                    <a href="/admin/editCulinary"><button class="btn btn-info my-4 btn-block"> Edit Culinary</button></a>

                    <!-- edit hotel -->
                    <a href="/admin/editHotel"><button class="btn btn-info my-4 btn-block"> Edit Hotel</button></a>

                    <!-- edit user?? -->

                    <a href="/logout"><button class="btn btn-info my-4 btn-block"> Logout</button></a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')