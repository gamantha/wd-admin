@extends('layout')

@section('content')
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<form action="/admin/indicator/store" method="post">
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
            <label for="email">Unit Label :</label>
            <input class="form-control" type="text" name="unit_label" required="required">
        </div>
    <div class="form-group">
        <label for="email">Parent :</label>
        <br/>
        <select name="parent">
            <option value="0">Select Parent</option>
            @foreach($indicators as $d)
            <option value="{{ $d['id']}}">{{ $d['name']}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="is_parent">Is Parent :</label>
        <br/>

        <select name="is_parent">
            <option value="0">False</option>
            <option value="1">True</option>
        </select>
    </div>
    <input type="submit" name="save" class="btn btn-secondary">
</form>
@stop
