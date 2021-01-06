@extends('layouts.app')
@section('content')
<br>
<br>
<div id="destination-bg" class="view">
    <div class="mask flex-center rgba-black-strong">
        <h3 class="white-text custom-font ">{{$type}}</h3>
    </div>
</div>

<!-- TULIS SINI -------  List Nampilin Data .-->
   
    <div class="mask flex-center rgba-black-strong">
        <h3 class="white-text custom-font ">The Data Still Empty</h3>
    </div>

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

