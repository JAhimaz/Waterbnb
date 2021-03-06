@extends('layouts.master')
@section('title', ' | Home')

@section('stylesection')
<!--Style Section for styling that is required for this specific page -->

@endsection

@section('content') <!-- Main Body -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="text-center" style="font-size: 5em;"><span style="color: #33A2FF">WATERBNB</span></h1>
      <p class="text-center" style="font-size: 2em;">BELONG EVERYWHERE</p>
    </div>
  </div>
  <div id="app">
    <waterbnb user-id="{{user_id_available()}}" is-logged-in="{{is_logged_in()}}"></waterbnb>
  </div>

  <script src="{{ asset('/js/app.js') }}"></script>
@endsection

@section('scripts')
<!--Script Section for scripts that is required for this specific page -->

@endsection
