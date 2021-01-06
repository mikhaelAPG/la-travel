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
@foreach($file as $file)
<h1 class="text-center custom-font2 bg-primary text-white">{{$file->title}}</h1>

<div class="container-fluid d-flex align-items-center justify-content-center">
  <div class="row d-flex justify-content-center text-center">
    <div class="col">
        <br>
          <img style="width: 50rem;" src = "{{ asset($file->main_pic) }}">
          <br>
          <br>
    </div>
    <div class="col">
            <p class="text-left mt-3">
              @php
              $myfile = fopen($file->desc, "r") or die("Unable to open file!");
              while(!feof($myfile)) {
              echo fgets($myfile)."<br>";
              }
              fclose($myfile);
              @endphp
            </p>
    </div>
  </div>
</div>

<!-- Gallery-->
       
    <h2 class="text-center custom-font2 bg-primary text-white">Galleries</h2>
    <div class="d-flex justify-content-center text-center">
      <div class="row">
    @foreach($galleries as $gal)
        <div class="card" style="width: 20rem;">
          <div class="view overlay">
            <img src="{{ asset($gal->gallery) }}" class="card-img-top img-responsive col-height2" alt = "{{$gal->name}}">
            <div class="mask flex-center rgba-black-strong">
              <p class="text-white">{{$gal->name}}</p> 
            </div>
          </div>
        </div>
    @endforeach
      </div>
    </div>

<h2 class="text-center custom-font2 bg-primary text-white">Other</h2>

<div class="ml-5">
  <div class="row">
        <div class="col-sm-7">
            <div class="card">

            <!-- PRICE-->
                <br />
                <div class="card-content">
                    <h4 class="card-title ">
                        Price
                    </h4>
                    <div class="">
                          @php
                              $myfile = fopen($file->price, "r") or die("Unable to open file!");
                              while(!feof($myfile)) {
                                  echo fgets($myfile)."<br>";
                              }
                              fclose($myfile);
                          @endphp
                          <br>
                      @endforeach
                    </div>
                  </div>
              </div>           
        </div>

        <!-- Contact-->

        <div class="col-sm-4">
            <div class="card">
                <br />
                <div class="card-content">
                    <h4 class="card-title">
                          Contact Business :
                    </h4>
                    <div class="">
                      @foreach($contacts as $con)
                          Main Contact: {{$con->phone}}<br>
                          @if($con->instagram != null)
                              Instagram: {{$con->instagram}}<br>
                          @endif
                          @if($con->facebook != null)
                              Facebook: {{$con->facebook}}<br>
                          @endif
                          @if($con->twitter != null)
                              Twitter: {{$con->twitter}}<br>
                          @endif
                          @if($con->google != null)
                              Google: {{$con->google}}<br>
                          @endif
                          @if($con->pinterest != null)
                              Pinterest: {{$con->pinterest}}<br>
                          @endif
                          @if($con->linkedin != null)
                              Linked-In: {{$con->linkedin}}<br>
                          @endif
                      @endforeach
                    </div>
                
                </div>
            </div>
        </div>

    </div>
    
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

