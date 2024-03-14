@extends('layouts.app')

@section('content')


@if(Session::has('success'))
<div class= "alert alert-success">
    {{ Session::get('success') }}
</div>

@endif     

<form action="{{route('import.students') }}" method="post" enctype="multipart/form-data" style="text-align:center;">
    @csrf
    <input class="form-control" type="file" name="csv_file" accept=".csv">
    <button class="btn btn-primary mt-3" type="submit">Import file</button>
</form>



@endsection