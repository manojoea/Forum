<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lara-Forum</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
        @include('layouts.partials.navbar')
        @yield('banner')

              <div class="container">
                  <div class="row mt-3">
                          <div class="col-md-3"><h4>Category</h4></div>
                          <div class="col-md-9">
                              <div class="row ">
                                  <div class="col-md-9">
                                      <h4 class="main-content-heading">@yield('heading')</h4>
                                  </div>
                                  <div class="col-md-3">
                                      <a href="{{route('threads.create')}}" class="btn btn-success btn-thread">Create Thread</a>
                                  </div>
                              </div>
                          </div>
                  </div>
                  <div class="row mt-3">
                      <div class="col-md-3">
                          <ul class="list-group">
                              <a href="{{route('threads.index')}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                  All Threads
                                  <span class="badge badge-primary badge-pill">14</span>
                              </a>
                              <a class="list-group-item d-flex justify-content-between align-items-center">
                                  Dapibus ac facilisis in
                                  <span class="badge badge-primary badge-pill">2</span>
                              </a>
                              <a class="list-group-item d-flex justify-content-between align-items-center">
                                  Morbi leo risus
                                  <span class="badge badge-primary badge-pill">1</span>
                              </a>
                          </ul>
                      </div>
                      <div class="col-md-9">
                          <div class="content-warp well">
                              @yield('content')
                          </div>
                      </div>
                  </div>
              </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script></body>
</html>
