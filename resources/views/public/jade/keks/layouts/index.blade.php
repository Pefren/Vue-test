<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title')</title>
  </head>
  <body></body>
  @include("partials.foo-bar", ['key' => 'val'])
</html>
@section('sidebar')
  <sidebar class="master">
    <p>This is the master sidebar.</p>
  </sidebar>
@stop
  <div class="container">
    <div class="row"></div>
  </div>
  @yield('content')