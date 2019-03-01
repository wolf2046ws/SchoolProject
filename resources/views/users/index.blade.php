@extends('layouts.default')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/bootstrapdatatable.css')}}" >

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
                        <ul>
                            <li ><a href="{{ route('user.edit', $user->id ) }}">Edit</a></li>
                            <form method="POST" action="{{ route('user.destroy', $user->id) }}">
                                @csrf
                                {{ method_field('DELETE') }}
                            <li ><button type="submit">
                                Delete</button></li>
                        </form>
                        </ul>
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
