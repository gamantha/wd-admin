@extends('layout')

@section('content')
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<form action="/admin/mapping/store" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="parent">Report Template</label>
        <br/>
        <select name="template">
            <option value="0">Select Template</option>
            @foreach($templates as $c)
            <option value="{{ $c['id']}}">{{ $c['name']}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="parent">Indicator:</label>
        <br/>

        <select name="indicator">
            <option value="0">Select indicator</option>
            @foreach($indicators as $c)
            <option value="{{ $c['id']}}">{{ $c['name']}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="parent">Category:</label>
        <br/>
        <select name="category">
            <option value="0">Select category</option>
            @foreach($categorys as $c)
            <option value="{{ $c['id']}}">{{ $c['name']}}</option>
            @endforeach
        </select>
    </div>
    <input type="submit" name="save" class="btn btn-secondary">
</form>
@stop
