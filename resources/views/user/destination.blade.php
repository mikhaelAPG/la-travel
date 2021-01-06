@extends('layouts.app')


@section('content')
<br>
<br>
<div id="destination-bg" class="view">
    <div class="mask flex-center rgba-black-strong">
        <h3 class="white-text custom-font ">Destination</h3>
    </div>
</div>

@if (!Auth::check())
<div id="full-bg" class="view">
    <div class="mask pattern-1 flex-center">
        <h1 class="white-text">Page Locked. Please  <a href="/login"> Login </a></h1>
    </div>
</div>
@else
<!-- TULIS SINI -------  List Nampilin Data .-->
<div class="container container-fluid d-flex align-items-center justify-content-center">
  @foreach ($files as $file)
    <div class="row mt-4" >
        <div class="col d-flex justify-content-center text-center">
            <div class="card">
                <div class="card-content">
                    <h2 class="card-title mt-3 custom-font2 text-center">
                            {{ $file->title }}
                    </h2>
                    <div class="view overlay zoom mr-1 ml-1">
                      <img class="img-responsive col-height1" src = "{{ asset($file->main_pic) }}">
                    </div>
                    <div class="mt-4">
                    @php
                      $myfile = fopen($file->desc, "r") or die("Unable to open file!");
                      echo substr(fgets($myfile),0,300);
                      echo "...";
                      fclose($myfile);
                    @endphp
                    </div>
                </div>
                <div class="card-read-more">
                    <a href="/detail/{{$file->title}}"><button class="btn btn-info btn-block my-4">
                        Read More
                    </button></a>
                </div>
            </div>
        </div>
    </div>
    </div>
  @endforeach
</div>
@endif

<!-- Footer -->
<footer class="page-footer font-big special-color-dark">

  <!-- Footer Elements -->
  <div class="container">

    <!-- Grid row-->
    <div class="row">

    <hr>

    <!-- Call to action -->
    @if (Auth::check())
        
        <ul class="list-unstyled list-inline text-center py-2">
            <li class="list-inline-item">
            <a href="/logout" class="btn btn-primary btn-round-lg">Logout</a>
            </li>
        </ul>

    @else

        <ul class="list-unstyled list-inline text-center py-2">
            <li class="list-inline-item">
            <h5 class="mb-1">Register for free</h5>
            </li>
            <li class="list-inline-item">
            <a href="/register" class="btn btn-primary btn-round-lg">Register!</a>
            </li>
        </ul>
    @endif
        <!-- Call to action -->

    <hr>

      <!-- Grid column -->
      <div class="col-md-12 py-5">
        <div class="mb-5 flex-center">

          <!-- Facebook -->
          <a class="fb-ic">
            <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-3x"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-3x"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-3x"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-3x"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic">
            <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-3x"> </i>
          </a>
          <!--Pinterest-->
          <a class="pin-ic">
            <i class="fab fa-pinterest fa-lg white-text fa-3x"> </i>
          </a>
        </div>
      </div>
      <!-- Grid column -->

    </div>


  </div>
  <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://mdbootstrap.com/"> LaravelTravel.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

