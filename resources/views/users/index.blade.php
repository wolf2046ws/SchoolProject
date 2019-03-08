@extends('layouts.default')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/bootstrapdatatable.css')}}" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

@endsection

@section('content')
<br>
<a  href="{{ route('user.create') }}"
    class="btn btn-primary btn-lg active"
    role="button" aria-pressed="true">
        Create User
</a>
<br>
<br>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Company</th>
                <th>Resort</th>
                <th>Department</th>
                <th>Manager Name </th>
                <th>Gender </th>
                <th>Start date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
                <tr>
                    <th> <a href="{{ route('user.show', $user->id ) }}">{{ $user->first_name . ' ' . $user->last_name }}</a></th>
                    <th> {{ $user->company->name }} </th>
                    <th> {{ $user->resort->location->name }} </th>
                    <th> {{ $user->department->name }} </th>
                    <th> {{ $user->manager }} </th>
                    <th> {{ $user->gender }} </th>
                    <th> {{ $user->contract_start }} </th>
                    <th> {{ $user->contract_end }} </th>
                    <th>
                        <a href="{{ route('user.edit', $user->id ) }}"><i class="fas fa-user-edit  fa-1x"></i></a>

                        <form method="POST" id="Form{{$user->id}}" action="{{ route('user.destroy', $user->id) }}" style="Display: inline;">
                                @csrf
                                {{ method_field('DELETE') }}
                            <a href="javascript:{}" onclick='document.getElementById("Form{{$user->id}}").submit();'>
                                <i class="fas fa-user-times fa-1x"></i>
                            </a>
                        </form>
                        <a href="{{ route('user.printPDF', $user->id)}}"><i class="fas fa-file-download"></i></a>

                    </th>
                </tr>
            @endforeach
        </tbody>

        <!--<tfoot>
            <tr>
                <th>Name</th>
                <th>Company</th>
                <th>Resort</th>
                <th>Department</th>
                <th>Manager Name </th>
                <th>Gender </th>
                <th>Start date</th>
                <th>End Date</th>
            </tr>
        </tfoot>-->

    </table>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<script src="{{ asset('js/jquerydatatable.js') }}" ></script>
<script src="{{ asset('js/bootstrapdatatable.js') }}" ></script>
@endsection
