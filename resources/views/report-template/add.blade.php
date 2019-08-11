@extends('layout')

@section('content')
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<form action="/admin/report-template/store" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="email">Name :</label>
        <input class="form-control" type="text" name="name" required="required">
    </div>
    <div class="form-group">
        <label for="email">Label :</label>
        <input class="form-control" type="text" name="label" required="required">
    </div>
    <div class="form-group">
        <label for="email">Report Type:</label>
        <input class="form-control" type="text" name="type" required="required">
    </div>
    <input type="submit" name="save" class="btn btn-secondary">
</form>
@stop
