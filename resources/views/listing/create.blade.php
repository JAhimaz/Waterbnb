@extends('layouts.master')
@section('title', ' | Home')

@section('stylesection')
  .jumbotron {
      padding: 2rem 0rem;
  }
@endsection

@section('content') <!-- Main Body -->
  <div class="jumbotron jumbotron-fluid">
  <div class="containerform" style="border-top: solid #212529 2px;
                                    border-left: solid #212529 2px;
                                    border-right: solid #212529 2px;
                                    margin-right: 2rem;
                                    padding: 2rem;">
    <row>
      <h1 class="col-md-8 col-md-offset-4">SUBMIT A <span style="color: #33A2FF">WATERBNB</span></h1>
      <p class="col-md-8 col-md-offset-4">Logged in as: <?php echo ucfirst(current_user()->name) ?></p><br />
    </row>
    <row>
      <div class="col-md-8 col-md-offset-4">
        {!! Form::open(['route' => 'listings.store']) !!}
        <div class="form-row">
          <div class="form-group col-md-8">
            <label for="title">Title</label>
            <input type="title" class="form-control" name="title" placeholder="Enter a title">
          </div>
          <div class="form-group col-md-4">
            <label for="price">Price (RM)</label>
            <input type="number" class="form-control" name="price" step="0.01" min="10.00" max="9999.99" placeholder="RM299.99" pattern="^\d*(\.\d{0,2})?$"/>
          </div>
        </div>
        <div class="form-group">
          <label for="desc">Description</label>
          <textarea type="desc" class="form-control" name="desc" placeholder="Enter a Description"></textarea>
        </div>
        <div class="form-group">
          <label for="location">Address</label>
          <input type="text" class="form-control" name="location" placeholder="1234 Main St">
        </div>
        <div class="form-row">
        <div class="form-group col-md-4">
          <label for="type">Type</label>
          <select name="type" class="form-control">
            <option value="" selected disabled hidden>Choose Your Type</option>
            <option value="Private">Private</option>
            <option value="Shared">Shared</option>
          </select>
        </div>
      </div>
        <div class="form-group">
        </div>
        <button type="submit" class="btn btn-success btn-lg">Create</button>
        {{-- <button type="submit" class="btn btn-danger float-right btn-lg">Cancel</button> --}}
        {!! Form::close() !!}
      </div>
    </row>
  </div>
  </div>
@endsection

<!--
||||||||||NOTES|||||||||||
| 'title'
| 'desc'
| 'price'
| 'type'
| 'location'
| 'rentor_name'
|||||||||||||||||||||||||
-->

@section('scripts')
<!--Script Section for scripts that is required for this specific page -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection
