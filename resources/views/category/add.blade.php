@extends('layout')

@section('content')
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<form action="/admin/category/store" method="post">
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
        <label for="parent">Parent:</label>
        <select name="parent">
            <option value="0">Select Parent</option>
            @foreach($category as $c)
            <option value="{{ $c['id']}}">{{ $c['name']}}</option>
            @endforeach
        </select>
    </div>
    <input type="submit" name="save" class="btn btn-secondary">
</form>
@stop
