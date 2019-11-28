@extends('layouts.base')

@section('body')

  {{-- navigation --}}
  @include('includes.nav')
  {{-- site wrapper --}}

  <div class="site-wrapper">
    @yield('content')
  </div>

  {{-- footer --}}
  @include('includes.footer')
@endsection
