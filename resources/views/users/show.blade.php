@extends('layouts.default')

@section('content')




  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Name, {{$user->first_name. ' '. $user->last_name}}</h1>

    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    <form  action="{{route('user.updateComponents' , $user->id)}}" method="post">
    @csrf
    <div class="row">
      <div class="col-md-6">
        <h2>Software </h2>
        <div class="form-group">
            <label for="Select3">Select Software</label>
            <br>
            @foreach($user->softwares as $software)
            <div class="form-check form-check-inline">
              <input class="form-check-input" name="components[]" type="checkbox"
              id="inlineCheckbox1" value="{{$software->id}}">
              <label class="form-check-label" for="inlineCheckbox1" style="color: {{$software->status == 'delevired'? 'green' : 'red'}};">
                  {{$software->software->name}}</label>
            </div>
            <br>
            @endforeach
        </div>
      </div>

      <div class="col-md-6">
        <h2>Access Files</h2>
        <div class="form-group">
            <label for="Select3">Select Access File</label>
            <br>
            @foreach($user->files as $file)
            <div class="form-check form-check-inline">
              <input class="form-check-input" name="components[]" type="checkbox"
              id="inlineCheckbox1" value="{{$file->id}}">
              <label class="form-check-label" for="inlineCheckbox1"
              style="color: {{$file->status == 'delevired'? 'green' : 'red'}};">
              {{$file->file->name}}</label>
            </div>
            <br>
            @endforeach
        </div>
      </div>
      <br><br>
      <div class="row">
          <div class="col-md-12">
            <h2>Hardware</h2>
            <div class="form-group">
                <label for="Select3">Select Hardware</label>
                <br>
                @foreach($user->hardwares as $hardware)
                <div class="form-check form-check-inline">
                  <input class="form-check-input" name="components[]" type="checkbox" id="inlineCheckbox1"
                 value="{{$hardware->id}}">
                  <label class="form-check-label" for="inlineCheckbox1"
                  style="color: {{$hardware->status == 'delevired'? 'green' : 'red'}};">
                      {{$hardware->hardware->name}}</label>
                </div>
                <br>
                @endforeach
            </div>
          </div>
      </div>
    </div>

    <hr>
    <button  class="btn btn-primary btn-lg btn-block" type="submit">Update Components</button>
    </form>

  </div> <!-- /container -->


@endsection
