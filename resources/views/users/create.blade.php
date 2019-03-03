@extends('layouts.default')


@section('content')



<form method="POST" action="{{ route('user.store') }}">
    @csrf
<br>

<div class="form-row">

  <div class="form-group col-md-6">

    <label for="firstName"> First Name </label>
    <input  type="text"
            class="form-control"
            id="firstName"
            name="first_name"
            value = "{{old('first_name')}}"
            placeholder="John">
  </div>


  <div class="form-group col-md-6">

    <label for="lastName">Last Name </label>
    <input  type="text"
            class="form-control"
            id="lastName"
            name="last_name"
            value = "{{old('last_name')}}"
            placeholder="Doe">
  </div>


  <div class="form-group col-md-12">
    <label for="manager">Manager </label>
    <input  type="text"
            class="form-control"
            id="manager"
            name="manager"
            value = "{{old('manager')}}"
            placeholder="Doe">
  </div>

  <div class="form-group col-md-12">

    <label for="gender">Select Gender </label>

    <div id="gender" class="form-check">

        <input
            class="form-check-input"
            type="radio"
            name="gender"
            id="Radios1"
            @if(old('gender') == 'male') checked @endif
            value="male" >

        <label class="form-check-label" for="Radios1">
          Male
        </label>
    </div>


    <div class="form-check">
        <input
            class="form-check-input"
            type="radio"
            name="gender"
            id="Radios2"
            @if(old('gender') == 'female') checked @endif
            value="female">

        <label class="form-check-label" for="Radios2">
            Female
        </label>
    </div>
</div>

  <div class="form-group col-md-3">
    <label for="Select1">Select Department</label>
    <select name ="department_id" class="form-control" id="Select1">
        @foreach($departments as $department)
            <option @if(old('department_id') == $department->id ) selected @endif
             value="{{ $department->id }}"> {{ $department->name }} </option>
      @endforeach
    </select>
  </div>



  <div class="form-group col-md-4">
    <label for="Select2">Select Company</label>
    <select name="company_id" class="form-control" id="Select2">
        @foreach($companies as $company)
            <option value="{{$company->id}}"> {{ $company->name }} </option>
      @endforeach
    </select>
  </div>


    <div class="form-group col-md-4">
      <label for="Select3">Select Resort</label>
      <select name="resort_id" class="form-control" id="Select3">
          @foreach($resorts as $resort)
              <option value="{{ $resort->id }}"> {{ $resort->location->name }} </option>
        @endforeach
      </select>
    </div>

    <div class="form-group col-md-12">
        <label for="Select3" class="col-md-12"><h4>Select Software</h4></label>
        @foreach($softwares as $software)
        <div class="form-check form-check-inline col-md-2">
          <input class="form-check-input" name="softwares[]"
          type="checkbox" id="inlineCheckbox1" value="{{$software->id}}">
          <label class="form-check-label" for="inlineCheckbox1">{{$software->name}}</label>
        </div>
        @endforeach
    </div>

    <div class="form-group col-md-12">
        <label for="Select3" class="col-md-12"><h4>Select Hardware</h4></label>
        @foreach($hardwares as $hardware)
        <div class="form-check form-check-inline col-md-2">
          <input class="form-check-input" name="hardwares[]"
          type="checkbox" id="inlineCheckbox1" value="{{$hardware->id}}">
          <label class="form-check-label" for="inlineCheckbox1">{{$hardware->name}}</label>
        </div>
        @endforeach
    </div>


    <div class="form-group col-md-12">
        <label for="Select3" class="col-md-12"><h4>Select Files</h4></label>
        @foreach($files as $file)
        <div class="form-check form-check-inline col-md-2">
          <input class="form-check-input" name="access_files[]"
          type="checkbox" id="inlineCheckbox1" value="{{$file->id}}">
          <label class="form-check-label" for="inlineCheckbox1">{{$file->name}}</label>
        </div>
        @endforeach
    </div>

    <div class="form-group col-md-6">
     <label >Contract Start</label>
     <input type="date"
            id="datepicker2"
            name="contract_start"
            min="1000-01-01"
            max="3000-12-31"
            class="form-control">


    </div>
    <div class="form-group col-md-6">
     <label >Contract End</label>
     <input type="date" name="contract_end"
            min="1000-01-01"
            max="3000-12-31" class="form-control">
    </div>

  <button type="submit" class="btn btn-primary mb-2 col-md-12">Add User</button>

</form>

@endsection
