<!DOCTYPE html>
<html lang="en">
<head>
    <title> La Travel </title>
    <link href="/css/app.css" rel="stylesheet">
    <script src="/js/app.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/mdb.min.css">
  <link rel="stylesheet" href="/css/style.css">

  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="/js/mdb.min.js"></script>

</head>
<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-bl pl-5">

        <!-- Bisa dipakein session if-else. Jika login hanya Tulisan laravel, tp kalau sudah login berganti menjadi
    nama. Pilihan . -->

        <a class="navbar-brand font-weight-bold ml-3" href="#">La Travel</a>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
        <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse justify-content-end pr-5  " id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link mt-3" href="/menu">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mt-3" href="/destination">Destination</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mt-3" href="/culinary">Culinary</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mt-3" href="/hotel">Hotels</a>
            </li>

            @if (Auth::check())
                <li class="nav-item">
                <a href="/profile"><h6 class="ml-2 mt-4 text-white">Welcome,  {{ Auth::user()->name }}</a></h6>
                </li>
            @else
                <li class="nav-item">
                    <a href="/login"><button type="button" class="btn btn-outline-primary btn-round-lg ml-2">Login</button></a>
                </li>
                <li class="nav-item">
                    <a href="/register"><button type="button" class="btn btn-outline-primary btn-round-lg ml-2">Register</button></a>
                </li>
            @endif

        </ul>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>
</body>
</html>